<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function authenticate($username,$password){
        // $query = $this->db->query("SELECT * FROM tbl_username WHERE username='$username' AND password='$password'");

        // return $query->num_rows();
    	if($username=='admin' && $password=='admin123')
    	{
    		return 1;
    	}
    	else
    		return 0;
    }



}