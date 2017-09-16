<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json extends CI_Controller {

  public function data()
  {
      $aboutus=$this->db->from('tbl_aboutus')->get()->result();
      $cctv=$this->db->from('tbl_cctv')->where('status_tampil','1')->get()->result();
      $level=$this->db->from('tbl_level')->where('status_tampil','1')->get()->result();
      $news=$this->db->from('tbl_news')->where('status','1')->get()->result();
      $schedule=$this->db->from('tbl_schedule')->where('status_tampil','1')->get()->result();
      $terminal=$this->db->from('tbl_terminal')->where('status_tampil','1')->get()->result();
      $user=$this->db->from('tbl_user')->where('status','1')->get()->result();
      $video=$this->db->from('tbl_video_profile')->where('status_tampil','1')->get()->result();

      $data=array();
      foreach ($aboutus as $k => $v)
      {
        $data['aboutus'][$k]=$v;
      }
      foreach ($cctv as $k => $v)
      {
        $data['cctv'][$k]=$v;
      }
      foreach ($level as $k => $v)
      {
        $data['level'][$k]=$v;
      }
      foreach ($news as $k => $v)
      {
        $data['news'][$k]=$v;
      }
      foreach ($schedule as $k => $v)
      {
        $data['schedule'][$k]=$v;
      }
      foreach ($terminal as $k => $v)
      {
        $data['terminal'][$k]=$v;
      }
      foreach ($user as $k => $v)
      {
        $data['user'][$k]=$v;
      }
      foreach ($video as $k => $v)
      {
        $data['video'][$k]=$v;
      }
      // echo json_encode($data);
      echo '<pre>';
      print_r($data);
      echo '</pre>';
  }

}
