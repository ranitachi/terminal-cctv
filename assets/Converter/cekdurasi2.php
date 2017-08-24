<?php
include_once ("_Functions.php");
include_once ("getID3/getid3/getid3.php");
function cekdurasi($folder,$data=null)
{

	// $folder = "D:/JOB/RAMTEC/CCTV/Terbaru/f2aa1dd0-8830-476a-ba78-36ea3eb7ca10/mp4/";
	// $files=$data;
	$f=scandir($folder);
	krsort($f);
	$files = array_slice($f, 0,50,true);
	// chdir($folder);

				// echo '<pre>';
				// print_r($files);
				// echo '</pre>';
	ksort($files);
	$mp4_array=$tot=array();
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

				// if($detik==0)
				// {
				// 	// unlink($folder.$v);
				// }
				// else
				// {
					$total=($jam*3600) + ($menit*60) + ($detik);
					$tot[]=$total;
					// echo $v.' : '.$durasi.' : '.$total."\n";
					$mp4_array[]=$v;
				// }

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
		if($tot[$k]>0)
		{		
			if($size<120 && $tot[$k]<=120)
			{
				$size+=$tot[$k];
				$n_file.=$v.',';
				$new_array[$idx][]='join__'.$size.'__'.$n_file;
				// echo $v.'<br>';
				// if($size>=15)
				// {
				// }
			}
			else if($tot[$k]<=120)
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
				$x1=ceil($sz/120);
				$x2=$sz%120;
				$n_file='';
				$size=0;
				for($x=0;$x<$x1;$x++)
				{
					$szz=120;
					if($x1==($x+1))
						$szz=$sz%120;

					if($szz==0)
						$szz=120;


					$ix=$x;
					$ff=explode('.', $v);
					$ext=$ff[count($v)];
					$dur=$szz*$x;
					if($x<10)
					{
						// $dur=$x*$szz;
						$x='0'.$x;
					}

					if($szz<120)
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
			// echo 'Size : ['.$tot[$k].'] '.$size.'|'.$n_file.'<br>';
			}
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
			$file=str_replace(',', ' ', $filename);
			echo $size.'-'.$filename.'<br>';
		// 		cobajoin($folder,$vn[0]);
		}
		else
		{
			$file=$vn;
			echo '<pre>';
			print_r($file);
			echo '</pre>';
		// 	cobasplit($folder,$file);
		}
		
		// if(count($vn)==1)
		// {
		// 	if($jns=='join')
		// 	{
		// 		$file=str_replace(',', ' ', $filename);
		// 		// echo $folder.$vn[0].'<br>';
		// 		// shell_exec('ffmpeg -i "' . $f . '"')			
		// 	}
		// }
		// else
		// {
		// 	// echo '<pre>';
		// 	// print_r($vn);
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
    		$dd=120*$k;

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
// $folder='D:/JOB/RAMTEC/CCTV/Terbaru/f2aa1dd0-8830-476a-ba78-36ea3eb7ca10/mp4/';
$fd=array('78462234-e6c4-4778-bc5d-9dc11a646886','15ee9ed5-06c3-4231-8773-a843e5bed3e1','f2aa1dd0-8830-476a-ba78-36ea3eb7ca10','e4571d44-af2c-4dfe-a8a4-ecc6ec3f51f1','57ede942-3373-4caa-a00c-8131ac2e3b6b','db9f01de-3ce3-4c1e-b17c-96bc2f37abf8','2c7cdf6c-a28e-444a-806f-079c7c6cc9f1','367ea7d5-8f23-4149-b4e9-f7143af25fdd','c6a45dd5-5794-4273-a753-e04c766d1a56','df5fb104-99ca-4dc7-b0c7-2b7aebd66318','b0a2f2c0-2f85-4ad0-b511-8efee8ffe87c','5c3a54ea-06dd-47f5-bead-ef25aa6f96f5','ea2ecaff-4d95-4272-8527-b5f607562785','ce979aaf-fe47-4e80-a6e7-16c56cc73c5e','03675c8e-e5e9-41f9-8aac-dc9e5f71cb5f','0ac2fef4-a953-4f15-9dd1-31d12b2c34e8','e7062a3a-2607-4be9-85d2-90bdcabcc79e','20ceaaf3-173a-4e82-a5ee-9477d3333dc3','eb1aa791-e675-40bf-bdd4-d4ca1cb43920','068a6168-f3ab-4017-bbec-5fd8508412fb','9fe45a63-f395-4ad6-be94-9c175a05900e','a33208c7-6e57-4b0f-a57d-d5d8f42edaba','6ebd140b-ac57-4707-ad9c-a85427b718b5');
foreach ($fd as $k => $v) 
{
	# code...
	$folder='E:/Recording/Terbaru/'.$v.'/mp4/';
	echo $v.'<br>';
	cekdurasi($folder);
	echo '<br>---------------------------------------------<br>';
}
// cobasplit();
// lngsung();
// echo 'konversi asf ke mp4..Durasi : '.$d."\n";
?>