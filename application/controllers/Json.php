<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once('Terminalku.php');
class Json extends Terminalku {

  public function data()
  {
      $aboutus=$this->db->from('tbl_aboutus')->get()->result();
      $cctv=$this->db->from('tbl_cctv')->where('status_tampil','1')->get()->result();
      $level=$this->db->from('tbl_level')->where('status_tampil','1')->get()->result();
      $news=$this->db->from('tbl_news')->where('status','1')->order_by('waktu_input','desc')->get()->result();
      $schedule=$this->db->from('tbl_schedule')->where('status_tampil','1')->get()->result();
      $terminal=$this->db->from('tbl_terminal')->where('status_tampil','1')->get()->result();
      $user=$this->db->from('tbl_user')->where('status','1')->get()->result();
      $video=$this->db->from('tbl_video_profile')->where('status_tampil','1')->get()->result();

      $data=array();
      foreach ($aboutus as $k => $v)
      {
        //$data['aboutus'][$k]=$v;
        $dt=array();
        foreach($v as $ka => $va)
        {
          if(is_null($va) || $va=='NULL')
            $dt[$ka]='';
          else
            $dt[$ka]=trim(preg_replace('/\s\s+/', ' ', $va));
        }
        $data['aboutus'][$k]=(object)$dt;
        
      }
      $trm=array();
      foreach ($terminal as $k => $v)
      {
        $trm[$v->id]=$v;
        $term=array();
        foreach ($v as $kv => $vv)
        {
          $term[$kv]=trim(preg_replace('/\s\s+/', ' ', $vv));
          if($kv=='about_us')
          {
            
            $str='<div style="width:150px;padding:5px;border:1px solid #ddd;float:right;margin-left:10px;text-align:center;">
              <img src="'.$terminal[$k]->foto_kepala.'" style="width:100%;">
              <br>
              <small>Kepala Terminal </small>
              <br>
              <b>'.$terminal[$k]->nama_kepala.'</b>
            </div>
            <div style="text-align:justify !important;">'.$vv.'</div>';
            $term[$kv]=trim(preg_replace('/\s\s+/', ' ', $str));
          }
          if(is_null($vv) || $v=='NULL')
          {
            $term[$kv]="";
          }
          else
          {
            $term[$kv]=trim(preg_replace('/\s\s+/', ' ', $vv));
          }

          //$data[$k]=trim(preg_replace('/\s\s+/', ' ', $v));

       /* if($k=='about_us')
          {
           // $data[$k]
            $str='<div style="width:150px;padding:5px;border:1px solid #ddd;float:right;margin-left:10px;text-align:center;">
              <img src="'.$terminal[0]->foto_kepala.'" style="width:100%;">
              <br>
              <small>Kepala Terminal </small>
              <br>
              <b>'.$terminal[0]->nama_kepala.'</b>
            </div>
            <div style="text-align:justify !important;">'.$v.'</div>';
            $data[$k]=trim(preg_replace('/\s\s+/', ' ', $str));
          }
          if(is_null($v) || $v=='NULL')
          {
            $data[$k]="";
          }
          else
          {
            $data[$k]=trim(preg_replace('/\s\s+/', ' ', $v));
          }*/
        }
        $data['terminal'][strtolower($v->nama_terminal)]=(object)$term;
      }
      // $idxcctv=0;
      foreach ($cctv as $k => $v)
      {
        if(isset($trm[$v->terminal_id]))
        {
          $nm=strtolower($trm[$v->terminal_id]->nama_terminal);
          $data['cctv'][$nm][$k]=$v;
          // $idxcctv++;
        }
      }
      foreach ($level as $k => $v)
      {
        $data['level'][$k]=$v;
      }
      foreach ($news as $k => $v)
      {
         $dt=array();
          foreach($v as $ka => $va)
          {
            if($va=='NULL' || is_null($va))
              $dt[$ka]="";
            else
              $dt[$ka]=trim(preg_replace('/\s\s+/', ' ', $va));
          }
        $data['news'][$k]=(object)$dt;
      }
      foreach ($schedule as $k => $v)
      {
        if(isset($trm[$v->terminal_id]))
        {
          $nm=strtolower($trm[$v->terminal_id]->nama_terminal);
          // $data['cctv'][$nm][$k]=$v;
         
          $data['jadwal'][$nm][$k]=$v;
          // $idxcctv++;
        }
      }

      foreach ($user as $k => $v)
      {
        $data['user'][$k]=$v;
      }
      foreach ($video as $k => $v)
      {
        $data['video'][$k]=$v;
      }
      echo json_encode($data);


  }
  public function aboutus()
  {
      $aboutus=$this->db->from('tbl_aboutus')->get()->result();

      $data=array();
      foreach ($aboutus as $k => $v)
      {
        $dt=array();
        foreach($v as $ka => $va)
        {
          $dt[$ka]=trim(preg_replace('/\s\s+/', ' ', $va));
        }
        $data[$k]=(object)$dt;
      }

      echo json_encode($data);
      // echo '<pre>';
      // print_r($data);
      // echo '</pre>';
  }
  public function videoprofil($terminal)
  {
      $ter=$this->config->item('nama_terminal');
      $tr=$ter[strtolower($terminal)];
      // $cctv=$this->db->from('tbl_terminal')->where('id',$tr->id)->where('status_tampil','1')->get()->result();

      // $data['data']=$tr;
      foreach ($tr as $k => $v)
      {
        if(is_null($v) || $v=='NULL')
          $data[$k]="";
        else
        $data[$k]=trim(preg_replace('/\s\s+/', ' ', $v));
      }
      $ff=explode('/',$tr->video_profile);
      if(count($ff)>1)
      {
        $file=$ff[count($ff)-1];
        $ext = pathinfo(DIRECTORY_FOLDER.'files/'.$file, PATHINFO_EXTENSION);
        $resize=str_replace('.'.$ext,'_resize.'.$ext,$file);

        if(file_exists(DIRECTORY_FOLDER.'files/'.$resize))
        {
          $fl=$resize;
        }
        else
        {
          $fl=$file;
        }
        $data['linkvideo']=site_url().'terminal/playvideoprofile/'.$fl;
      }
      else
        $data['linkvideo']='';

      echo json_encode($data);
      // echo '<pre>';
      // print_r($tr->vide);
      // echo '</pre>';
  }
  public function cctv($terminal=null)
  {
      if($terminal!=null)
      {
        $ter=$this->config->item('nama_terminal');
        if(isset($ter[strtolower($terminal)]))
        {
          $tr=$ter[strtolower($terminal)];
          $cctv=$this->db->from('tbl_cctv')->where('terminal_id',$tr->id)->where('status_tampil','1')->get()->result();
        }
        else
          $cctv=$this->db->from('tbl_cctv')->where('status_tampil','1')->get()->result();
      }
      else
        $cctv=$this->db->from('tbl_cctv')->where('status_tampil','1')->get()->result();

      $data=array();
      foreach ($cctv as $k => $v)
      {
        $data[$k]=$v;
      }

      echo json_encode($data);
  }
  public function level()
  {
      $level=$this->db->from('tbl_level')->where('status_tampil','1')->get()->result();
      $data=array();
      foreach ($level as $k => $v)
      {
        $data[$k]=$v;
      }

      echo json_encode($data);
  }

