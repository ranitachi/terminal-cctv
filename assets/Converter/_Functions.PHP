<?PHP
//error_reporting(0);
define("RECORDING_DIR","/home/fachran/Videos/");
// define("RECORDING_DIR","D:/Recording/");

function koneksi()
{
	$host='localhost';
	$pass='';
	$user='root';
	$db='rtc_cctv_terminal';
	$kon=mysqli_connect($host,$user,$pass,$db);
	if($kon)
		return $kon;
	else
		return false;
}

function cekrecord($table,$klm_vl=array())
{
	$kon=koneksi();
	$kl='';
	foreach ($klm_vl as $k => $v)
	{
		$kl.= $k.'="'.$v.'" and ';
	}
	$kl=substr($kl, 0,-4);
	$q='select * from '.$table.' where '.$kl.'';
	//echo $q;
	$qry=mysqli_query($kon,$q);
	if(mysqli_num_rows($qry)==0)
		return 0;
	else
		return $qry;
	mysqli_close($kon);
}

function updaterecord($table,$up=array(),$wh=array())
{
	$kon=koneksi();
	$set=$whr='';
	foreach ($up as $k => $v)
	{
		$set.= $k.'="'.$v.'",';
	}

	foreach ($wh as $k => $v)
	{
		$whr.= $k.'="'.$v.'" and';
	}

	$set=substr($set, 0,-1);
	$whr=substr($whr, 0,-3);

	$qry='update '.$table.' set '.$set .' where '.$whr;
	// echo $qry;
	mysqli_query($kon,$qry);
	mysqli_close($kon);
}

function createtable($table)
{
	$kon=koneksi();
	$val = mysqli_query($kon,'select 1 from `'.$table.'` LIMIT 1');

	if($val !== FALSE)
	{
	   // echo 'Table '.$table.' Already Exists';
	}
	else
	{
	   $create = "CREATE TABLE ".$table." (
			id int NOT NULL primary key auto_increment,
			folder varchar (255),
			nama_kamera varchar (255),
			lokasi_kamera varchar (255),
			kode varchar (50),
			status_tampil char (1)
		)";
		mysqli_query($kon,$create);
	    //I can't find it...
	}
	mysqli_close($kon);
}

function selectrecord($table,$wh=array())
{
	$kon=koneksi();
	$whr='';

	foreach ($wh as $k => $v)
	{
		$whr.= $k.'="'.$v.'" and';
	}

	if($whr!='')
	{
		$whr=substr($whr, 0,-3);
		$whr=' where '.$whr;
	}

	$qry='select * from '.$table.$whr;
	// echo $qry;
	$row=mysqli_query($kon,$qry);
	mysqli_close($kon);
	$arr=array();
	while($r=mysqli_fetch_assoc($row))
	{
		$arr[]=$r;
	}
	return $arr;
}

function getFileList($dir, &$listfile = array())
{
	$extList = array("acsm", "asf", "acsi", "mp4");

	$files = scandir($dir);

	foreach($files as $key => $value){
		$path = realpath($dir.DIRECTORY_SEPARATOR.$value);
		if(!is_dir($path))
		{
			if(in_array(strtolower(pathinfo($path, PATHINFO_EXTENSION)), $extList))
			{
				$filename = pathinfo($path, PATHINFO_FILENAME);
				$listfile[strtolower(pathinfo($path, PATHINFO_EXTENSION))][str_replace(' ', '', str_replace('-', '', str_replace('_', '', $filename)))] = $path;
			}
		} else if($value != "." && $value != "..") {
			getFileList($path, $listfile);

			if(in_array(strtolower(pathinfo($path, PATHINFO_EXTENSION)), $extList))
			{
				$filename = pathinfo($path, PATHINFO_FILENAME);
				$listfile[strtolower(pathinfo($path, PATHINFO_EXTENSION))][str_replace(' ', '', str_replace('-', '', str_replace('_', '', $filename)))] = $path;
			}
		}
	}

	return $listfile;
}

function ubahwaktu($waktu,$tambah)
{
	list($tgl,$wkt)=explode(' ',$waktu);
	list($waktu,$ext)=explode('.',$wkt);
	list($jam,$menit,$detik,$msecond)=explode('_', $waktu);
	$date = date_create($tgl.' '.$jam.':'.$menit.':'.$detik);
	date_add($date, date_interval_create_from_date_string($tambah.' seconds'));
	return $tgl.' '.date_format($date, 'H_i_s').'_'.$msecond.'.'.$ext;
}

