<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="refresh" content="400">
	<title>Konverter Video</title>
</head>
<body>
<?PHP 
// shell_exec('taskkill /im ffmpeg.exe /f');

include ("_Functions.php");
include ("getID3/getid3/getid3.php");
include ("cekdurasi.php");

$row=selectrecord('tbl_folder');
$data_terminal=$fd=array();
foreach ($row as $k => $v) 
{
	if($v['kode']!='')
	{
		$data_terminal[$v['lokasi_kamera']][$v['kode']]=$v['folder'];
		$fdd[]=$v['folder'];
	}
}

	// $data_terminal=array(
	// 		"giwangan" => array(
	// 			"jg1"=>"194243a1-68f5-4e10-9fce-f8914e37d9d1",
	// 			"jg2"=>"0c448fac-f403-411f-a99a-90cd17441361","jg3"=>"5f50deaf-aac8-4eff-a82f-25274aeb5a8d",
	// 			"jg4"=>"02bf57e8-3e24-47f9-9326-22a3053ed99f",
	// 			"jg5"=>"3f2fbf63-368f-452e-8424-137c88613403","jg6"=>"6df639cc-9b34-4cc3-8062-23d650c576d5"),
	// 		"soekarno" => array(
	// 			"kl1"=>"b1db04ab-d030-4f77-9272-c7d97ed70e6a","kl2"=>"7fa65726-40e1-42e5-b439-afb1b9fdcf66",
	// 			"kl3"=>"cd52de4a-9a6c-497e-806d-5a0e17d4dc53","kl4"=>"19ac5477-db64-4339-81ca-eeccdb852405",
	// 			"kl5"=>"edb56316-2488-4221-bcdd-bfdaa61ae066","kl6"=>"bb7ded47-4fa6-491a-a618-e0dd424817eb"),
	// 		"tirtonadi" => array(
	// 			"sl1"=>"51302a4b-5ea4-4d54-a884-dfe29747f780","sl2"=>"552485c5-27f0-4d8f-9389-5f687cf1e548",
	// 			"sl3"=>"dd72020b-18a8-49f9-a1cd-605f00220508","sl4"=>"4d0783ac-0d68-4c45-8440-451a2a55c7ce",
	// 			"sl5"=>"304c3c86-73ed-4d2c-a25a-4edad14ef9a5","sl6"=>"8dce6c88-eb46-402e-8307-ac6ff7cd7de2"),
	// 		"purabaya"=>array(
	// 			"sd1"=>"9a98fa5e-c9d2-40e6-9a9f-e6f049a13fc2","sd2"=>"0334245e-79f3-42eb-8bda-ad991935ce43",
	// 			"sd3"=>"f440687e-722f-4797-b95d-bf5bceefbc94","sd4"=>"b18c5818-d3f8-444e-b057-1d6c9d9eec5c",
	// 			"sd5"=>"9df51a27-dba8-4318-8f6f-46bbb8243146","sd6"=>"74b5e886-2da2-4607-b8d1-b09c28e296f8")
	// 	);

