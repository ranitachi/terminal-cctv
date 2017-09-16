<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged')=='true')
			redirect('admin','location');
	}

	public function index()
	{
		$this->load->view('admin/login');
	}

  public function process()
  {
    if(!empty($_POST))
    {
			$data['user']=$_POST['user'];
			$data['pass']=sha1(md5($_POST['pass']));
			$cek=$this->db->from('tbl_user')->where($data)->get()->result();
			if(count($cek)!=0)
			{
				$user=$cek[0];
				$this->session->set_flashdata('pesan','Login Berhasil');
				$this->session->set_userdata('logged','true');
				$this->session->set_userdata('user',$user);
				redirect('admin','location');
			}
			else
			{
				$this->session->set_flashdata('pesan','Login Gagal, Silahkan Periksa Username dan Password');
				redirect('login','location');
			}
    }
    else
    {
        $this->session->set_flashdata('pesan','Login Gagal, Silahkan Periksa Username dan Password');
				redirect('login','location');
    }
  }
}
