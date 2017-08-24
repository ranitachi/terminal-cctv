<title>Solo - SL2</title>
<?PHP 
include ("_Functions.php");

$folder = "E:/Recording/Terbaru/ce979aaf-fe47-4e80-a6e7-16c56cc73c5e";
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

/*Delete each files (asf, acsm, acsi, mp4), leaving only 10 files*/
if($files['acsm'] != null and count($files['acsm']) > 10)
{
	$files['acsm'] = deleteFiles ($files['acsm']);
}

if($files['acsi'] != null and count($files['acsi']) > 10)
{
	$files['acsi'] = deleteFiles ($files['acsi']);
}

if($files['asf'] != null and count($files['asf']) > 10)
{
	$files['asf'] = deleteFiles ($files['asf']);
}

if($files['mp4'] != null and count($files['mp4']) > 10)
{
	$files['mp4'] = deleteFiles ($files['mp4']);
}

/*Conversion process*/
if( $files['acsm'] != null and count($files['acsm']) >= 2)
{
	$files['acsm'] = array_slice($files['acsm'], 1, count($files['acsm']) - 1);
	while($files['acsm'])
	{
		$acsm = array_pop($files['acsm']);
		$asf = dirname($acsm) . trim(' \ ') . strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".asf";
		$mp4 = dirname($acsm) . trim(' \ ') . strtolower(pathinfo($acsm, PATHINFO_FILENAME)) . ".mp4";
		
		if(file_exists($asf) == false)
		{
			convertAcsmToAsf($acsm, dirname($acsm));
		}
		
		if(file_exists($mp4) == false)
		{
			$d = getVideoDuration($asf);
			convertAsfToMp4($asf, $mp4, $d);
		}
	}
}
?>

<DIV STYLE="TEXT-ALIGN:CENTER">
<H1>TOLONG JANGAN TUTUP HALAMAN INI</H1>
<H3>SCHEDULER CONVERTER ACSM KE MP4</H3>
<H4>TERMINAL TIRTONADI - KEDATANGAN BUS</H4>
</DIV>

<?PHP include("_FunctionFooter.PHP"); ?>