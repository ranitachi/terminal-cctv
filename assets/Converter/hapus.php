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
			if(isset($files['acsm']))krsort($files['acsm']);
			if(isset($files['acsi']))krsort($files['acsi']);
			if(isset($files['asf']))krsort($files['asf']);
			if(isset($files['mp4']))krsort($files['mp4']);
			$getdir=scandir($folder.$vd);

			$hapus = glob($folder.$vd.'/mp4/{,.}*', GLOB_BRACE);

			foreach($hapus as $file){ // iterate files
			  if(is_file($file))
			    unlink($file); // delete file
				// echo $file.'<br>';
			}
			$dirtarget=str_replace('/', '\\', $folder.$vd).'\mp4'. trim(' \ ');

			if(!in_array('mp4', $getdir))
				mkdir($folder .'/mp4',0777);
			if( $files['acsm'] != null)
			{
				$files['acsm'] = array_slice($files['acsm'], 1, count($files['acsm']) - 1);
				$mp4_array=array();
				while($files['acsm'])
				{
					$acsm = array_pop($files['acsm']);
					$asf = dirname($acsm) . trim(' \ ') . strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".asf";
					$asf_name=strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".asf";
					$mp4 = dirname($acsm) . trim(' \ ') . strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".mp4";
					$mp4_name=strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".mp4";
					
					$namafile=pathinfo($acsm, PATHINFO_FILENAME);
					
				}
			}
		}
	}


?>