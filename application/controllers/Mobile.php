<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once('Terminalku.php');
class Mobile extends Terminalku {
	public function index()
	{
		$data['konten']='mobile/layout/main';
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
