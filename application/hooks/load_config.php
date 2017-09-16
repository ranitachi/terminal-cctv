<?php
/*CREATE TABLE `tbl_terminal` (
  `id` int(11) NOT NULL,
  `nama_terminal` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `about_us` text NOT NULL,
  `video_profile` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `status_tampil` char(1) NOT NULL DEFAULT '1',
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
*/

function load_config()
{
	$ci =& get_instance();
	$ci->load->dbforge();


	if(!$ci->db->table_exists('tbl_aboutus'))
	{
		$q="CREATE TABLE `tbl_aboutus` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `konten` TEXT DEFAULT NULL,
			PRIMARY KEY (`id`)
		)ENGINE=MyISAM DEFAULT CHARSET=latin1;";
		$ci->db->query($q);
	}
	if(!$ci->db->table_exists('tbl_video_profile'))
	{
		$q="CREATE TABLE `tbl_video_profile` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `judul` VARCHAR(255) DEFAULT NULL,
		  `tanggal` DATETIME DEFAULT NULL,
		  `video` VARCHAR(255) DEFAULT NULL,
		  `status_tampil` CHAR(1) DEFAULT '1',
			PRIMARY KEY (`id`)
		)ENGINE=MyISAM DEFAULT CHARSET=latin1;";
		$ci->db->query($q);
	}
	if(!$ci->db->table_exists('tbl_schedule'))
	{
		$q="CREATE TABLE `tbl_schedule` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `judul` VARCHAR(255) DEFAULT NULL,
		  `tanggal` DATETIME DEFAULT NULL,
		  `file` VARCHAR(255) DEFAULT NULL,
		  `status_tampil` CHAR(1) DEFAULT '1',
		  `terminal_id` INT ,
			PRIMARY KEY (`id`)
		)ENGINE=MyISAM DEFAULT CHARSET=latin1;";
		$ci->db->query($q);
	}

	if(!$ci->db->table_exists('tbl_news'))
	{
		$q="CREATE TABLE `tbl_news` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `judul` varchar(255) DEFAULT NULL,
		  `waktu_input` datetime DEFAULT NULL,
		  `waktu_publish` datetime DEFAULT NULL,
		  `konten` text,
		  `status` char(1) DEFAULT '1',
		  `author` varchar(255) DEFAULT NULL,
		  `gambar` varchar(255) DEFAULT NULL,
		  `kategori_tulisan` varchar(50) DEFAULT 'news',
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
		$ci->db->query($q);
	}
	if(!$ci->db->table_exists('tbl_level'))
	{
		$q="CREATE TABLE `tbl_level` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `level` varchar(255) NOT NULL,
			  `deskripsi` text NOT NULL,
			  `status_tampil` smallint(6) NOT NULL,
				PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		$ci->db->query($q);

		$q1="INSERT INTO `tbl_level` (`id`, `level`, `deskripsi`, `status_tampil`) VALUES
			(1, 'Administrator', 'Admin Kapus', 1),
			(2, 'Kontributor Isi', 'Kontributor Isi Kapus', 1),
			(3, 'Admin Terminal', 'Admin Terminal', 1),
			(4, 'User Terminal', 'User Terminal', 1);";
		$ci->db->query($q1);

	}

	$news=$ci->db->from('tbl_news')->where('status','1')->get()->result();
	$n1=$n2=array();
	foreach ($news as $k => $v)
	{
		$n1[$v->id]=$v;
		$n2[cleartext($v->judul)]=$v;
	}
	$ci->config->set_item('news_id',$n1);
	$ci->config->set_item('news_title',$n2);


	$term=$ci->db->from('tbl_terminal')->where('status_tampil','1')->order_by('nama_terminal')->get()->result();
	$t=array();
	foreach ($term as $k => $v)
	{
		$t[$v->id]=$v;
	}
	$ci->config->set_item('terminal',$t);

	if (!$ci->db->field_exists('tujuan_datang', 'tbl_schedule'))
	{
	    $sqr="ALTER TABLE `tbl_schedule` ADD `tujuan_datang` VARCHAR(255) NULL AFTER `terminal_id`, ADD `waktu_datang` VARCHAR(20)  NULL AFTER `tujuan_datang`, ADD `operator_datang` VARCHAR(255)  NULL AFTER `waktu_datang`, ADD `tujuan_berangkat` VARCHAR(255)  NULL AFTER `operator_datang`, ADD `waktu_berangkat` VARCHAR(20)  NULL AFTER `tujuan_berangkat`, ADD `operator_berangkat` VARCHAR(255)  NULL AFTER `waktu_berangkat`;";
			$ci->db->query($sqr);
	}
	if (!$ci->db->field_exists('terminal_id', 'tbl_user'))
	{
			$fields = array(
						'terminal_id' => array(
							'type' => 'CHAR',
									'constraint' => '10'
							)
		);
		$ci->dbforge->add_column('tbl_user', $fields);
	}
	if (!$ci->db->field_exists('kode', 'tbl_cctv'))
	{
			$fields = array(
						'kode' => array(
							'type' => 'CHAR',
									'constraint' => '10'
							)
		);
		$ci->dbforge->add_column('tbl_cctv', $fields);
	}
	if (!$ci->db->field_exists('lat_koord', 'tbl_terminal'))
	{
			$fields = array(
						'lat_koord' => array(
								'type' => 'CHAR',
									'constraint' => '10'
							),
							'long_koord' => array(
								'type' => 'CHAR',
								'constraint' => '10'
							),
		);
		$ci->dbforge->add_column('tbl_terminal', $fields);
	}

	if (!$ci->db->field_exists('alamat', 'tbl_terminal'))
	{
			$fields = array(
						'alamat' => array(
							'type' => 'TEXT'
							)
		);
		$ci->dbforge->add_column('tbl_terminal', $fields);
	}

	if (!$ci->db->field_exists('terminal_id', 'tbl_berita'))
	{
			$fields = array(
						'terminal_id' => array(
							'type' => 'CHAR',
							'constraint' => '10'
						)
		);
		$ci->dbforge->add_column('tbl_berita', $fields);
	}

	if (!$ci->db->field_exists('terminal_id', 'tbl_news'))
	{
			$fields = array(
						'terminal_id' => array(
							'type' => 'CHAR',
							'constraint' => '10'
						)
		);
		$ci->dbforge->add_column('tbl_news', $fields);
	}

}
?>