if(isset($argv[1]))
{
	$fol=$argv[1];
	if($fol=='giwangan' || $fol=='soekarno' || $fol=='tirtonadi' || $fol=='purabaya')
		$fd=$data_terminal[$fol];
	else
		$fd=array($fol);
}
else if(isset($_GET['dir']))
{
	$fol=$_GET['dir'];
	if($fol=='giwangan' || $fol=='soekarno' || $fol=='tirtonadi' || $fol=='purabaya')
		$fd=$data_terminal[$fol];
	else
		$fd=array($fol);
}
else
	$fd=$fdd;
	// $fd=array('194243a1-68f5-4e10-9fce-f8914e37d9d1','5f50deaf-aac8-4eff-a82f-25274aeb5a8d','0c448fac-f403-411f-a99a-90cd17441361','02bf57e8-3e24-47f9-9326-22a3053ed99f','3f2fbf63-368f-452e-8424-137c88613403','6df639cc-9b34-4cc3-8062-23d650c576d5','9a98fa5e-c9d2-40e6-9a9f-e6f049a13fc2','0334245e-79f3-42eb-8bda-ad991935ce43','f440687e-722f-4797-b95d-bf5bceefbc94','b18c5818-d3f8-444e-b057-1d6c9d9eec5c','9df51a27-dba8-4318-8f6f-46bbb8243146','74b5e886-2da2-4607-b8d1-b09c28e296f8','51302a4b-5ea4-4d54-a884-dfe29747f780','552485c5-27f0-4d8f-9389-5f687cf1e548','dd72020b-18a8-49f9-a1cd-605f00220508','4d0783ac-0d68-4c45-8440-451a2a55c7ce','304c3c86-73ed-4d2c-a25a-4edad14ef9a5','8dce6c88-eb46-402e-8307-ac6ff7cd7de2','b1db04ab-d030-4f77-9272-c7d97ed70e6a','7fa65726-40e1-42e5-b439-afb1b9fdcf66','cd52de4a-9a6c-497e-806d-5a0e17d4dc53','19ac5477-db64-4339-81ca-eeccdb852405','edb56316-2488-4221-bcdd-bfdaa61ae066','bb7ded47-4fa6-491a-a618-e0dd424817eb');

