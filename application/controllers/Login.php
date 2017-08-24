<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class login extends CI_Controller {


    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view('login/main');
    }

    public function authenticate(){

        // $this->load->database();
        $this->load->model("users");

        $username = $_POST["username"];
        $password = $_POST["password"];

        $login = $this->users->authenticate($username,$password);

        if ($login == 1){
            header('Location: ' . base_url() . 'login/admin');

        }else
        {
            header('Location: ' . base_url() . 'login');
        }
    }

    public function admin(){
        $this->load->view('login/admin');
    }
}