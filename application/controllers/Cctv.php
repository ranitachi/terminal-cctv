<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once('Welcome.php');
class Cctv extends Welcome {
  public function data($id=-1)
	{


		$data['id']=$id;
    $d=$this->db->select('*')->select('tbl_cctv.ip as ip_cctv')->select('tbl_cctv.id as id_cctv')
          ->from('tbl_cctv')
          ->join("tbl_terminal", "tbl_terminal.id = tbl_cctv.terminal_id","inner")
          ->where('tbl_cctv.status_tampil','1')
          ->order_by('tbl_terminal.nama_terminal','asc')
          ->get()->result();

    $us=$this->session->userdata('user');
    $data['user']=$us;
    $data['admin']=1;
    if($this->session->userdata('logged')=='true')
    {
        if($us->terminal_id!=-1)
        {
          $d=$this->db->select('*')->select('tbl_cctv.ip as ip_cctv')->select('tbl_cctv.id as id_cctv')
                ->from('tbl_cctv')
                ->join("tbl_terminal", "tbl_terminal.id = tbl_cctv.terminal_id","inner")
                ->where('tbl_cctv.status_tampil','1')
                ->where('tbl_cctv.terminal_id',$us->terminal_id)
                ->order_by('tbl_terminal.nama_terminal','asc')
                ->get()->result();
          $data['admin']=-1;
        }
    }
    $data['d']=(count($d)!=0 ? $d : array());
		$this->load->view('cctv/data',$data);
	}
	public function form($id=-1)
	{
		$data['id']=$id;
    if($id!=-1)
    {
      $d=$this->db->select('*')->select('tbl_cctv.ip as ip_cctv')->select('tbl_cctv.id as id_cctv')
            ->from('tbl_cctv')
            ->join("tbl_terminal", "tbl_terminal.id = tbl_cctv.terminal_id","inner")
            ->where('tbl_cctv.status_tampil','1')
            ->where('tbl_cctv.id',$id)
            ->order_by('tbl_terminal.nama_terminal','asc')
            ->get()->result();
      $data['det']=$d;
    }

    $t=$this->db->from('tbl_terminal')->where('status_tampil','1')->order_by('nama_terminal','asc')->get()->result();

    $us=$this->session->userdata('user');
    $data['admin']=1;
    $data['user']=$us;
    if($this->session->userdata('logged')=='true')
    {
        if($us->terminal_id!=-1)
        {
          $t=$this->db->from('tbl_terminal')->where('id',$us->terminal_id)->where('status_tampil','1')->order_by('nama_terminal','asc')->get()->result();
          $data['admin']=-1;
        }
    }


    $data['term']=$t;
		$this->load->view('cctv/form',$data);
	}

  public function process($id=-1)
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
    if(!empty($_POST['nama_cctv']))
    {
  		if($id!=-1)
  		{
  			$this->db->where('id',$id);
  			$c=$this->db->update('tbl_cctv',$_POST);
  			if($c)
  				echo 'Data CCTV Berhasil Di Edit';
  			else
  				echo 'Data CCTV Gagal Di Edit';
  		}
  		else
  		{
  			$c=$this->db->insert('tbl_cctv',$_POST);
  			if($c)
  				echo 'Data CCTV Berhasil Di Tambah';
  			else
  				echo 'Data CCTV Gagal Di Tambah';
      }
		}
    else {
      echo 'Data CCTV Gagal Di Tambah';
      # code...
    }
	}
  public function hapus($id)
	{
		$this->db->where('id',$id);
		$this->db->set('status_tampil','0');
		$c=$this->db->update('tbl_cctv');
		if($c)
			echo 'Data CCTV Berhasil Di Hapus';
		else
			echo  'Data CCTV Gagal Di Hapus';
	}
  public function showcam($id=-1)
  {
    $data['id']=$id;
    $d=$this->db->select('*')->select('tbl_cctv.ip as ip_cctv')->select('tbl_cctv.id as id_cctv')
          ->from('tbl_cctv')
          ->join("tbl_terminal", "tbl_terminal.id = tbl_cctv.terminal_id","inner")
          ->where('tbl_cctv.status_tampil','1')
          ->where('tbl_cctv.id',$id)
          ->order_by('tbl_terminal.nama_terminal','asc')
          ->get()->result();
    $data['d']=$d;
    $this->load->view('cctv/showvideo',$data);
  }
}
