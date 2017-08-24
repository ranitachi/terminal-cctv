<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="refresh" content="900">
	<title>Konverter Video</title>
</head>
<body>
<?PHP 
include ("_Functions.php");
include ("getID3/getid3/getid3.php");
include ("cekdurasi.php");
// $fd=array('78462234-e6c4-4778-bc5d-9dc11a646886','15ee9ed5-06c3-4231-8773-a843e5bed3e1','f2aa1dd0-8830-476a-ba78-36ea3eb7ca10','e4571d44-af2c-4dfe-a8a4-ecc6ec3f51f1','57ede942-3373-4caa-a00c-8131ac2e3b6b','db9f01de-3ce3-4c1e-b17c-96bc2f37abf8','2c7cdf6c-a28e-444a-806f-079c7c6cc9f1','367ea7d5-8f23-4149-b4e9-f7143af25fdd','c6a45dd5-5794-4273-a753-e04c766d1a56','df5fb104-99ca-4dc7-b0c7-2b7aebd66318','b0a2f2c0-2f85-4ad0-b511-8efee8ffe87c','5c3a54ea-06dd-47f5-bead-ef25aa6f96f5','ea2ecaff-4d95-4272-8527-b5f607562785','ce979aaf-fe47-4e80-a6e7-16c56cc73c5e','03675c8e-e5e9-41f9-8aac-dc9e5f71cb5f','0ac2fef4-a953-4f15-9dd1-31d12b2c34e8','e7062a3a-2607-4be9-85d2-90bdcabcc79e','20ceaaf3-173a-4e82-a5ee-9477d3333dc3','eb1aa791-e675-40bf-bdd4-d4ca1cb43920','068a6168-f3ab-4017-bbec-5fd8508412fb','9fe45a63-f395-4ad6-be94-9c175a05900e','a33208c7-6e57-4b0f-a57d-d5d8f42edaba','6ebd140b-ac57-4707-ad9c-a85427b718b5');
// if(isset($_GET['dir']))
if(isset($argv[1]))
{
	$fol=$argv[1];
	$fd=array($fol);
}
else
	$fd=array('0c448fac-f403-411f-a99a-90cd17441361','f8124a62-8e3c-4b99-afba-fa900cf9ff10','3f2fbf63-368f-452e-8424-137c88613403','6df639cc-9b34-4cc3-8062-23d650c576d5','9a98fa5e-c9d2-40e6-9a9f-e6f049a13fc2','0334245e-79f3-42eb-8bda-ad991935ce43','f440687e-722f-4797-b95d-bf5bceefbc94','b18c5818-d3f8-444e-b057-1d6c9d9eec5c','9df51a27-dba8-4318-8f6f-46bbb8243146','74b5e886-2da2-4607-b8d1-b09c28e296f8','51302a4b-5ea4-4d54-a884-dfe29747f780','552485c5-27f0-4d8f-9389-5f687cf1e548','dd72020b-18a8-49f9-a1cd-605f00220508','4d0783ac-0d68-4c45-8440-451a2a55c7ce','304c3c86-73ed-4d2c-a25a-4edad14ef9a5','8dce6c88-eb46-402e-8307-ac6ff7cd7de2','b1db04ab-d030-4f77-9272-c7d97ed70e6a','7fa65726-40e1-42e5-b439-afb1b9fdcf66','cd52de4a-9a6c-497e-806d-5a0e17d4dc53','19ac5477-db64-4339-81ca-eeccdb852405','edb56316-2488-4221-bcdd-bfdaa61ae066');
	// $fd=array('0c448fac-f403-411f-a99a-90cd17441361','4d0783ac-0d68-4c45-8440-451a2a55c7ce','6df639cc-9b34-4cc3-8062-23d650c576d5','7fa65726-40e1-42e5-b439-afb1b9fdcf66','8dce6c88-eb46-402e-8307-ac6ff7cd7de2','9a98fa5e-c9d2-40e6-9a9f-e6f049a13fc2','9df51a27-dba8-4318-8f6f-46bbb8243146','15ee9ed5-06c3-4231-8773-a843e5bed3e1','19ac5477-db64-4339-81ca-eeccdb852405','20ceaaf3-173a-4e82-a5ee-9477d3333dc3','74b5e886-2da2-4607-b8d1-b09c28e296f8','304c3c86-73ed-4d2c-a25a-4edad14ef9a5','325b4252-7fa0-4aed-814c-9eb8b99d0d3e','03675c8e-e5e9-41f9-8aac-dc9e5f71cb5f','51302a4b-5ea4-4d54-a884-dfe29747f780','194243a1-68f5-4e10-9fce-f8914e37d9d1','0334245e-79f3-42eb-8bda-ad991935ce43','552485c5-27f0-4d8f-9389-5f687cf1e548','78462234-e6c4-4778-bc5d-9dc11a646886','b1db04ab-d030-4f77-9272-c7d97ed70e6a','b18c5818-d3f8-444e-b057-1d6c9d9eec5c','bb7ded47-4fa6-491a-a618-e0dd424817eb','cd52de4a-9a6c-497e-806d-5a0e17d4dc53','dd72020b-18a8-49f9-a1cd-605f00220508','df5fb104-99ca-4dc7-b0c7-2b7aebd66318','edb56316-2488-4221-bcdd-bfdaa61ae066','f8124a62-8e3c-4b99-afba-fa900cf9ff10','f440687e-722f-4797-b95d-bf5bceefbc94');