function ubahwaktukurang($waktu,$kurang)
{
	list($tgl,$wkt)=explode(' ',$waktu);
	list($waktu,$ext)=explode('.',$wkt);
	list($jam,$menit,$detik,$msecond)=explode('_', $waktu);
	$date = date_create($tgl.' '.$jam.':'.$menit.':'.$detik);
	date_add($date, date_interval_create_from_date_string('-'.$kurang.' seconds'));
	return $tgl.' '.date_format($date, 'H_i_s').'_'.$msecond.'.'.$ext;
}

function kurangwaktu($waktu,$kurang)
{
	list($tgl,$wkt)=explode(' ',$waktu);
	list($jam,$menit,$detik)=explode(':', $wkt);
	$date = date_create($tgl.' '.$jam.':'.$menit.':'.$detik);
	date_add($date, date_interval_create_from_date_string('-'.$kurang.' minutes'));
	return date_format($date, 'H:i:s');
}

function kurangwaktudetik($waktu,$kurang)
{
	list($tgl,$wkt)=explode(' ',$waktu);
	list($jam,$menit,$detik)=explode(':', $wkt);
	$date = date_create($tgl.' '.$jam.':'.$menit.':'.$detik);
	date_add($date, date_interval_create_from_date_string('-'.$kurang.' seconds'));
	return date_format($date, 'H:i:s');
}

function tambahwaktu($waktu,$tambah)
{
	list($tgl,$wkt)=explode(' ',$waktu);
	list($jam,$menit,$detik)=explode(':', $wkt);
	$date = date_create($tgl.' '.$jam.':'.$menit.':'.$detik);
	date_add($date, date_interval_create_from_date_string($tambah.' seconds'));
	return date_format($date, 'H:i:s');
}

function deleteFiles($fl = array())
{
	$fr = array_slice($fl, 10, count($fl));
	while($fr) unlink(array_pop($fr));

	$fl = array_slice($fl, 0, 10);
	return $fl;
}

function convertAcsmToAsf($acsm, $asf)
{
	//Change current directory
	chdir("C:/Program Files/Axis Communications/AXIS Camera Station/");

	//Conversion Process
	return shell_exec('RecordingToAsfConverter.exe "'. $acsm .'" "'. $asf .'"');
}

function getVideoDuration($f)
{
	//Change current directory
	chdir("C:\FFmpegTool\bin");

	//Get duration process
	$output = shell_exec('ffmpeg -i "' . $f . '" 2>&1');
	$regexp = "/Duration: ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2}).([0-9]{1,2})/";
	preg_match($regexp, $output, $matches);

	$duration = ((int)$matches[1] * 3600) + ((int)$matches[2] * 60) + (int)$matches[3];
	return $duration;
}

function convertAsfToMp4($asf, $mp4)
{
	//Change current directory
	chdir("C:/FFmpegTool/bin");

	//Conversion Process
	// if($d > 30)
	// 	return shell_exec ('ffmpeg -v quiet -y -r 2 -i "'.$asf.'" -vcodec copy -acodec copy -ss 00:00:00 -t 00:00:30 -sn "' . $mp4 . '"');
	// else
	// return shell_exec('ffmpeg -r 2 -i "' . $asf . '" "' . $mp4 . '"');
	return shell_exec('ffmpeg  -y -i "' . $asf . '" -s:v 558x310 -b:v 110k -vcodec h264 -acodec -copy -async 1 -strict -2 "' . $mp4 . '"');
}

