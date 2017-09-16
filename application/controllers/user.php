<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once('Welcome.php');
class User extends Welcome {

  public function data($id=-1)
	{
		$data['id']=$id;
    $d=$this->db->select('*')->select('tbl_level.id as id_level')
          ->select('tbl_level.level as level_user')
          ->select('tbl_user.id as id_user')
          ->from('tbl_user')
          ->join("tbl_level", "tbl_user.level = tbl_level.id","inner")
          ->where('tbl_user.status','1')
          ->order_by('tbl_user.nama','asc')
          ->get()->result();

    $user=$this->session->userdata('user');
    $data['user']=$user;
    $data['admin']=1;
    if($this->session->userdata('logged')=='true')
    {
      if($user->terminal_id!=-1)
      {

        $data['admin']=-1;

          $d=$this->db->select('*')->select('tbl_level.id as id_level')
            ->select('tbl_level.level as level_user')
            ->select('tbl_user.id as id_user')
            ->from('tbl_user')
            ->join("tbl_level", "tbl_user.level = tbl_level.id","inner")
            ->where('tbl_user.status','1')
            ->where('tbl_user.terminal_id',$user->terminal_id)
            ->order_by('tbl_user.nama','asc')
            ->get()->result();
        }
    }
    $data['d']=(count($d)!=0 ? $d : array());
    $trm=$this->config->item('terminal');
    // if($id)
    $data['terminal']=$trm;
		$this->load->view('user/data',$data);
	}
	public function form($id=-1)
	{
		$data['id']=$id;
    if($id!=-1)
    {
      $d=$this->db->select('*')->select('tbl_level.id as id_level')->select('tbl_level.level as level_user')
            ->from('tbl_user')
            ->join("tbl_level", "tbl_user.level = tbl_level.id","inner")
            ->where('tbl_user.status','1')
            ->where('tbl_user.id',$id)
            ->order_by('tbl_user.nama','asc')
            ->get()->result();
      $data['det']=$d;
    }

    $t=$this->db->from('tbl_level')->where('status_tampil','1')->order_by('level','asc')->get()->result();
    $trm=$this->config->item('terminal');
    $data['terminal']=$trm;

    $user=$this->session->userdata('user');
    $data['user']=$user;
    $data['admin']=1;
    if($this->session->userdata('logged')=='true')
    {
      if($user->terminal_id!=-1)
      {
        $data['admin']=-1;
        $tr[$user->terminal_id]=$trm[$user->terminal_id];
        $data['terminal']=$tr;
        $t=$this->db->from('tbl_level')->where('status_tampil','1')->where('id!=','1',false)->order_by('level','asc')->get()->result();
      }
    }

    $data['level']=$t;
		$this->load->view('user/form',$data);
	}

  public function process($id=-1)
	{
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    if(!empty($_POST['nama']))
    {
  		if($id!=-1)
  		{
        $pass=$_POST['pass'];
        unset($_POST['pass']);
        $this->db->where('id',$id);
    		$c=$this->db->update('tbl_user',$_POST);

        if($pass!='')
        {
            $pss=sha1(md5($pass));
            $this->db->set('pass',$pss);
            $this->db->where('id',$id);
            $this->db->update('tbl_user');
        }

  			if($c)
  				echo 'Data User Berhasil Di Edit';
  			else
  				echo 'Data User Gagal Di Edit';
  		}
  		else
  		{
        $data=$_POST;
        $data['pass']=sha1(md5($_POST['pass']));
  			$c=$this->db->insert('tbl_user',$data);
  			if($c)
  				echo 'Data User Berhasil Di Tambah';
  			else
  				echo 'Data User Gagal Di Tambah';
      }
		}
    else {
      echo 'Data User Gagal Di Tambah';
    }
	}
  public function hapus($id)
	{
		$this->db->where('id',$id);
		$this->db->set('status','0');
		$c=$this->db->update('tbl_user');
		if($c)
			echo 'Data User Berhasil Di Hapus';
		else
			echo  'Data User Gagal Di Hapus';
	}
}
