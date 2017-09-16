<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terminalku extends CI_Controller {
	public function index()
	{
		$data['konten']='front/layout/main';
		$this->load->view('front/index',$data);
	}

	public function jumlahcctv($terminal)
	{
		// $this->load->view('jumlahcctv');
		$wh="Lower(nama_terminal)='".$terminal."'  and status_tampil='1'";
		$term=$this->db->from('tbl_terminal')->where($wh)->get()->result();

		$cekcctv=$this->db->from('tbl_cctv')->where('terminal_id',$term[0]->id)->where('status_tampil','1')->get()->result();
		if(count($cekcctv)!=0)
		{
			$dtm=array();
			foreach ($term as $kt => $vt)
			{
				$no=0;
				foreach ($cekcctv as $kc => $vc)
				{
					$dtm[$no]['id']=$vt->id;
					$dtm[$no]['nama_terminal']=$vt->nama_terminal;
					$dtm[$no]['foto']=$vt->foto;
					$dtm[$no]['about_us']=$vt->about_us;
					$dtm[$no]['video_profile']=$vt->video_profile;
					$dtm[$no]['schedule']=$vt->schedule;
					$dtm[$no]['contact']=$vt->contact;
					$dtm[$no]['status_tampil']=$vt->status_tampil;
					$dtm[$no]['ip']=$vt->ip;
					$dtm[$no]['tblcctv']='1';
					$dtm[$no]['id_cctv']=$vc->id;
					$dtm[$no]['nama_cctv']=$vc->nama_cctv;
					$dtm[$no]['folder_cctv']=$vc->folder;
					$dtm[$no]['ip_cctv']=$vc->ip;
					$dtm[$no]['kode']=$vc->kode;
					$no++;
				}
			}
			$j=$dtm;
		}
		else
		{
			$url=$term[0]->ip.'/jumlahcctv/'.$terminal;
			$jlh=file_get_contents($url);
			$j=json_decode($jlh);
		}

		$data=array();
		foreach ($j as $k => $v)
		{
			$data[$k]=$v;
		}
		return $data;
	}

	public function jumlahcctv2($terminal)
	{
		// $this->load->view('jumlahcctv');
		$wh="Lower(nama_terminal)='".$terminal."' and status_tampil='1'";
		$term=$this->db->from('tbl_terminal')->where($wh)->get()->result();

		$cekcctv=$this->db->from('tbl_cctv')->where('terminal_id',$term[0]->id)->where('status_tampil','1')->get()->result();
		if(count($cekcctv)!=0)
		{
			$dtm=array();
			foreach ($term as $kt => $vt)
			{
				$no=0;
				foreach ($cekcctv as $kc => $vc)
				{
					$dtm[$no]['id']=$vt->id;
					$dtm[$no]['nama_terminal']=$vt->nama_terminal;
					$dtm[$no]['foto']=$vt->foto;
					$dtm[$no]['about_us']=$vt->about_us;
					$dtm[$no]['video_profile']=$vt->video_profile;
					$dtm[$no]['schedule']=$vt->schedule;
					$dtm[$no]['contact']=$vt->contact;
					$dtm[$no]['status_tampil']=$vt->status_tampil;
					$dtm[$no]['ip']=$vt->ip;
					$dtm[$no]['tblcctv']='1';
					$dtm[$no]['id_cctv']=$vc->id;
					$dtm[$no]['nama_cctv']=$vc->nama_cctv;
					$dtm[$no]['folder_cctv']=$vc->folder;
					$dtm[$no]['ip_cctv']=$vc->ip;
					$dtm[$no]['kode']=$vc->kode;
					$no++;
				}
			}
			$j=$dtm;
		}
		else
		{
			$url=$term[0]->ip.'/jumlahcctv/'.$terminal;
			$jlh=file_get_contents($url);
			$j=json_decode($jlh);
		}
		$data=array();
		foreach ($j as $k => $v)
		{
			$data[$k]=$v;
		}
		// return $data;
		echo '<pre>';
		print_r($data);
		echo '</pre>';
	}

	public function playvideo($kode,$terminal,$index,$file)
	{
		$data['index']=$index;
		list($folder,$file)=explode('__', $file);
		$data['folder']=$folder;
		$data['file']=$file;

		$wh="Lower(nama_terminal)='".$terminal."' and status_tampil='1'";
		$term=$this->db->from('tbl_terminal')->where($wh)->get()->result();

		$cekcctv=$this->db->from('tbl_cctv')->where('terminal_id',$term[0]->id)->where('kode',$kode)->where('status_tampil','1')->get()->result();
		if(count($cekcctv)!=0)
		{
			$ter=strtolower($terminal);
			if($ter=='purabaya' || $ter=='soekarno' || $ter=='tirtonadi' || $ter=='giwangan')
			{
				$data['url']=$cekcctv[0]->ip.'terminal';
			}
			else
				$data['url']=$cekcctv[0]->ip.'terminalku/index.php/terminal';
		}
		else
			$data['url']=$term[0]->ip;

		$data['terminal']=$terminal;
		$this->load->view('front/terminal/video',$data);
	}
	public function playvideomobile()
	{
		$this->load->view('mobile/terminal/video');
	}
}
