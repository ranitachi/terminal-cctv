<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Jadwal extends CI_Controller {


    public function __construct(){
        parent::__construct();
    }

    public function giwangan(){
        if(is_uploaded_file($_FILES['upload-giwangan']['tmp_name'])) {
            move_uploaded_file($_FILES['upload-giwangan']['tmp_name'], getcwd() . '\\assets\\upload\\giwangan.pdf');

        }

    }

    public function tirtonadi(){
        if(is_uploaded_file($_FILES['upload-tirtonadi']['tmp_name'])) {
            move_uploaded_file($_FILES['upload-tirtonadi']['tmp_name'], getcwd() . '\\assets\\upload\\tirtonadi.pdf');

        }

    }

    public function klaten(){
        if(is_uploaded_file($_FILES['upload-klaten']['tmp_name'])) {
            move_uploaded_file($_FILES['upload-klaten']['tmp_name'], getcwd() . '\\assets\\upload\\klaten.pdf');

        }

    }

    public function surabaya(){
        if(is_uploaded_file($_FILES['upload-surabaya']['tmp_name'])) {
            move_uploaded_file($_FILES['upload-surabaya']['tmp_name'], getcwd() . '\\assets\\upload\\surabaya.pdf');

        }

    }

}