  public function news($terminal=null)
  {
    if($terminal!=null)
    {
      $ter=$this->config->item('nama_terminal');
      if(isset($ter[strtolower($terminal)]))
      {
        $tr=$ter[strtolower($terminal)];
        $news=$this->db->from('tbl_news')->where('terminal_id',$tr->id)->where('status','1')->get()->result();
        // $cctv=$this->db->from('tbl_cctv')->where('terminal_id',$tr->id)->where('status_tampil','1')->get()->result();
      }
      else
        $news=$this->db->from('tbl_news')->where('status','1')->get()->result();
    }
    else
      $news=$this->db->from('tbl_news')->where('status','1')->get()->result();

      $data=array();
      foreach ($news as $k => $v)
      {
        $dt=array();
        foreach ($v as $ka => $va) 
        {
          # code...
          $dt[$ka]=trim(preg_replace('/\s\s+/', ' ', $va));
        }
        $data[$k]=(object)$dt;
      }
      //echo '<pre>';
      //print_r($news);
      //echo '</pre>';
      echo json_encode($data);
  }
  public function schedule($terminal=null)
  {
    if($terminal!=null)
    {
      $ter=$this->config->item('nama_terminal');
      if(isset($ter[strtolower($terminal)]))
      {
        $tr=$ter[strtolower($terminal)];
        // $news=$this->db->from('tbl_news')->where('terminal_id',$tr->id)->where('status','1')->get()->result();
        $schedule=$this->db->from('tbl_schedule')->where('terminal_id',$tr->id)->where('status_tampil','1')->get()->result();
      }
      else
        $schedule=$this->db->from('tbl_schedule')->where('status_tampil','1')->get()->result();
        // $news=$this->db->from('tbl_news')->where('status','1')->get()->result();
    }
    else
      $schedule=$this->db->from('tbl_schedule')->where('status_tampil','1')->get()->result();
      // $news=$this->db->from('tbl_news')->where('status','1')->get()->result();
      $data=array();
      foreach ($schedule as $k => $v)
      {
        $data[$k]=$v;
      }
      echo json_encode($data);
  }
   public function terminal($terminal=null)
  {
      if($terminal==null)
        $terminal=$this->db->from('tbl_terminal')->where('status_tampil','1')->get()->result();
      else
        $terminal=$this->db->from('tbl_terminal')->like('nama_terminal',$terminal)->where('status_tampil','1')->get()->result();

      $data=array();
      foreach ($terminal[0] as $k => $v)
      {
        $data[$k]=trim(preg_replace('/\s\s+/', ' ', $v));

        if($k=='about_us')
          {
           // $data[$k]
            $str='<div style="width:150px;padding:5px;border:1px solid #ddd;float:right;margin-left:10px;text-align:center;">
              <img src="'.$terminal[0]->foto_kepala.'" style="width:100%;">
              <br>
              <small>Kepala Terminal </small>
              <br>
              <b>'.$terminal[0]->nama_kepala.'</b>
            </div>
            <div style="text-align:justify !important;">'.$v.'</div>';
            $data[$k]=trim(preg_replace('/\s\s+/', ' ', $str));
          }
        if(is_null($v) || $v=='NULL')
        {
          $data[$k]="";
        }
        else
        {
          $data[$k]=trim(preg_replace('/\s\s+/', ' ', $v));
        }
      }
      // echo $k.'<br>';
      // echo '<pre>';
      // print_r($data);
      // echo '</pre>';
      echo json_encode((object)$data);
  }
  public function user($terminal=null)
  {
    if($terminal!=null)
    {
      $ter=$this->config->item('nama_terminal');
      if(isset($ter[strtolower($terminal)]))
      {
        $tr=$ter[strtolower($terminal)];
        // $news=$this->db->from('tbl_news')->where('terminal_id',$tr->id)->where('status','1')->get()->result();
        $user=$this->db->from('tbl_user')->where('terminal_id',$tr->id)->where('status','1')->get()->result();
      }
      else
        $user=$this->db->from('tbl_user')->where('status','1')->get()->result();
    }
    else
      $user=$this->db->from('tbl_user')->where('status','1')->get()->result();

      $data=array();
      foreach ($user as $k => $v)
      {
        $data[$k]=$v;
      }
      echo json_encode($data);
  }
  public function video()
  {
      $video=$this->db->from('tbl_video_profile')->where('status_tampil','1')->get()->result();
      $data=array();
      foreach ($video[0] as $k => $v)
      {
        $data[$k]=$v;
        $ff=explode('/',$video[0]->video);
        if(count($ff)>1)
        {
          $file=$ff[count($ff)-1];
          $ext = pathinfo(DIRECTORY_FOLDER.'files/'.$file, PATHINFO_EXTENSION);
          $resize=str_replace('.'.$ext,'_resize.'.$ext,$file);

          if(file_exists(DIRECTORY_FOLDER.'files/'.$resize))
          {
            $fl=$resize;
          }
          else
          {
            $fl=$file;
          }
          $data['linkvideo']=site_url().'terminal/playvideoprofile/'.$fl;
        }
        else
          $data['linkvideo']='';

        // $ff=explode('/',$video[0]->video);
        // if(count($ff)>1)
        //   $data['linkvideo']=site_url().'terminal/playvideoprofile/'.$ff[count($ff)-1];
        // else
        //   $data['linkvideo']='';
      }
      echo json_encode($data);
  }
}
