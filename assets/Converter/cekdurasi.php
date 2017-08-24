<?php
function cekdurasi($folder,$data)
{
	// include ("_Functions.php");
	// include ("getID3/getid3/getid3.php");

	// $folder = "D:/JOB/RAMTEC/CCTV/Terbaru/f2aa1dd0-8830-476a-ba78-36ea3eb7ca10/mp4/";
	$files=$data;
	// $files=scandir($folder);
	// chdir($folder);

				// echo '<pre>';
				// print_r($file);
				// echo '</pre>';
	$mp4_array=$tot=array();
	ksort($files);
	foreach ($files as $k => $v) 
	{
		if($v!='.' && $v!='..')
		{
			if(strpos($v, '.mp4')!==false)
			{
				// echo  $folder.$v.'<br>';
				//$d = getDuration($folder,$v);
				$getID3 = new getID3;
				$dt = $getID3->analyze($folder.$v);
				$durasi=$dt['playtime_string'];

				$d=explode(':', $durasi);
				if(count($d)==2)
				{
					$jam=0;
					$menit=$d[0];
					$detik=$d[1];
				}
				else
				{
					$jam=$d[0];
					$menit=$d[1];
					$detik=$d[2];
				}

				if($detik==0)
				{
					unlink($folder.$v);
				}
				else
				{
					$total=($jam*3600) + ($menit*60) + ($detik);
					$tot[]=$total;
					// echo $v.' : '.$durasi.' : '.$total."\n";
					$mp4_array[]=$v;
				}

			}
		}
	}
	// echo '<pre>';
	// print_r($mp4_array);
	// echo '</pre>';
	$size=0;
	// echo $size;
	$n_file='';
	$new_array=array();
	$idx=0;
	foreach ($mp4_array as $k => $v) 
	{
		if($tot[$k]!=0)
		{		
			if($size<60 && $tot[$k]<=60)
			{
				$size+=$tot[$k];
				$n_file.=$v.',';
				// if($size>=15)
				// {
				// }
				$new_array[$idx][]='join__'.$size.'__'.$n_file;
			}
			else if($tot[$k]<=60)
			{
				// echo $size.'__['.$tot[$k].']__'.$n_file.'<br>';
				$size=$tot[$k];
				$n_file=$v.',';
				// $new_array[]=$size.'__['.$tot[$k].']__'.$n_file;
				$idx++;
			}
			else
			{
				// $new_array[]='';
				$new_array[$idx][]='join__'.$size.'__'.$n_file;
				// echo $size.'__['.$tot[$k].']__'.$n_file.'<br>';
				$idx++;
				$sz=$tot[$k];
				$x1=ceil($sz/60);
				$x2=$sz%60;
				$n_file='';
				$size=0;
				for($x=0;$x<$x1;$x++)
				{
					$szz=60;
					if($x1==($x+1))
						$szz=$sz%60;

					if($szz==0)
						$szz=60;


					$ix=$x;
					$ff=explode('.', $v);
					$ext=$ff[count($v)];
					$dur=$szz*$x;
					if($x<10)
					{
						// $dur=$x*$szz;
						$x='0'.$x;
					}

					if($szz<60)
					{
						$dur=(($x-1)*60) + $szz;
					}


					// echo $ext.'||';
					// $vv=str_replace('.'.$ext, ('::'.$x.'.'.$ext), $v);
					$vv=ubahwaktu($v,($dur));
					$new_array[$idx][$ix]='split__'.$szz.'__'.$vv;
				}
				$idx++;
				// $n_file=$v.',';	
			}
			// echo 'Size : ['.$tot[$k].'] '.$size.'|'.$n_file.'<br>';
		}
	}
	// echo '<pre>';
	// print_r($new_array);
	// echo '</pre>';
	// chdir($folder);
	foreach ($new_array as $kn => $vn) 
	{
		$getfile=$vn[count($vn)-1];
		// echo $getfile.'<br>';
		list($jns,$size,$filename)=explode('__', $getfile);
		if($jns=='join')
		{
			cobajoin($folder,$getfile);
		}
		else
		{
			cobasplit($folder,$vn);
		}
		// if(count($vn)==1)
		// {
		// 	list($jns,$size,$filename)=explode('__', $vn[0]);
		// 	if($jns=='join')
		// 	{
		// 		$file=str_replace(',', ' ', $filename);
		// 		// echo $folder.$vn[0].'<br>';
		// 		cobajoin($folder,$vn[0]);
		// 		// shell_exec('ffmpeg -i "' . $f . '"')			
		// 	}
		// }
		// else
		// {
		// 	// echo '<pre>';
		// 	// print_r($vn);
		// 	cobasplit($folder,$vn);
		// }
	}
}

