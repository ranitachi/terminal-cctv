<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mobile extends CI_Controller {
	
	var $general, $data;
	
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
    {
		$this->load->view("mobile");
    }
}