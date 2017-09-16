<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once('Welcome.php');
class News extends Welcome {
	public function index()
	{
		$d=$this->db->from('tbl_news')->where('status','1')->order_by('waktu_input','desc')->get()->result();
		$data['d']=$d;
		$data['konten']='front/news/index';
		$this->load->view('front/index',$data);
	}
	public function title($title='')
	{
		$nw=$this->config->item('news_title');
		foreach ($nw as $k => $v)
		{
			if($title===$k)
			{
				$data['d']=$v;
				$data['konten']='front/news/detail';
				$this->load->view('front/index',$data);
			}
		}
		// if()
	}
	public function data($id=-1)
	{
		$data['id']=$id;
		$d=$this->db->from('tbl_news')->where('status','1')->order_by('waktu_input','desc')->get()->result();

		$us=$this->session->userdata('user');
		$data['user']=$us;
		if($this->session->userdata('logged')=='true')
		{
				if($us->terminal_id!=-1)
				{
					$d=$this->db->from('tbl_news')->where('status','1')->where('terminal_id',$us->terminal_id)->order_by('waktu_input','desc')->get()->result();
					$data['admin']=-1;
				}
		}

		$data['d']=$d;
  	$this->load->view('news/data',$data);
	}
	public function form($id=-1)
	{
		$trm=$this->config->item('terminal');
		$data['terminal']=$trm;
		$data['id']=$id;
		$us=$this->session->userdata('user');
		$data['user']=$us;
		if($this->session->userdata('logged')=='true')
		{
				if($us->terminal_id!=-1)
				{
					$data['term']=$trm[$us->terminal_id];
					$data['admin']=-1;
				}
		}
		if($id!=-1)
		{
			$d=$this->db->from('tbl_news')->where('id',$id)->where('status','1')->order_by('waktu_input','desc')->get()->result();
			$data['det']=$d;
		}
		$this->load->view('news/form',$data);
	}

	public function process($id=-1)
	{
		if(!empty($_POST))
		{
			if($id!=-1)
			{
					$gbr=$_POST['gambar'];
					unset($_POST['gambar']);
					$this->db->where('id',$id);
					$c=$this->db->update('tbl_news',$_POST);

					if($gbr!='')
	        {
	            $this->db->set('gambar',$gbr);
	            $this->db->where('id',$id);
	            $this->db->update('tbl_news');
	        }

					if($c)
						echo 'Data Berita Berhasil Di Update';
					else
						echo 'Data Berita Gagal Di Update';
			}
			else
			{
					$c=$this->db->insert('tbl_news',$_POST);
					if($c)
						echo 'Data Berita Berhasil Di Tambah';
					else
						echo 'Data Berita Gagal Di Tambah';
			}
		}
		else {
			echo 'Data Berita Gagal Di Tambah';
		}
	}
	public function hapus($id)
	{
		$this->db->where('id',$id);
		$this->db->set('status','0');
		$c=$this->db->update('tbl_news');
		if($c)
			echo 'Data Berita Berhasil Di Hapus';
		else
			echo  'Data Berita Gagal Di Hapus';
	}
}
