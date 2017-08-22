<title>Jogja - JG5</title>
<?PHP

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

$folder = "E:/Recording/e6497eba-bf16-4b72-8f45-be5f04354903";
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

/*Delete each files (asf, acsm, acsi), leaving only 5 files*/
if($files['acsm'] != null and count($files['acsm']) >= 10)
{
	$removedAcsmFiles = array_slice($files['acsm'], 10, count($files['acsm']));
	while($removedAcsmFiles)
		unlink(array_pop($removedAcsmFiles));
}

if($files['acsi'] != null and count($files['acsi']) >= 10)
{
	$removedAcsiFiles = array_slice($files['acsi'], 10, count($files['acsi']));
	while($removedAcsiFiles)
		unlink(array_pop($removedAcsiFiles));
}

if($files['asf'] != null and count($files['asf']) >= 10)
{
	$removedAsfFiles = array_slice($files['asf'], 10, count($files['asf']));
	while($removedAsfFiles)
		unlink(array_pop($removedAsfFiles));
}

if($files['mp4'] != null and count($files['mp4']) >= 10)
{
	$removedMp4Files = array_slice($files['mp4'], 10, count($files['mp4']));
	while($removedMp4Files)
		unlink(array_pop($removedMp4Files));
}

/*Check whether .asf file is exist, if available then show it in to web page.
	If not exist, then convert .acsm file into asf file. */
if( $files['acsm'] != null and count($files['acsm']) >= 2)
{
	//Get latest file order by filename descending
	$latestAcsm = array_slice($files['acsm'], 1, 1);
	$latestAcsm = implode('', $latestAcsm);
	
	$SearchAsf = dirname($latestAcsm) . trim('\ ') . strtolower(pathinfo($latestAcsm, PATHINFO_FILENAME)) . ".asf";
	$SearchMp4 = dirname($latestAcsm) . trim('\ ') . strtolower(pathinfo($latestAcsm, PATHINFO_FILENAME)) . ".mp4";
	//echo $SearchAsf . '<br />';
	//echo $SearchMp4 . '<br />';
	//var_dump($files['mp4']);exit;
	
	if( $files['asf'] != null) 
	{
		if(in_array($SearchAsf, $files['asf']) == false and 
		   in_array($SearchMp4, $files['mp4']) == false) //Kalau file asf dan mp4 tidak ada, maka create asf dulu
		{
			//First remove all .asf files,
			while($files['asf'])
				unlink(array_pop($files['asf']));
			
			//Then rebuild .asf again
			$src = $latestAcsm;
			$dst = dirname($latestAcsm) . trim(' \ ');
			$param = $src . ' ' . $dst;
			$param = str_replace(trim(' \ '), '/', $param);
			
			//Change current directory
			chdir("C:/Program Files/Axis Communications/AXIS Camera Station/");
			
			//Run RecordingToAsfConverter.exe using command prompt
			$output = shell_exec("RecordingToAsfConverter.exe " . $param);
		}
		else if (in_array($SearchAsf, $files['asf']) == true and 
				 $files['mp4'] == null) //Kalau file asf ada dan file mp4 belum ada sama sekali, maka create mp4
		{
			//Change current directory
			chdir("C:\FFmpegTool\bin");
			
			//Get duration of .asf
			$output = shell_exec('ffmpeg -i "' . $SearchAsf . '" 2>&1');
			
			$regexp = "/Duration: ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2}).([0-9]{1,2})/";
			preg_match($regexp, $output, $matches);
			
			$duration = ((int)$matches[1] * 3600) + ((int)$matches[2] * 60) + (int)$matches[3];
			
			if($duration > 60)
			{
				//Change current directory
				chdir("C:\FFmpegTool\bin");
				
				//Run RecordingToAsfConverter.exe using command prompt
				shell_exec ('ffmpeg -v quiet -y -i "'.$SearchAsf.'" -vcodec copy -acodec copy -ss 00:00:00 -t 00:01:01 -sn "' . dirname($SearchAsf) . trim(' \ ') . strtolower(pathinfo($SearchAsf, PATHINFO_FILENAME)) . '.mp4"');
			}
			else{
				//Change current directory
				chdir("C:\FFmpegTool\bin");
				
				//Run RecordingToAsfConverter.exe using command prompt
				$output = shell_exec('ffmpeg -i "' . $SearchAsf . '" "' . dirname($SearchAsf) . trim(' \ ') . strtolower(pathinfo($SearchAsf, PATHINFO_FILENAME)) . '.mp4"');
			}
			
			//echo $output;
		}
		else if (in_array($SearchAsf, $files['asf']) == true and 
				 in_array($SearchMp4, $files['mp4']) == false) //Kalau file asf ada dan file mp4 ada namun tidak ada yang dicari, maka create mp4
		{
			//Change current directory
			chdir("C:\FFmpegTool\bin");
			
			//Get duration of .asf
			$output = shell_exec('ffmpeg -i "' . $SearchAsf . '" 2>&1');
			
			$regexp = "/Duration: ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2}).([0-9]{1,2})/";
			preg_match($regexp, $output, $matches);
			
			$duration = ((int)$matches[1] * 3600) + ((int)$matches[2] * 60) + (int)$matches[3];
			
			if($duration > 60)
			{
				//Change current directory
				chdir("C:\FFmpegTool\bin");
				
				//Run RecordingToAsfConverter.exe using command prompt
				shell_exec ('ffmpeg -v quiet -y -i "'.$SearchAsf.'" -vcodec copy -acodec copy -ss 00:00:00 -t 00:01:01 -sn "' . dirname($SearchAsf) . trim(' \ ') . strtolower(pathinfo($SearchAsf, PATHINFO_FILENAME)) . '.mp4"');
			}
			else{
				//Change current directory
				chdir("C:\FFmpegTool\bin");
				
				//Run RecordingToAsfConverter.exe using command prompt
				$output = shell_exec('ffmpeg -i "' . $SearchAsf . '" "' . dirname($SearchAsf) . trim(' \ ') . strtolower(pathinfo($SearchAsf, PATHINFO_FILENAME)) . '.mp4"');
			}
			//echo $output;
		}
	}
	else{
		//Build .asf
		$src = $latestAcsm;
		$dst = dirname($latestAcsm) . trim(' \ ');
		$param = $src . ' ' . $dst;
		$param = str_replace(trim(' \ '), '/', $param);
		//echo $param ;
		
		//Change current directory
		chdir("C:/Program Files/Axis Communications/AXIS Camera Station/");
		
		//Run RecordingToAsfConverter.exe using command prompt
		$output = shell_exec("RecordingToAsfConverter.exe " . $param);
	}
}
?>

<DIV STYLE="TEXT-ALIGN:CENTER">
<H1>TOLONG JANGAN TUTUP HALAMAN INI</H1>
<H3>SCHEDULER CONVERTER ACSM KE MP4</H3>
<H4>TERMINAL GIWANGAN - KEDATANGAN BUS</H4>
</DIV>

<script type="text/javascript">

/*
setTimeout(function(){
   window.location.reload(1);
}, 20000);
*/

</script>