function convertAsfToMp42($llma,$asf,$namafile, $mp4,$durasi,$lama,$lmpotong=20)
{
	//Change current directory
	// echo $durasi.'<br>';
	chdir("C:/FFmpegTool/bin");
	list($tgl,$time)=explode(' ', $namafile);
    list($jam,$mnt,$dtk,$ms)=explode('_', $time);
    $tgll=$tgl.' '.$durasi;
    $w=($lama/20);
    // echo $llm.'-'.$lama.'-'.$tgll.'-'.$w.'<br>';
	$waktupotong=kurangwaktudetik($tgll,$lama);
	// $waktupotong=kurangwaktu($tgll,$w);

	list($s1,$s2,$s3)=explode(':', $waktupotong);
	$total=($s1*3600) + ($s2*60) + ($s3);

	$waktudurasi=tambahwaktu(($tgl.' '.$waktupotong),20);
	$namafilebaru=ubahwaktu($namafile.'.mp4',($total));
	$n_mp4=str_replace($namafile.'.mp4', $namafilebaru, $mp4);
	$ex=explode('\\', $n_mp4);
	$nfb=$ex[count($ex)-1];
	//Conversion Process
	// if($d > 30)
	// 	return shell_exec ('ffmpeg -v quiet -y -r 2 -i "'.$asf.'" -vcodec copy -acodec copy -ss 00:00:00 -t 00:00:30 -sn "' . $mp4 . '"');
	// else
	// return
	// echo 'ffmpeg -i "'.$asf.'" -vcodec copy -acodec copy -ss '.$waktupotong.' -t 60  -s 800x400 -b:v 128k -async 1 -sn "'.$mp4.'"';
	// echo 'ffmpeg -i "'.$asf.'" -ss '.$waktupotong.' -t '.$durasi.'  -async 1 -strict -2 "'.$mp4.'"';
	// return shell_exec('ffmpeg -i "'.$asf.'" -ss '.$waktupotong.' -t '.$waktudurasi.'  -s 800x400 -b:v 128k -vcodec h264 -acodec copy -async 1 -strict -2 "'.$n_mp4.'"');
	// shell_exec('ffmpeg -i "'.$mp4.'" -ss '.$waktupotong.' -t 60 -s 800x400 -b:v 128k  -async 1 "'.$n_mp4.'"');
	// getThumb($n_mp4,str_replace('.mp4', '', $namafilebaru));
	// shell_exec('ffmpeg -y -i "'.$asf.'" -ss '.$waktupotong.' -t '.$lmpotong.'  -s 800x400 -b:v 110k -vcodec h264 -acodec -copy -async 1 -strict -2 "'.$n_mp4.'"');
	$n=$n_mp4.'||-map 0 -ss '.$waktupotong.' -t '.$lmpotong.'  -s:v 558x310 -b:v 95k -vcodec h264 -acodec -copy -async 1 -strict -2 "'.$n_mp4.'"';
	return $n;
	// return $n_mp4;
	// return shell_exec('ffmpeg  -i "' . $asf . '" "' . $mp4 . '"');
}
function convertAsfToMp422($asf,$namafile, $mp4,$durasi,$lama,$lmpotong=20)
{
	//Change current directory
	chdir("C:/FFmpegTool/bin");
	list($tgl,$time)=explode(' ', $namafile);
    list($jam,$mnt,$dtk,$ms)=explode('_', $time);
    $tgll=$tgl.' '.$durasi;
    // $w=($lama/60);
	$waktupotong=kurangwaktudetik($tgll,$lama);

	list($s1,$s2,$s3)=explode(':', $waktupotong);
	$total=($s1*3600) + ($s2*60) + ($s3);

	$waktudurasi=tambahwaktu(($tgl.' '.$waktupotong),20);
	$namafilebaru=ubahwaktu($namafile.'.mp4',($total));
	$n_mp4=str_replace($namafile.'.mp4', $namafilebaru, $mp4);
	$ex=explode('\\', $n_mp4);
	$nfb=$ex[count($ex)-1];
	// getThumb($n_mp4,str_replace('.mp4', '', $namafilebaru));
	// shell_exec('ffmpeg -y -i "'.$asf.'" -ss '.$waktupotong.' -t '.$lmpotong.'  -s 800x400 -b:v 110k -vcodec h264 -acodec -copy -async 1 -strict -2 "'.$n_mp4.'"');
	$n=$n_mp4.'||-map 0 -ss '.$waktupotong.' -t '.$lmpotong.'  -s:v 558x310 -b:v 95k -vcodec h264 -acodec -copy -async 1 -strict -2 "'.$n_mp4.'"';
	return $n;
	// return shell_exec('ffmpeg  -i "' . $asf . '" "' . $mp4 . '"');
}

