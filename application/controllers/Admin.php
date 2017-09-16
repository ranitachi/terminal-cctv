<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once('Welcome.php');
class Admin extends Welcome {

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('pesan','Anda Sudah Berhasil Logout');
			redirect('login','location');
	}

	public function index()
	{
		$us=$this->session->userdata('user');
		if($us->level!=1)
		{
			redirect('admin/terminal','redirect');
		}
    $data['menu']='home';
		$data['konten']='admin/isi/index';
		$term=$this->db->from('tbl_terminal')->where('status_tampil','1')->get()->result();
		$cctv=$this->db->from('tbl_cctv')->where('status_tampil','1')->get()->result();
		$berita=$this->db->from('tbl_news')->where('status','1')->get()->result();
		$data['term']=$term;
		$data['cctv']=$cctv;
		$data['news']=$berita;
		$this->load->view('admin/index',$data);
	}

  public function terminal()
	{
		$us=$this->session->userdata('user');
		$data['admin']=1;
		$data['user']=$us;
		if($this->session->userdata('logged')=='true')
		{
			if($us->terminal_id!=-1)
			{
				$data['admin']=-1;
			}
		}
    $data['menu']='terminal';
		$data['konten']='terminal/index';
		$this->load->view('admin/index',$data);
	}
  public function cctv()
	{
		$us=$this->session->userdata('user');
		$data['user']=$us;
		$data['admin']=1;
		if($this->session->userdata('logged')=='true')
		{
			if($us->terminal_id!=-1)
			{
				$data['admin']=-1;
			}
		}
    $data['menu']='cctv';
		$data['konten']='cctv/index';
		$this->load->view('admin/index',$data);
	}
  public function user()
	{
    $data['menu']='user';
		$data['konten']='user/index';
		$this->load->view('admin/index',$data);
	}

	public function news()
	{
		$us=$this->session->userdata('user');
		$data['admin']=1;
		$data['user']=$us;
		if($this->session->userdata('logged')=='true')
		{
			if($us->terminal_id!=-1)
			{
				$data['admin']=-1;
			}
		}
    $data['menu']='news';
		$data['konten']='news/index';
		$this->load->view('admin/index',$data);
	}
	public function schedule()
	{
		$us=$this->session->userdata('user');
		$data['admin']=1;
		$data['user']=$us;
		if($this->session->userdata('logged')=='true')
		{
			if($us->terminal_id!=-1)
			{
				$data['admin']=-1;
			}
		}
    $data['menu']='schedule';
		$data['konten']='schedule/index';
		$this->load->view('admin/index',$data);
	}


}
