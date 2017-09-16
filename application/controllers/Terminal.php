<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once('Terminalku.php');
class Terminal extends Terminalku {
	public function index()
	{
		$data['konten']='front/terminal/index';
		$this->load->view('front/index',$data);
	}

	function detail($terminal,$cctvidx=0)
	{
		$data['konten']='front/terminal/detail';
		$data['terminal']=$terminal;
		$jlh=$this->jumlahcctv($terminal);
		$data['jumlahcctv']=$jlh;
		$data['idxcctv']=$cctvidx;

		$wh="Lower(nama_terminal)='".$terminal."'";
		$term=$this->db->from('tbl_terminal')->where($wh)->get()->result();
		if(count($term)!=0)
			$data['term']=$term[0];
		else
			$data['term']=array();

		// $dd=$

		$this->load->view('front/index',$data);
	}

	function profile($terminal)
	{
		$data['konten']='front/terminal/profile';
		$data['terminal']=$terminal;
		$this->load->view('front/index',$data);
	}
	function about($terminal)
	{
		$data['konten']='front/terminal/about';
		$data['terminal']=$terminal;

		$wh="Lower(nama_terminal)='".$terminal."'";
		$term=$this->db->from('tbl_terminal')->where($wh)->get()->result();
		if(count($term)!=0)
			$data['term']=$term[0];
		else
			$data['term']=array();

		$this->load->view('front/index',$data);
	}
	function schedule($terminal)
	{
		$data['konten']='front/terminal/schedule';
		$data['terminal']=$terminal;

		$wh="Lower(nama_terminal)='".$terminal."'";
		$term=$this->db->from('tbl_terminal')->where($wh)->get()->result();

		$terminal_id=$term[0]->id;

		$d=$this->db->from('tbl_schedule')->where('status_tampil','1')->where('terminal_id',$terminal_id)->order_by('waktu_datang,waktu_berangkat')->get()->result();
		$br=$dt=array();
		$data['d']=$d;
		$this->load->view('front/index',$data);
	}
	function contact($terminal)
	{
		$data['konten']='front/terminal/contact';
		$data['terminal']=$terminal;

		$wh="Lower(nama_terminal)='".$terminal."'";
		$term=$this->db->from('tbl_terminal')->where($wh)->get()->result();
		if(count($term)!=0)
		{
			$data['lat']=$term[0]->lat_koord;
			$data['long']=$term[0]->long_koord;
			$data['term']=$term[0];
		}
		else
		{
			$data['lat']=0;
			$data['long']=0;
			$data['term']=array();
		}
		$this->load->view('front/index',$data);
	}
	//------------------------------
	public function data($id=-1)
	{
		$us=$this->session->userdata('user');
		$d=$this->db->from('tbl_terminal')->where('status_tampil','1')->order_by('nama_terminal','asc')->get()->result();
		$data['admin']=1;
		if($this->session->userdata('logged')=='true')
		{
			if($us->terminal_id!=-1)
			{
				$d=$this->db->from('tbl_terminal')->where('status_tampil','1')->where('id',$us->terminal_id)->order_by('nama_terminal','asc')->get()->result();
				$data['admin']=-1;
			}
		}
		// echo $data['admin'];
		$data['id']=$id;
		$data['d']=$d;
		$this->load->view('terminal/data',$data);
	}
	public function form($id=-1)
	{
		$us=$this->session->userdata('user');
		$data['id']=$id;
		$data['admin']=1;
		if($this->session->userdata('logged')=='true')
		{
			if($us->terminal_id!=-1)
			{
				$data['admin']=-1;
			}
		}
		if($id!=-1)
		{
			$d=$this->db->from('tbl_terminal')->where('id',$id)->get()->result();
			$data['d']=$d;
		}
		$this->load->view('terminal/form',$data);
	}

	public function process($id=-1)
	{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
		if(!empty($_POST))
    {
			if($id!=-1)
			{
				$this->db->where('id',$id);
				$c=$this->db->update('tbl_terminal',$_POST);
				if($c)
					echo 'Data Terminal Berhasil Di Edit';
				else
					echo 'Data Terminal Gagal Di Edit';
			}
			else
			{
				$c=$this->db->insert('tbl_terminal',$_POST);
				if($c)
					echo 'Data Terminal Berhasil Di Tambah';
				else
					echo 'Data Terminal Gagal Di Tambah';
			}
		}
		else {
			echo 'Data Terminal Gagal Di Tambah';
		}
	}

	public function hapus($id)
	{
		$this->db->where('id',$id);
		$this->db->set('status_tampil','0');
		$c=$this->db->update('tbl_terminal');
		if($c)
			echo 'Data Terminal Berhasil Di Hapus';
		else
			echo  'Data Terminal Gagal Di Hapus';
	}

	public function showmap($terminal,$lat,$lng)
	{
		$data['terminal']=$terminal;
		$data['lat']=$lat;
		$data['lng']=$lng;
		$this->load->view('terminal/showmap',$data);
	}
}
