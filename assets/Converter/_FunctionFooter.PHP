<style>
td{font-size:12px;}
</style>

<b>Last 10 MP4 Files:</b>
<br />
<table>
<?PHP
	date_default_timezone_set('Asia/Jakarta');

	foreach($files["mp4"] as $key=>$val)
	{
		$d = getVideoDuration($val);
		echo "<tr><td>".$val." (".ceil(filesize($val)/1024)." Kb)</td> <td>in $d seconds</td> <td>(Date Created: ".date("d/m/Y H:i:s A", filemtime($val)).") </td></tr>";
	}
?>
</table>