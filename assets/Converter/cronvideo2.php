<!DOCTYPE html>
<html>
<head>
	<!-- <meta http-equiv="refresh" content="600"> -->
	<title>Konverter Video</title>
</head>
<body>
<?PHP 
include ("_Functions.php");
include ("getID3/getid3/getid3.php");
include ("cekdurasi.php");
$fd=array('78462234-e6c4-4778-bc5d-9dc11a646886','15ee9ed5-06c3-4231-8773-a843e5bed3e1','f2aa1dd0-8830-476a-ba78-36ea3eb7ca10','e4571d44-af2c-4dfe-a8a4-ecc6ec3f51f1','57ede942-3373-4caa-a00c-8131ac2e3b6b','db9f01de-3ce3-4c1e-b17c-96bc2f37abf8','2c7cdf6c-a28e-444a-806f-079c7c6cc9f1','367ea7d5-8f23-4149-b4e9-f7143af25fdd','c6a45dd5-5794-4273-a753-e04c766d1a56','df5fb104-99ca-4dc7-b0c7-2b7aebd66318','b0a2f2c0-2f85-4ad0-b511-8efee8ffe87c','5c3a54ea-06dd-47f5-bead-ef25aa6f96f5','ea2ecaff-4d95-4272-8527-b5f607562785','ce979aaf-fe47-4e80-a6e7-16c56cc73c5e','03675c8e-e5e9-41f9-8aac-dc9e5f71cb5f','0ac2fef4-a953-4f15-9dd1-31d12b2c34e8','e7062a3a-2607-4be9-85d2-90bdcabcc79e','20ceaaf3-173a-4e82-a5ee-9477d3333dc3','eb1aa791-e675-40bf-bdd4-d4ca1cb43920','068a6168-f3ab-4017-bbec-5fd8508412fb','9fe45a63-f395-4ad6-be94-9c175a05900e','a33208c7-6e57-4b0f-a57d-d5d8f42edaba','6ebd140b-ac57-4707-ad9c-a85427b718b5');
// if(isset($_GET['dir']))
$getID3 = new getID3;
// $fd=array('78462234-e6c4-4778-bc5d-9dc11a646886');
foreach ($fd as $kf => $vff) 
{
	# code...
	// $foldername=$_GET['dir'];
	$foldername=$vff;
	$getID3 = new getID3;
	// $folder = "D:/JOB/RAMTEC/CCTV/Terbaru/".$foldername;
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

	$mp4_array=array();
	$asf_array=array();
	$mp4_array_before=array();
	$d_acsm=array();
	if( $files['acsm'] != null)
	{
		$d_acsm=$files['acsm'];
		$files['acsm'] = array_slice($files['acsm'], 1, count($files['acsm']) - 1);
		while($files['acsm'])
		{
			$acsm = array_pop($files['acsm']);
			$file_acsm = dirname($acsm) . trim(' \ ') . strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".acsm";
			$asf = dirname($acsm) . trim(' \ ') . strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".asf";
			$asf_name=strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".asf";
			$mp4 = dirname($acsm) . trim(' \ ') . strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".mp4";
			$mp4_name=strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".mp4";
			
			$namafile=pathinfo($acsm, PATHINFO_FILENAME);
			// echo $namafile.'<br>';
			list($nf1,$nf2)=explode(' ', $namafile);
			// list($tim,$extn)=explode('.', $nf2);
			list($jm,$mn,$dt,$sk)=explode('_', $nf2);
			$gettime=(date('H')-1);
			$getminute=(date('i')-10);
			if(date('Y-m-d')==$nf1)
			{
				if($gettime<=$jm)
				{
					if($getminute<=$mn)
					{


			// echo $acsm.'<br>';
			// echo $asf.'<br>';
			// echo $mp4.'<br>';
			// echo $dirtarget.'<br>';
			// echo strtolower(pathinfo($acsm, PATHINFO_FILENAME)).'----------------------------------------------------<br>';
						if(file_exists($dirtarget.$asf_name) == false)
						{
							// convertAcsmToAsf($acsm, $dirtarget);
							//echo 'konversi acsm ke asf'."\n";
							$ukuran=filesize($file_acsm);
							$asf_array[]=$ukuran.' - '.$asf_name;
							// $size=filesize(filename)
							if(file_exists($dirtarget.$mp4_name) == false)
							{
								$dir=str_replace('\\', '/', $dirtarget);
								// $durasi = $getID3->analyze($dir.$asf_name);

								// echo $v.' : '.$durasi['playtime_string']."<br>";
								// $d = $durasi['playtime_string'];
								//echo 'konversi asf ke mp4'."\n";
								// convertAsfToMp4($asf, $mp4, $d);
								// convertAsfToMp4($asf, $mp4);

								$mp4_array[]=$mp4_name;
								// rename($asf, $dirtarget.$asf_name);
								// rename($mp4, $dirtarget.$mp4_name);

								// $durasimp4=$getID3->analyze($dirtarget.$mp4_name);
								// $mp4_array[]=$durasimp4['playtime_string'].'-'.$mp4_name;
								$mp4_array_before[]=$mp4_name;
							}
						}
					}
				}
				// else
				// 	echo 'Dah Ada<br>';
				
			}
		}

		if(empty($mp4_array_before))
		{
			// echo '<pre>';
			// print_r($d_acsm);
			// echo '</pre>';
			// $acsm = array_pop($d_acsm);
			$acsms = array_slice($d_acsm, 0,5,true);
			// $asf_array[]=$acsms;
			foreach ($acsms as $k => $acsm) {
				# code...
				$asf = dirname($acsm) . trim(' \ ') . strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".asf";
				$file_acsm = dirname($acsm) . trim(' \ ') . strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".acsm";
				$asf_name=strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".asf";
				$mp4 = dirname($acsm) . trim(' \ ') . strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".mp4";
				$mp4_name=strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".mp4";
				$namafile=pathinfo($acsm, PATHINFO_FILENAME);
				// echo $namafile.'<br>';
				
				list($nf1,$nf2)=explode(' ', $namafile);
				list($jm,$mn,$dt,$sk)=explode('_', $nf2);
				$gettime=(date('H')-1);
				$getminute=(date('i')-5);
				if(file_exists($dirtarget.$asf_name) == false)
				{
					// $asf_array[]=$asf_name;
					$ukuran=filesize($file_acsm);
					$asf_array[]=$ukuran.' - '.$asf_name;
					// convertAcsmToAsf($acsm, $dirtarget);
					// echo 'konversi acsm ke asf'."\n";
					if(file_exists($dirtarget.$mp4_name) == false)
					{
						$dir=str_replace('\\', '/', $dirtarget);
						// convertAsfToMp4($asf, $mp4);
						// $ukuranmp4=filesize($dirtarget.$mp4_name);
						
						
						//$mp4_array_before[]=$mp4_name;
						// rename($asf, $dirtarget.$asf_name);
						// rename($mp4, $dirtarget.$mp4_name);
						
						// $durasimp4=$getID3->analyze($dirtarget.$mp4_name);
						$mp4_array[]=$mp4_name;
					}
				}
			}
			ksort($asf_array);
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
	// cekdurasi($fldr,$mp4_array);

	// echo $vff.' Sudah Selesai<br>';
	echo $vff.'<br>';
	
	// array_slice($asf_array, 0,5,true);
	echo '<pre>';
	print_r($mp4_array);
	echo '</pre>';
}

?>
</body>
</html>
