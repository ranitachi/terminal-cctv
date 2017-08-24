<?php
include_once ('_Functions.php');
$row=selectrecord('tbl_folder');
$data_terminal=$fd=array();
foreach ($row as $k => $v) 
{
	if($v['kode']!='')
	{
		$data_terminal[$v['lokasi_kamera']][$v['kode']]=$v['folder'];
		$fd[]=$v['folder'];
	}
}
// echo '<pre>';
// print_r($fd);
// echo '</pre>';
?>