function cobajoin($folder=null,$file=null)
{
	// $folder = "D:/JOB/RAMTEC/CCTV/Terbaru/f2aa1dd0-8830-476a-ba78-36ea3eb7ca10/mp4/";
	// $file='join__39__2016-10-20 12_43_56_824.mp4,2016-10-20 12_44_44_947.mp4,2016-10-20 12_59_54_401.mp4';
	chdir("C:\FFmpegTool\bin");
	list($jns,$size,$filename)=explode('__', $file);
	if($jns=='join')
	{
		$fl=explode(',', $filename);
		$namafile='';
		if(count($fl)>1)
		{		
			foreach ($fl as $kf => $vf) 
			{
				if($vf!='')
				{

					// echo $vf.'<br>';
					$path=$folder.$vf;
					$nf='f'.$kf.'.ts';
					$namafile.=$folder.$nf.'|';
					// echo 'ffmpeg -i "'.$vf.'" -c copy -bsf:v h264_mp4toannexb -f mpegts '.$nf.'<br>';			
					shell_exec('ffmpeg -i "'.$path.'" -c copy -bsf:v h264_mp4toannexb -f mpegts '.$folder.$nf);		
					unlink($folder.$vf);	
					// shell_exec('ffmpeg -i "'.$vf.'" -c copy -bsf:v h264_mp4toannexb -f mpegts f2.ts');			
					
				}
			}
			$namafile=substr($namafile, 0,-1);
			// echo 'ffmpeg -i "concat:'.$namafile.'" -c copy -bsf:a aac_adtstoasc '.$folder.$fl[0].'';
			shell_exec('ffmpeg -i "concat:'.$namafile.'" -c copy -bsf:a aac_adtstoasc "'.$folder.$fl[0].'"');
			
			$hj=explode('|', $namafile);
			foreach ($hj as $kh => $vh) 
			{
				unlink($vh);
			}
		}	
	}
}
function cobasplit($folder=null,$data=null)
{
	// include ("_Functions.php");
	// $folder = "D:/JOB/RAMTEC/CCTV/Terbaru/f2aa1dd0-8830-476a-ba78-36ea3eb7ca10/mp4/";
	// $file='2016-10-20 12_37_56_952.mp4';
	chdir("C:\FFmpegTool\bin");
	// shell_exec('ffmpeg -i input -c copy -segment_time 30 -f segment '.$folder.$file.'');
	// $data=Array
 //        (
 //            "split__30__2016-10-20 12_43_56_824.mp4",
 //            "split__30__2016-10-20 12_44_26_824.mp4",
 //            "split__30__2016-10-20 12_44_56_824.mp4",
 //            "split__25__2016-10-20 12_45_21_824.mp4"
 //        );

    $n=explode('__', $data[0]);
    $name=$n[2];
    foreach ($data as $k => $v) 
    {
    	list($jns,$tmt,$file)=explode('__', $v);
    	list($tgl,$time)=explode(' ', $file);
    	list($tm,$ext)=explode('.',$time);
    	list($jam,$mnt,$dtk,$ms)=explode('_', $tm);
    	$newtime=$jam.'_'.$mnt.'_'.$dtk.'_'.$ms.'.'.$ext;
    	$filebaru=$tgl.' '.$jam.'_'.$mnt.'_'.$dtk.'_'.($ms+$tmt).'.'.$ext;
    	//folder.$newtime
    	// echo $tgl.' '.$tm.'<br>';

    	// $name=$file;
    	$ww=$tgl.' 00:00:00';
    	if($k==0)
    		$dd=0;
    	else
    		$dd=60*$k;

    	// if($tmt<10)
    	// 	$dd=(($k-1) * 30) +$tmt;

    	$date = date_create($ww);
		date_add($date, date_interval_create_from_date_string($dd.' seconds'));
    	$nt=date_format($date, 'H:i:s');
    	// echo 'ffmpeg -ss '.$nt.' -t 00:00:'.$tmt.' -i "'.$folder.$name.'" -acodec copy -vcodec copy '.$folder.$filebaru.'<br>';
    	// echo 'ffmpeg -ss '.$nt.' -t 00:00:'.$tmt.' -i "'.$folder.$name.'" -acodec copy -vcodec copy '.$folder.$filebaru.'<br>';
    	//ffmpeg -i movie.mp4 -ss 00:00:03 -t 00:00:08 -async 1 cut.mp4
    	// echo 'ffmpeg -i "'.$folder.$name.'" -ss '.$nt.' -t '.$tmt.'  -async 1 "'.$folder.$filebaru.'"<br>';
    	shell_exec('ffmpeg -i "'.$folder.$name.'" -ss '.$nt.' -t '.$tmt.'  -async 1 "'.$folder.$filebaru.'"');
    	
    }
    if(file_exists($folder.$name))
    	unlink($folder.$name);
}
function lngsung()
{
	include ("_Functions.php");
	$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/f2aa1dd0-8830-476a-ba78-36ea3eb7ca10/mp4/";
	$file='2016-10-20 12_43_56_824.mp4';
	chdir("C:\FFmpegTool\bin");
	shell_exec('ffmpeg -i "'.$folder.$file.'" -acodec copy -f segment -segment_time 10 -vcodec copy -reset_timestamps 1 -map 0 -an "'.$folder.'coba%d.mp4"');
}

function hapusnol($folder)
{

}
// cobajoin();
// $folder='D:/JOB/RAMTEC/CCTV/Terbaru/f2aa1dd0-8830-476a-ba78-36ea3eb7ca10/mp4/';
// cekdurasi($folder);
// cobasplit();
// lngsung();
// echo 'konversi asf ke mp4..Durasi : '.$d."\n";
?>