function getThumb($asf,$namafile)
{
	//Change current directory
	chdir("C:/FFmpegTool/bin");
	// $server=str_replace('index.php','', $_SERVER['SCRIPT_FILENAME']);
	$jpg=$_SERVER['DOCUMENT_ROOT'].'/assets/img/'.$namafile.'.jpg';
	return shell_exec('ffmpeg -ss 0.5 -i "'.$asf.'" -t 1 -s 558x310 -f image2 "'.$jpg.'"');
	// return shell_exec('ffmpeg  -i "' . $asf . '" "' . $mp4 . '"');
}
function getDuration($dir,$file)
{
	$dir=str_replace('\\', '/', $dir);
	if (file_exists($dir.$file))
	{
		chdir($dir);
	 ## open and read video file
		$handle = fopen($file, "r");
		## read video file size
		$contents = fread($handle, filesize($file));
		fclose($handle);
		$make_hexa = hexdec(bin2hex(substr($contents,strlen($contents)-3)));
		//if (strlen($contents) > $make_hexa)
		//{
			$pre_duration = hexdec(bin2hex(substr($contents,strlen($contents)-$make_hexa,3))) ;
			$post_duration = $pre_duration/1000;
			$timehours = $post_duration/3600;
			$timeminutes =($post_duration % 3600)/60;
			$timeseconds = ($post_duration % 3600) % 60;
			$timehours = explode(".", $timehours);
			$timeminutes = explode(".", $timeminutes);
			$timeseconds = explode(".", $timeseconds);
			$duration = $timehours[0]. ":" . $timeminutes[0]. ":" . $timeseconds[0];
		//}
		//else
		//	$duration=$make_hexa;
		return $file.' : '.$pre_duration;
	}
	else {
		return 'nofile : '.$dir.$file;
	}
}

function joinvideo($asf,$mp4,$folder,$file)
{
	chdir("C:/FFmpegTool/bin");
	$di=explode('\\', $asf);
	$dir=$di[count($di)-2];
	// echo $dir;
	$namafile='';
	$f=explode(',', $file);
	$folder='E:/Recording/Terbaru/'.$folder.'/'.$dir.'/';
	$folder=str_replace('/', '\\', $folder);
	if(count($f)>1)
	{

		foreach ($f as $k => $v)
		{
			if($v!='')
			{
				$asf_file=$folder.$v;

				$nfile=str_replace('.asf', '.mp4', $asf_file);
				convertAsfToMp4($asf_file, $nfile);
				$pindahasf=str_replace($dir, 'mp4', $asf_file);
				rename($asf_file,$pindahasf);

				$nf='f'.$k.'.ts';
				$namafile.=$folder.$nf.'|';
				// echo 'ffmpeg -i "'.$nfile.'" -c copy -bsf:v h264_mp4toannexb -f mpegts '.$folder.$nf;
				shell_exec('ffmpeg -i "'.$nfile.'" -c copy -bsf:v h264_mp4toannexb -f mpegts '.$folder.$nf);
				// echo '<br>';
				unlink($nfile);
			}
		}
		$namafile=substr($namafile, 0,-1);
		$fileb=str_replace('.asf', '.mp4', $folder.$f[0]);
		// echo 'ffmpeg -i "concat:'.$namafile.'" -c copy -bsf:a aac_adtstoasc "'.$fileb.'"';
		shell_exec('ffmpeg -i "concat:'.$namafile.'" -c copy -bsf:a aac_adtstoasc "'.$fileb.'"');
		// echo '<br>';
		$hj=explode('|', $namafile);
		foreach ($hj as $kh => $vh)
		{
			// echo 'Hapus '.$vh;
			// echo '<br>';
			unlink($vh);
		}
		$onefile=$fileb;
		getThumb($onefile,str_replace('.mp4', '', $fileb));
	}
	$pindah=str_replace($dir, 'mp4', $onefile);
	rename($fileb, $pindah);
	return $onefile;
	// echo 'ffmpeg -i "concat:'.$asf.'" -c copy -bsf:a aac_adtstoasc "'.$folder.$v.'"';
}
function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' kB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}
function lamawaktu($durasi)
{
	$d=explode(':', $durasi);
	if(count($d)==2)
	{
		$jam=0;
		$menit=$d[0];
		$detik=$d[1];
		$cdur='00:'.$menit.':'.$detik;
	}
	else
	{
		$jam=$d[0];
		$menit=$d[1];
		$detik=$d[2];
		$cdur=$jam.':'.$menit.':'.$detik;
	}
	$total=($jam*3600) + ($menit*60) + ($detik);
	return $total;
}

function cdur($durasi)
{
	$d=explode(':', $durasi);
	if(count($d)==2)
	{
		$jam=0;
		$menit=$d[0];
		$detik=$d[1];
		$cdur='00:'.$menit.':'.$detik;
	}
	else
	{
		$jam=$d[0];
		$menit=$d[1];
		$detik=$d[2];
		$cdur=$jam.':'.$menit.':'.$detik;
	}
	// $total=($jam*3600) + ($menit*60) + ($detik);
	return $cdur;
}

?>
