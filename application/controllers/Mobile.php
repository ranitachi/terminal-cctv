<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once('Terminalku.php');
class Mobile extends Terminalku {
	public function index()
	{
		$data['konten']='mobile/layout/main';
		$about=$this->db->from('tbl_aboutus')->get()->result();
		$data['about']=$about;
		$video=$this->db->from('tbl_video_profile')->where('status_tampil','1')->order_by('tanggal','desc')->limit(1)->get()->result();
		$data['video']=$video;
		$this->load->view('mobile/index',$data);
	}

	public function terminal()
	{
		$data['konten']='mobile/terminal/index';
		$this->load->view('mobile/index',$data);
	}

	public function news()
	{
		$data['konten']='mobile/news/index';
		$this->load->view('mobile/index',$data);
	}

}
