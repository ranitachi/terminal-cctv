<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once('Welcome.php');
class Config extends Welcome {
  public function aboutus($id=-1)
	{
    $d=$this->db->from('tbl_aboutus')->get()->result();
    if(count($d)!=0)
    {
      $dd=$d;
      $id=$d[0]->id;
    }
    else {
      $dd=array();
    }
    $data=[
            'konten'=>'config/aboutus',
            'menu'=>'config',
            'submenu'=>'aboutus',
            'd'=>$dd,
            'id'=>$id
          ];
    $this->load->view('admin/index',$data);
  }
  function process_aboutus($id=-1)
  {
    if(!empty($_POST))
    {

      if($id!=-1)
      {
          $this->db->set('konten',$_POST['konten']);
          $this->db->where('id',$id);
          $c=$this->db->update('tbl_aboutus');
          if($c)
            echo 'Konten About Us Berhasil Di Update';
          else
            echo 'Konten About Us Gagal Di Update';
      }
      else
      {
          // $this->db->set('konten',$_POST['konten']);
          $c=$this->db->insert('tbl_aboutus',$_POST);
          if($c)
            echo 'Konten About Us Berhasil Di Tambah';
          else
            echo 'Konten About Us Gagal Di Tambah';
        }
    }
    else
      echo 'Konten About Us Gagal Di Tambah';
  }
  //-------------------------------------------------------------------------
  function video($id=-1)
  {
    $data['menu']='config';
    $data['submenu']='video';
    $data['konten']='config/video-index';
    $this->load->view('admin/index',$data);
  }
  function videodata($id=-1)
  {
    $us=$this->session->userdata('user');
    // $data['user']=$us[0];
    if($id!=-1)
    {
      $d=$this->db->from('tbl_video_profile')->where('id',$id)->get()->result();
    }
    else
      $d=$this->db->from('tbl_video_profile')->where('status_tampil','1')->order_by('tanggal','desc')->get()->result();

    $data=[
      'd'=>$d,
      'user'=>$us,
      'id'=>$id
    ];
    $this->load->view('config/video-data',$data);
  }
  function videoform($id=-1)
  {
    $d=array();
    if($id!=-1)
      $d=$this->db->from('tbl_video_profile')->where('id',$id)->get()->result();

    $data=[
        'det'=>$d,
        'id'=>$id
      ];
      $this->load->view('config/video-form',$data);
  }
  function videoprocess($id=-1)
  {
    if(!empty($_POST))
    {
      if($id!=-1)
      {
        $vid=$_POST['video'];
        unset($_POST['video']);
        if($vid!='')
        {
            $this->db->set('video',vid);
            $this->db->where('id',$id);
            $this->db->update('tbl_video_profile');
        }
          $this->db->where('id',$id);
          $c=$this->db->update('tbl_video_profile',$_POST);
          if($c)
            echo 'Data Video Profile Berhasil Di Update';
          else
            echo 'Data Video Profile Gagal Di Update';
      }
      else
      {
          // $this->db->set('konten',$_POST['konten']);
          $c=$this->db->insert('tbl_video_profile',$_POST);
          if($c)
            echo 'Data Video Profile Berhasil Di Tambah';
          else
            echo 'Data Video Profile Gagal Di Tambah';
        }

        if(!empty($_POST['video']))
        {
    			$ff=explode('/',$_POST['video']);
    			$file=$ff[count($ff)-1];
    			$this->convertvideo($file);
    			$this->resizevideo($file);
        }
    }
    else
      echo 'Data Video Profile Gagal Di Tambah';
  }
  public function videohapus($id)
	{
		$this->db->where('id',$id);
		$this->db->set('status_tampil','0');
		$c=$this->db->update('tbl_video_profile');
		if($c)
			echo 'Data Video Profile Berhasil Di Hapus';
		else
			echo  'Data Video Profile Gagal Di Hapus';
	}
////-------------------------------------------------------------------------
  function scheduledata($id=-1)
  {
    if($id!=-1)
    {
      $d=$this->db->from('tbl_schedule')->where('id',$id)->get()->result();
    }
    else
      $d=$this->db->from('tbl_schedule')->where('status_tampil','1')->order_by('terminal_id,waktu_datang,waktu_berangkat')->get()->result();


    $us=$this->session->userdata('user');
  	$admin=1;
  	$user=$us;
    $t=$this->config->item('terminal');
    $tr=array();
		if($us->terminal_id!=-1)
		{
			$admin=-1;
      $d=$this->db->from('tbl_schedule')->where('terminal_id',$us->terminal_id)->where('status_tampil','1')->order_by('terminal_id,waktu_datang,waktu_berangkat')->get()->result();
      foreach ($t as $kt => $vt)
      {
        if($vt->id==$us->terminal_id)
          $tr[$vt->id]=$vt;
      }
  	}
    else
    {
      foreach ($t as $kt => $vt)
      {
        $tr[$vt->id]=$vt;
      }
    }
    $data=[
      'd'=>$d,
      'tr'=>$tr,
      'id'=>$id,
      'admin'=>$admin,
      'user'=>$user
    ];
    $this->load->view('schedule/data',$data);
  }
  function scheduleform($id=-1)
  {
    $d=array();
    if($id!=-1)
      $d=$this->db->from('tbl_schedule')->where('id',$id)->get()->result();

    $t=$this->db->from('tbl_terminal')->where('status_tampil','1')->order_by('nama_terminal','asc')->get()->result();

    $us=$this->session->userdata('user');
  	$admin=1;
  	$user=$us;
    if($this->session->userdata('logged')=='true')
    {
      $admin=-1;
      if($user->level!=1)
        $t=$this->db->from('tbl_terminal')->where('status_tampil','1')->where('id',$us->terminal_id)->order_by('nama_terminal','asc')->get()->result();
    }

    $data=[
        'det'=>$d,
        'id'=>$id,
        'term'=>$t
      ];
      $this->load->view('schedule/form',$data);
  }
  function scheduleprocess($id=-1)
  {
    if(!empty($_POST))
    {
      if($id!=-1)
      {
        // $file=$_POST['file'];
        // unset($_POST['file']);
        // if($file!='')
        // {
        //     $this->db->set('file',$file);
        //     $this->db->where('id',$id);
        //     $this->db->update('tbl_schedule');
        // }
          $this->db->where('id',$id);
          $c=$this->db->update('tbl_schedule',$_POST);
          if($c)
            echo 'Data schedule Berhasil Di Update';
          else
            echo 'Data schedule Gagal Di Update';
      }
      else
      {
          // $this->db->set('konten',$_POST['konten']);
          $c=$this->db->insert('tbl_schedule',$_POST);
          if($c)
            echo 'Data schedule Berhasil Di Tambah';
          else
            echo 'Data schedule Gagal Di Tambah';
        }
    }
    else
      echo 'Data schedule Gagal Di Tambah';
  }
  public function schedulehapus($id)
  {
    $this->db->where('id',$id);
    $this->db->set('status_tampil','0');
    $c=$this->db->update('tbl_schedule');
    if($c)
      echo 'Data schedule Profile Berhasil Di Hapus';
    else
      echo  'Data schedule Profile Gagal Di Hapus';
  }
}
