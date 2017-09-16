<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('DIRECTORY_FOLDER','C:/xampp/htdocs/terminal-ku/assets/');
// define('DIRECTORY_FOLDER','/opt/lampp/htdocs/terminal-cctv/assets/');
class Terminalku extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		include APPPATH . 'third_party/VideoStream.php';
	}
	public function index()
	{
		$data['konten']='front/layout/main';
		$about=$this->db->from('tbl_aboutus')->get()->result();
		$data['about']=$about;
		$video=$this->db->from('tbl_video_profile')->where('status_tampil','1')->order_by('tanggal','desc')->limit(1)->get()->result();
		$data['video']=$video;
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
	public function loader()
	{
		echo '<div class="loader"></div>
		<style>
		.loader {
		  border: 16px solid #f3f3f3; /* Light grey */
		  border-top: 16px solid #3498db; /* Blue */
		  border-radius: 50%;
		  width: 120px;
		  height: 120px;
		  animation: spin 2s linear infinite;
		}

		@keyframes spin {
		  0% { transform: rotate(0deg); }
		  100% { transform: rotate(360deg); }
		}
		</style>';
	}
	public function cobaplayvideo($ip,$folder,$kode,$terminal,$namafile,$index)
	{
		// $data['ip']='http://203.130.228.60:97/terminalku/index.php/terminal/playvideo/0fea4059-8371-41ee-a333-45f029b3f060/2017-08-16%2001_54_37_035.mp4';
		$trm=array('giwangan','tirtonadi','soekarno','purabaya');
		if(in_array($terminal,$trm))
		{
			$data['linkvideo']='http://'.$ip.'/terminal/playvideo/'.$folder.'/'.$namafile;
		}
		else
			$data['linkvideo']='http://'.$ip.'/terminalku/index.php/terminal/playvideo/'.$folder.'/'.$namafile;
		$data['index']=($index+1);
		$data['folder']=$folder;
		$data['terminal']=$terminal;
		$data['kode']=$kode;
		$this->load->view('front/terminal/cctv',$data);
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
		$this->load->view('front/terminal/cctv',$data);
	}

	public function playvideomobile()
	{
		$this->load->view('mobile/terminal/video');
	}

	
	public function showvideo()
	{
		$term=$this->db->from('tbl_video_profile')->where('status_tampil','1')->order_by('id','desc')->limit(1)->get()->result();
		$ff=explode('/',$term[0]->video);
		if(count($ff)>1)
		{
				$vid=$ff[count($ff)-1];
		}
		else
		{
				$vid='';
		}
		// echo $vid;
		$data['vid']=$vid;
		$this->load->view('front/terminal/video',$data);
	}


	function convertvideo($file=null)
	{
		if($file!=null)
		{
			if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
			{
				$files='C:/xampp/htdocs/terminal-ku/assets/files/'.$file;
				$file_gif='C:/xampp/htdocs/terminal-ku/assets/files/'.$file.'.gif';
				// echo '<br>'.$files.'<br>';

				// echo 'Windows<br>';
				// echo "Starting ffmpeg...\n\n";
				// echo shell_exec('C:/FFmpegTool/bin/ffmpeg -i "'.$files.'" -r 10 -vf scale=450:-1  "'.$file_gif.'"');
				// echo "Done.\n";
				// echo $file_gif.'<br>';
				// echo "Starting ffmpeg...\n\n";
				echo shell_exec("C:/FFmpegTool/bin/ffmpeg.exe -i '$files' -r 10 -vf scale=450:-1  '$file_gif' &");
				// echo "Done.\n";

			}
			else
			{
			    // echo 'This is a server not using Windows!';

					$files='/opt/lampp/htdocs/terminal-cctv/assets/files/'.$file;
					$file_gif='/opt/lampp/htdocs/terminal-cctv/assets/files/'.$file.'.gif';
					// echo '<br>'.$files.'<br>';
					// echo $file_gif.'<br>';
					// echo exec('whoami');
					// echo "Starting ffmpeg...\n\n";
					echo shell_exec("ffmpeg -i '$files' -r 10 -vf scale=450:-1  '$file_gif' &");
					// echo "Done.\n";
			}
		}
	}

	function resizevideo($file=null)
	{
		if($file!=null)
		{
			if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
			{

				$files='C:/xampp/htdocs/terminal-ku/assets/files/'.$file;

				$ext = pathinfo($files, PATHINFO_EXTENSION);
				$new_file='C:/xampp/htdocs/terminal-ku/assets/files/'.str_replace('.'.$ext,'_resize.'.$ext,$file);
				// echo '<br>'.$files.'<br>';
				// echo $file_gif.'<br>';
				// echo "Starting ffmpeg...\n\n";
				echo shell_exec("C:/FFmpegTool/bin/ffmpeg.exe -i '$files' -r 10 -vf scale=600:-1  '$new_file' &");
				// echo "Done.\n";

			}
			else
			{
			    // echo 'This is a server not using Windows!';

					$files='/opt/lampp/htdocs/terminal-cctv/assets/files/'.$file;
					$ext = pathinfo($files, PATHINFO_EXTENSION);

					$new_file='/opt/lampp/htdocs/terminal-cctv/assets/files/'.str_replace('.'.$ext,'_resize.'.$ext,$file);
					// echo '<br>'.$files.'<br>';
					// echo $file_gif.'<br>';
					// echo exec('whoami');
					// echo "Starting ffmpeg...\n\n";
					echo shell_exec("ffmpeg -i '$files' -r 10 -vf scale=600:-1  '$new_file' &");
					// echo ("ffmpeg -i '$files' -r 10 -vf scale=600:-1  '$new_file'");
					// echo "Done.\n";
			}
		}
	}
}
