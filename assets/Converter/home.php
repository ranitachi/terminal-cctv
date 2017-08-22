<?php
include_once ('_Functions.php');
if(!empty($_POST))
{
	// f
	$up=$_POST;
	unset($up['id']);
	$wh=array('id'=>$_POST['id']);
	updaterecord('tbl_folder',$up,$wh);
}

createtable('tbl_folder');
$dir=scandir(RECORDING_DIR);
$kon=koneksi();

echo '<table border="1" cellpadding="2" cellspacing="2" width="100%">';
echo '<tr>
	<th>No</th>
	<th>Folder</th>
	<th>Kode</th>
	<th>Nama Kamera</th>
	<th>Lokasi Kamera</th>
	<th>Action</th>
</tr>';
$no=1;
foreach ($dir as $k => $v) 
{
	if($v!='.' && $v!='..')
	{
		$row=cekrecord('tbl_folder',array('folder'=>$v,'status_tampil'=>'1'));
		if(!is_object($row) && $row==0)
		{
			mysqli_query($kon,'insert into tbl_folder (folder,status_tampil) values("'.$v.'","1")');
		}
		else
		{		
				// echo '<pre>';
				// print_r($row);
				// echo '</pre>';
			$d=mysqli_fetch_assoc($row);
			if($no%2==0)
			{
				$bg='background-color:#ddd;text-align:center';
				$bg2='background-color:#eee;text-align:center';
			}
			else
				$bg=$bg2='text-align:center';
			echo '<form action="home.php" method="post">';
			echo '<tr>';
				echo '<input type="hidden" name="id" value="'.$d['id'].'">';
				echo '<td style="text-align:center;'.$bg.'">'.$no.'</td>';
				echo '<td style="text-align:center;'.$bg.'"><input type="text" name="folder" value="'.$d['folder'].'" style="width:100%;'.$bg.'"></td>';
				echo '<td style="text-align:center;'.$bg.'"><input type="text" name="kode" value="'.$d['kode'].'" style="width:100%;'.$bg.'"></td>';
				echo '<td style="text-align:center;'.$bg.'"><input type="text" name="nama_kamera" value="'.$d['nama_kamera'].'"  style="width:100%;'.$bg2.'"></td>';
				echo '<td style="text-align:center;'.$bg.'"><input type="text" name="lokasi_kamera" value="'.$d['lokasi_kamera'].'"  style="width:100%;'.$bg2.'"></td>';
				echo '<td style="text-align:center;'.$bg.'"><button type="submit">Edit</button><button type="button" onclick="hapuskamera(\''.$d['id'].'\')">Hapus</button></td>';
			echo '</tr>';
			echo '</form>';
			$no++;
		}
		// echo $row.'<br>';
	}
}
echo '</table>';

?>
<script type="text/javascript">
	function hapuskamera(id)
	{

	}
</script>