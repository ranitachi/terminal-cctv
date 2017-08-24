<?PHP 
include ("_Functions.php");
include ("getID3/getid3/getid3.php");
include ("cekdurasi.php");
// if(isset($_GET['dir']))
// if(isset($argv[1]))
// {
// 	$foldername=$argv[1];
	$getID3 = new getID3;
	// $foldername = "78462234-e6c4-4778-bc5d-9dc11a646886";
	// $folder = "E:/Recording/Terbaru/78462234-e6c4-4778-bc5d-9dc11a646886";
	$folder = "E:/Recording/Terbaru/";
	// $folder = "D:/JOB/RAMTEC/CCTV/Terbaru/".$foldername;
	$df=scandir($folder);
	foreach ($df as $kd => $vd) 
	{
		if($vd!='.' && $vd!='..')
		{
			$listfile['acsm'] = null;
			$listfile['asf'] = null;
			$listfile['acsi'] = null;
			$listfile['mp4'] = null;
			$files = getFileList($folder.$vd, $listfile);
			//Order by filename descending
			$getdir=scandir($folder.$vd);

			if(isset($files['acsm']))krsort($files['acsm']);
			if(isset($files['acsi']))krsort($files['acsi']);
			if(isset($files['asf']))krsort($files['asf']);
			if(isset($files['mp4']))krsort($files['mp4']);
			// $hapus = glob($folder.$vd.'/mp4/{,.}*', GLOB_BRACE);

			// foreach($hapus as $file){ // iterate files
			//   if(is_file($file))
			//     unlink($file); // delete file
			// 	// echo $file.'<br>';
			// }

			$dirtarget=str_replace('/', '\\', $folder.$vd).'\mp4'. trim(' \ ');
			$dirtargetasf=str_replace('/', '\\', $folder.$vd).'\asf'. trim(' \ ');

			if(!in_array('mp4', $getdir))
				mkdir($folder .'/mp4',0777);

			if(!in_array('asf', $getdir))
				mkdir($folder .'/asf',0777);

			$d_acsm=$mp4_array_before=array();
			if( $files['asf'] != null)
			{
				// $files['asf'] = array_slice($files['asf'], 1, count($files['asf']) - 1);
				if(file_exists($dirtarget.$mp4_name) == false)
				{

				
				$d_acsm=$files['acsm'];
				$total=0;
				$mp4_data=$mp4_data2='';
				$mp4_array=$mp4_array2=$data_array=array();
				$topTen = array_slice($files['asf'], 0,20,true);
				while($topTen)
				{
					$acsm = array_pop($topTen);
					$asf = dirname($acsm) . trim(' \ ') . strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".asf";
					$asf_name=strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".asf";
					$mp4 = dirname($acsm) . trim(' \ ') . strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".mp4";
					$mp4_name=strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".mp4";
					$namafile=pathinfo($acsm, PATHINFO_FILENAME);


					
					list($nf1,$nf2)=explode(' ', $namafile);
			// list($tim,$extn)=explode('.', $nf2);
					list($jm,$mn,$dt,$sk)=explode('_', $nf2);
					$hi=$nf1.' '.$jm.':'.$mn.':'.$dt;
					$gettime=(date('H')-1);
					$getminute=(date('i')-15);
					$kmrin=date('Y-m-d', strtotime('-1 days'));

					$date = date_create(date('Y-m-d H:i:s'));
					// echo date('Y-m-d H:i:s').'<br>';
					date_add($date, date_interval_create_from_date_string('-75 minutes'));
					// date_add($date, date_interval_create_from_date_string('-1 hours'));
					$cekwaktu=date_format($date, 'Y-m-d H:i:s');
					
					$ukuran=filesize($asf);
					$d = $getID3->analyze($asf);
					$durasi = $d['playtime_string'];
					$cdur=cdur($durasi);
					$lama=lamawaktu($durasi);

					if($lama>=300)
					{
						$bagi=300/20;
						for($i=$bagi;$i>=1;$i--)
						{
							$n=convertAsfToMp42($asf,$namafile, $mp4,$cdur,(20*$i),20);
							$nn=explode('\\', $n);
							$new=$nn[count($nn)-1];
							$mp4_array_before[]=$asf_name;
							rename($n, $dirtarget.$new);
						}
						// rename($asf, $dirtarget.$asf_name);
						// $data_array[]=$dirtarget.$asf_name.' ['.formatSizeUnits($ukuran).'] ['.($durasi).']';
						// echo '> 300 '.$vd.'-'.$acsm.' : '.$durasi.' ['.$lama.']<br>';
					}
					else
					{
						if($lama>=20)
						{
							$bagi=$lama/20;
							$sisabagi=$lama % 20;
							if($sisabagi>=0)
								$bagi=ceil($bagi);

							for($i=$bagi;$i>=1;$i--)
							{

								if($i==1)
								{
									$sisabagi=$lama % 20;
									$x=$lama % 20;
								}
								else if($i==$bagi)
								{
									$sisabagi=20;
									$x=$lama;
								}
								else
								{
									$sisabagi=20;
									$x=(20*$i)-(20-($lama % 20));
								}
								$n=convertAsfToMp422($asf,$namafile, $mp4,$cdur,$x,$sisabagi);
								$nn=explode('\\', $n);
								$new=$nn[count($nn)-1];
								$mp4_array_before[]=$asf_name;
								rename($n, $dirtarget.$new);
							}
							// echo '> 20 '.$vd.'-'.$acsm.' : '.$durasi.' ['.$lama.']<br>';
							// rename($asf, $dirtarget.$asf_name);
						}
						else
						{
							if($lama==0)
							{
								unlink($asf);
							}
							else
							{
								// echo '<20 '.$vd.'-'.$acsm.' : '.$durasi.' ['.$lama.']<br>';
								convertAsfToMp4($asf,$mp4);
								getThumb($asf,$namafile);
								rename($mp4, $dirtarget.$mp4_name);
								// rename($asf, $dirtarget.$asf_name);
							}
						}
					}
								
							
					}
					// echo $vd.'-'.$asf_name.'<br>';
				}
			}
			
		}
	}


?>
