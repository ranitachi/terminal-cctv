<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged')!='true')
			redirect('login','location');
	}
}