// print_r($fd);
foreach ($fd as $kf => $vff) 
{
	$foldername=$vff;
	$getID3 = new getID3;

	// $folder = "E:/Recording/Terbaru/".$foldername;
	$folder = RECORDING_DIR.$foldername;
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
	$dirtarget=str_replace('/', '\\', $folder).'\asf'. trim(' \ ');
	$dirtargetmp4=str_replace('/', '\\', $folder).'\mp4'. trim(' \ ');

	if(!in_array('mp4', $getdir))
		mkdir($folder .'/mp4',0777);

	if(!in_array('asf', $getdir))
		mkdir($folder .'/asf',0777);

	$d_acsm=$mp4_array_before=array();
	if( $files['acsm'] != null)
	{

		$files['acsm'] = array_slice($files['acsm'], 1, count($files['acsm']) - 1);
		$d_acsm=$files['acsm'];
		$total=0;
		$mp4_data=$mp4_data2='';
		$mp4_array=$mp4_array2=$data_array=array();
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
			$hi=$nf1.' '.$jm.':'.$mn.':'.$dt;
			$gettime=(date('H')-1);
			$getminute=(date('i')-10);
			$kmrin=date('Y-m-d', strtotime('-1 days'));

			$date = date_create(date('Y-m-d H:i:s'));
			// echo date('Y-m-d H:i:s').'<br>';
			date_add($date, date_interval_create_from_date_string('-65 minutes'));
			// date_add($date, date_interval_create_from_date_string('-1 hours'));
			$cekwaktu=date_format($date, 'Y-m-d H:i:s');
			// $beda=date_diff($cekwaktu, $hi);
			// if(date('Y-m-d')==$nf1 || $nf1==$kmrin)
				// echo $cekwaktu.'-'.$hi."\n";
			if($hi>=$cekwaktu)
			{
						if(file_exists($dirtarget.$asf_name) == false)
						{
							convertAcsmToAsf($acsm, $dirtarget);
							// rename($asf, $dirtarget.$asf_name);
							$ukuran=filesize($asf);
							$d = $getID3->analyze($asf);
							$durasi = $d['playtime_string'];
							$cdur=cdur($durasi);
							$lama=lamawaktu($durasi);
							if(file_exists($dirtargetmp4.$mp4_name) == false)
							{
								if($lama>=120)
								{
									$bagi=120/30;
									$cp=$fnfi=array();
									for($i=$bagi;$i>=1;$i--)
									{
										if($i==1)
										{
											$n=convertAsfToMp42($lama,$asf,$namafile, $mp4,$cdur,(30*$i),(30-1));
										}
										else
											$n=convertAsfToMp42($lama,$asf,$namafile, $mp4,$cdur,(30*$i),30);
										// echo $n;
										list($nfi,$output)=explode('||', $n);
										$nn=explode('\\', $nfi);
										$new=$nn[count($nn)-1];
										// echo $nfi.'-'.$new;
										$cp[]=$output;
										$fnfi[$nfi]=$dirtargetmp4.$new;
										// $mp4_array_before[]=$asf_name;
										
										// echo '<br>';
									}
									$link=join(' ',$cp);
									// echo '<pre>';
									$link= 'C:\\FFmpegTool\\bin\\ffmpeg.exe -y -i "'.$asf.'" '.$link;
									shell_exec($link);
									rename($asf, $dirtarget.$asf_name);

									foreach ($fnfi as $kf => $vf) 
									{
										rename($kf, $vf);
											// unlink($kf);
									}
									
								}
								else
								{
									if($lama>=30)
									{
										$bagi=$lama/30;
										$sisabagi=$lama % 30;
										if($sisabagi>=0)
											$bagi=ceil($bagi);

										$cp=$fnfi=array();
										for($i=$bagi;$i>=1;$i--)
										{

											if($i==1)
											{
												$sisabagi=(($lama % 30) -1 );
												$x=$lama % 30;
											}
											else if($i==$bagi)
											{
												$sisabagi=30;
												$x=$lama;
											}
											else
											{
												$sisabagi=30;
												$x=(30*$i)-(30-($lama % 30));
											}
											$n=convertAsfToMp422($asf,$namafile, $mp4,$cdur,$x,$sisabagi);
											list($nfi,$output)=explode('||', $n);
											$nn=explode('\\', $nfi);
											$new=$nn[count($nn)-1];
											// echo $nfi.'-'.$new;
											$cp[]=$output;
											// echo '<br>';
											// $nn=explode('\\', $n);
											// $new=$nn[count($nn)-1];
											// $mp4_array_before[]=$asf_name;
											$fnfi[$nfi]=$dirtargetmp4.$new;
										}
										$link=join(' ',$cp);
									// echo '<pre>';
										$link= 'C:\\FFmpegTool\\bin\\ffmpeg.exe -y -i "'.$asf.'" '.$link;
										// echo $link.'<br>';	
										shell_exec($link);
										rename($asf, $dirtarget.$asf_name);
										foreach ($fnfi as $kf => $vf) 
										{
											rename($kf, $vf);
												// unlink($kf);
										}
									}
									else
									{
										convertAsfToMp4($asf,$mp4);
										getThumb($asf,$namafile);
										rename($mp4, $dirtargetmp4.$mp4_name);
										rename($asf, $dirtarget.$asf_name);
									}
								}
							}

						}
						else
						{
							$ukuran=filesize($dirtarget.$asf_name);
							$d = $getID3->analyze($dirtarget.$asf_name);
							$durasi = $d['playtime_string'];

						}
							$data_array[]=$dirtarget.$asf_name.' ['.formatSizeUnits($ukuran).'] ['.($durasi).']';
					
				
			}
			else
			{
				$acsms = array_slice($d_acsm, 0,2,true);
				foreach ($acsms as $k => $acsm) {
				# code...
				$asf = dirname($acsm) . trim(' \ ') . strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".asf";
				$file_acsm = dirname($acsm) . trim(' \ ') . strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".acsm";
				$asf_name=strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".asf";
				$mp4 = dirname($acsm) . trim(' \ ') . strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".mp4";
				$mp4_name=strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".mp4";
				$namafile=pathinfo($acsm, PATHINFO_FILENAME);
				
				if(file_exists($dirtarget.$asf_name) == false)
				{
				// echo 'aa';
							convertAcsmToAsf($acsm, $dirtarget);
							// rename($asf, $dirtarget.$asf_name);
							$ukuran=filesize($asf);
							$d = $getID3->analyze($asf);
							$durasi = $d['playtime_string'];
							$cdur=cdur($durasi);
							$lama=lamawaktu($durasi);
							if(file_exists($dirtargetmp4.$mp4_name) == false)
							{
								if($lama>=120)
								{
									$bagi=120/30;
									$cp=$fnfi=array();
									for($i=$bagi;$i>=1;$i--)
									{

										if($i==1)
										{
											$n=convertAsfToMp42($lama,$asf,$namafile, $mp4,$cdur,(30*$i),(30-1));
										}
										else
											$n=convertAsfToMp42($lama,$asf,$namafile, $mp4,$cdur,(30*$i),30);
										// echo $n;
										list($nfi,$output)=explode('||', $n);
										$nn=explode('\\', $nfi);
										$new=$nn[count($nn)-1];
										// echo $nfi.'-'.$new;
										$cp[]=$output;
										$fnfi[$nfi]=$dirtargetmp4.$new;
										
									// echo '<br>----------------------------<br>';
									}
									$link=join(' ',$cp);
									$link= 'C:\\FFmpegTool\\bin\\ffmpeg.exe -y -i "'.$asf.'" '.$link;
									// echo $link;
									shell_exec($link);
									rename($asf, $dirtarget.$asf_name);
									foreach ($fnfi as $kf => $vf) 
									{
										rename($kf, $vf);
											// unlink($kf);
									}
									$data_array[]=$dirtarget.$asf_name.' ['.formatSizeUnits($ukuran).'] ['.($durasi).']';
								}
								else
								{
									if($lama>=30)
									{
										$bagi=$lama/30;
										$sisabagi=$lama % 30;
										if($sisabagi>=0)
											$bagi=ceil($bagi);

										$cp=$fnfi=array();
										for($i=$bagi;$i>=1;$i--)
										{

											if($i==1)
											{
												$sisabagi=$lama % 30;
												$x=$lama % 30;
											}
											else if($i==$bagi)
											{
												$sisabagi=30;
												$x=$lama;
											}
											else
											{
												$sisabagi=30;
												$x=(30*$i)-(30-($lama % 30));
											}
											$n=convertAsfToMp422($asf,$namafile, $mp4,$cdur,$x,$sisabagi);
											list($nfi,$output)=explode('||', $n);
											$nn=explode('\\', $nfi);
											$new=$nn[count($nn)-1];
											// echo $nfi.'-'.$new;
											$cp[]=$output;
											$fnfi[$nfi]=$dirtargetmp4.$new;

											// $mp4_array_before[]=$asf_name;
											// rename($nfi, $dirtargetmp4.$new);
										}
										$link=join(' ',$cp);
									// echo '<pre>';
										$link= 'C:\\FFmpegTool\\bin\\ffmpeg.exe -y -i "'.$asf.'" '.$link;
										// echo $link.'<br>';	
										shell_exec($link);
										rename($asf, $dirtarget.$asf_name);
										// rename($asf, $dirtargetasf.$asf_name);
										foreach ($fnfi as $kf => $vf) 
										{

											// echo $kf.'<br>'.$vf.'<br>';
											rename($kf, $vf);
											// unlink("$kf");
											// echo '---------------------------<br>';
										}
									}
									else
									{
										convertAsfToMp4($asf,$mp4);
										getThumb($asf,$namafile);
										rename($mp4, $dirtargetmp4.$mp4_name);
										rename($asf, $dirtarget.$asf_name);
									}
								}
							}
						}
						else
						{
							if(file_exists($dirtargetmp4.$mp4_name) == false)
							{
								$ukuran=filesize($dirtarget.$asf_name);
								$d = $getID3->analyze($dirtarget.$asf_name);
								$durasi = $d['playtime_string'];
								// echo $asf.'<br>';
								// echo $namafile.'<br>';

							}
							// else
							// 	echo $mp4_name.'Ada<br>';
						}
					}
			}
		}
		
		
		// echo '<pre>';
		// print_r($data_array);
		// echo '</pre>';
	}
	echo '<br>';
	echo "\n".$vff.' Sudah Selesai : Updated '.date('Y-m-d H:i:s');

}
?>

</body>
</html>