foreach ($fd as $kf => $vff) {

	// $foldername=$_GET['dir'];
	$foldername=$vff;
	$getID3 = new getID3;
	// $folder = "D:/JOB/RAMTEC/CCTV/Terbaru/78462234-e6c4-4778-bc5d-9dc11a646886";
	// $folder = "E:/Recording/Terbaru/78462234-e6c4-4778-bc5d-9dc11a646886";
	$folder = "E:/Recording/Terbaru/".$foldername;
	$listfile['acsm'] = null;
	$listfile['asf'] = null;
	$listfile['acsi'] = null;
	$listfile['mp4'] = null;
	$files = getFileList($folder, $listfile);
	//Order by filename descending
	if(isset($files['acsm']))krsort($files['acsm']);
	if(isset($files['acsi']))krsort($files['acsi']);
	if(isset($files['asf']))krsort($files['asf']);
	if(isset($files['mp4']))krsort($files['mp4']);

	$getdir=scandir($folder);
	$dirtarget=str_replace('/', '\\', $folder).'\mp4'. trim(' \ ');

	if(!in_array('mp4', $getdir))
		mkdir($folder .'/mp4',0777);
	$d_acsm=$mp4_array_before=array();
	if( $files['acsm'] != null)
	{
		// echo '<pre>';
		// print_r($files['acsm']);
		// echo '</pre>';
		$files['acsm'] = array_slice($files['acsm'], 1, count($files['acsm']) - 1);
		$d_acsm=$files['acsm'];
		$total=0;
		$mp4_data=$mp4_data2='';
		$mp4_array=$mp4_array2=array();
		while($files['acsm'])
		{
			$acsm = array_pop($files['acsm']);
			$asf = dirname($acsm) . trim(' \ ') . strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".asf";
			$asf_name=strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".asf";
			$mp4 = dirname($acsm) . trim(' \ ') . strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".mp4";
			$mp4_name=strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".mp4";
			
			$namafile=pathinfo($acsm, PATHINFO_FILENAME);
			list($nf1,$nf2)=explode(' ', $namafile);
			// list($tim,$extn)=explode('.', $nf2);
			list($jm,$mn,$dt,$sk)=explode('_', $nf2);

			$gettime=(date('H')-1);
			$getminute=(date('i')-15);
			$kmrin=date('Y-m-d', strtotime('-1 days'));
			// if(date('Y-m-d')==$nf1 || $nf1==$kmrin)
			if(date('Y-m-d')==$nf1)
			{
				if($gettime<=$jm)
				{
					//echo $namafile."\n";
				if($getminute<=$mn)
				{
			
					if(file_exists($dirtarget.$asf_name) == false)
					{
						convertAcsmToAsf($acsm, $dirtarget);
						if(file_exists($dirtarget.$mp4_name) == false)
						{
							$dir=str_replace('\\', '/', $dirtarget);
							$durasi = $getID3->analyze($asf);
							$lama=lamawaktu($durasi['playtime_string']);
							$cdur=cdur($durasi['playtime_string']);
							$size=filesize($asf);
							if($lama>=300)
							{
								$bagi=300/60;
								for($i=$bagi;$i>=1;$i--)
								{

									$n=convertAsfToMp42($asf,$namafile, $mp4,$cdur,(60*$i),60);
									$nn=explode('\\', $n);
									$new=$nn[count($nn)-1];
									$mp4_array_before[]=$asf_name;
									rename($n, $dirtarget.$new);
								}
								rename($asf, $dirtarget.$asf_name);
							}
							else
							{
								if($lama>=60)
								{
									$bagi=$lama/60;
									$sisabagi=$lama % 60;
									if($sisabagi>=0)
										$bagi=ceil($bagi);

									for($i=$bagi;$i>=1;$i--)
									{

										if($i==1)
										{
											$sisabagi=$lama % 60;
											$x=$lama % 60;
										}
										else if($i==$bagi)
										{
											$sisabagi=60;
											$x=$lama;
										}
										else
										{
											$sisabagi=60;
											$x=(60*$i)-(60-($lama % 60));
										}
										$n=convertAsfToMp422($asf,$namafile, $mp4,$cdur,$x,$sisabagi);
										$nn=explode('\\', $n);
										$new=$nn[count($nn)-1];
										$mp4_array_before[]=$asf_name;
										rename($n, $dirtarget.$new);
									}
									rename($asf, $dirtarget.$asf_name);
								}
								else
								{

									$total+=$lama;
									$mp4_data.=$asf_name.',';
									if($total>=60)
									{										
										$mp4_array_before[]=$asf_name;
										$mp4_data=substr($mp4_data, 0,-1);
										$filejoin=joinvideo($asf,$mp4,$vff,$mp4_data);
										$filejoinmp4=str_replace('.asf', '.mp4', $filejoin);
										// convertAsfToMp4($filejoin, $filejoinmp4);
										
										$mp4_data='';
										$total=0;
										$mp4_data2='';
									}
									else
									{
										$mp4_data2.=$asf_name.',';
										$mp4_array[]=$mp4_data2;
										$mp4_array_before[]=$asf_name;
									}
									
								}
								
							}
						}
							// rename($asf, $dirtarget.$asf_name);
					}
				}
				}
				// else
				// 	echo 'Dah Ada<br>';
				
			}
		}
		if(count($mp4_array)!=0)
		{
			$data_file=$mp4_array[count($mp4_array)-1];
			$filejoin=joinvideo($asf,$mp4,$vff,$data_file);
			$filejoinmp4=str_replace('.asf', '.mp4', $filejoin);
		}
		if(empty($mp4_array_before))
		{
			krsort($d_acsm);

			$acsms = array_slice($d_acsm, 0,3,true);
			
			// $asf_array[]=$acsms;
			foreach ($acsms as $k => $acsm) {
				# code...
				$file_acsm = dirname($acsm) . trim(' \ ') . strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".acsm";
				$asf_name=strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".asf";
				$asf = dirname($acsm) . trim(' \ ') . strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".asf";
				$jpg = dirname($acsm) . trim(' \ ') . strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".jpg";
				$jpg_name=strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".jpg";
				$mp4 = dirname($acsm) . trim(' \ ') . strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".mp4";
				$mp4_name=strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".mp4";
				$namafile=pathinfo($acsm, PATHINFO_FILENAME);
				echo $dirtarget.$asf_name.'<br>';
				
				if(file_exists($dirtarget.$asf_name) == false)
				{
					// echo 'ada<br>';
					$ukuran=filesize($file_acsm);
					$asf_array[]=$ukuran.' - '.$asf_name;
					convertAcsmToAsf($acsm, $dirtarget);	
					$size=filesize($asf);
					$durasi = $getID3->analyze($asf);
					$lama=lamawaktu($durasi['playtime_string']);
					$cdur=cdur($durasi['playtime_string']);
					if($lama>=300)
					{
						$bagi=300/60;
						for($i=$bagi;$i>=1;$i--)
						{
							$n=convertAsfToMp42($asf,$namafile, $mp4,$cdur,(60*$i),60);
							$nn=explode('\\', $n);
							$new=$nn[count($nn)-1];
							$mp4_array_before[]=$asf_name;
							rename($n, $dirtarget.$new);
						}
						rename($asf, $dirtarget.$asf_name);
					}
					else
						{
							if($lama>=60)
							{
								$bagi=$lama/60;
								$sisabagi=$lama % 60;
								if($sisabagi>=0)
									$bagi=ceil($bagi);

								for($i=$bagi;$i>=1;$i--)
								{
									if($i==1)
									{
										$sisabagi=$lama % 60;
										$x=$lama % 60;
									}
									else if($i==$bagi)
									{
										$sisabagi=60;
										$x=$lama;
									}
									else
									{
										$sisabagi=60;
										$x=(60*$i)-(60-($lama % 60));
									}

									$n=convertAsfToMp422($asf,$namafile, $mp4,$cdur,$x,$sisabagi);
									$mp4_array_before[]=$asf_name;
									$nn=explode('\\', $n);
									$new=$nn[count($nn)-1];
									$mp4_array_before[]=$asf_name;
									rename($n, $dirtarget.$new);
								}
								rename($asf, $dirtarget.$asf_name);
							}
							else
							{
								$total+=$lama;
								$mp4_data.=$asf_name.',';
								if($total>=60)
								{										
									$mp4_array_before[]=$asf_name;
									$mp4_data=substr($mp4_data, 0,-1);
									$filejoin=joinvideo($asf,$mp4,$vff,$mp4_data);
									$filejoinmp4=str_replace('.asf', '.mp4', $filejoin);
									// convertAsfToMp4($filejoin, $filejoinmp4);
									
									$mp4_data='';
									$total=0;
									$mp4_data2='';
								}
								else
								{
									$mp4_data2.=$asf_name.',';
									$mp4_array2[]=$mp4_data2;
								}
									
							}
							
						}
						//rename($asf, $dirtarget.$asf_name);
				}
			}
			if(count($mp4_array2)!=0)
			{
				$data_file=$mp4_array2[count($mp4_array2)-1];
				$filejoin=joinvideo($asf,$mp4,$vff,$data_file);
				$filejoinmp4=str_replace('.asf', '.mp4', $filejoin);
			}
			// ksort($mp4_array);
		
		}

	}

	if($files['mp4'] != null)
	{
		foreach ($files['mp4'] as $key => $va) 
		{
			# code...
			$fn=explode('\\', $va);
			//copy($va, $dirtarget.$fn[count($fn)-1]);
		}
		// $files['mp4'] = deleteFiles ($files['mp4']);
	}

	$fldr=str_replace('\\', '/', $dirtarget);
	if(!empty($mp4_array))
	{
		// cekdurasi($fldr,$mp4_array);
		// print_r($mp4_array);
		echo $vff.' Sudah Selesai'."<br>";
	}

	echo 'Last Conversion : '.date('d-m-Y H:i:s')."<br>";
}
?>

</body>
</html>