<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("general.php");
define('DIRECTORY_FOLDER','D:/Recording/');
class Terminal extends CI_Controller {
	
	var $general, $data;
	
	public function __construct()
	{
		parent::__construct();
		
		/*Create object class General*/
		include APPPATH . 'third_party/getID3/getid3/getid3.php';
		include APPPATH . 'third_party/VideoStream.php';
		$params = array("base_url" => base_url());
		$this->general = new General($params);
	}

	public function _remap( $method, $args = array() )
    {
		if (method_exists($this, $method))
			$this->$method($args);
		else $this->page_not_found();
    }
	public function jumlahcctv($param)
	{
		$terminal=$param[0];
		$wh=array("lokasi_kamera"=>$terminal,'status_tampil'=>'1');
		$d=$this->db->from('tbl_folder')->where($wh)->get()->result();
		echo json_encode($d);
	}
	public function page_not_found ()
	{
		/*Copy all general data*/
		$this->data = $this->general->data;
		
		$this->data["pagetitle"] = "Page Not Found";
		$this->data["currpage"] = "home";
		
		$this->template->parse_view('tpl_header', 'template/header', $this->data);
		$this->template->parse_view('tpl_footer', 'template/footer', $this->data);
		$this->template->parse_view('tpl_main', 'pagenotfound', $this->data);
		$this->template->render();
	}
	
	public function show($param)
	{
		// echo '<pre>';
		// print_r($param);
		// echo '</pre>';
		/*Copy all general data*/
		// shell_exec('taskkill /im ffmpeg.exe /f');
		// $folder=$this->datafolder($param[0]);
		// shell_exec('C:\\xampp\\htdocs\\TERMINALKU\\script.bat "'.$param[0].'"');
		$this->data = $this->general->data;
		
		$this->data["pagetitle"] = "Terminal";
		$this->data["currpage"] = "terminal";
		$this->data["terminal"] = $param[0];
		
		// print_r($folder);
		if( isset($param[1]) )
			$this->data["cam"] = $param[1];
		
		$this->template->parse_view('tpl_header', 'template/header', $this->data);
		$this->template->parse_view('tpl_footer', 'template/footer', $this->data);
		//$this->template->parse_view('tpl_main', 'terminal', $this->data);
		$this->template->parse_view('tpl_main', 'terminal_recordmp4', $this->data);
		//$this->template->parse_view('tpl_main', 'terminal_tembakip', $this->data);
		//$this->template->parse_view('tpl_main', 'terminal_recordasf', $this->data);

		$this->template->render();
	}	

	public function show2($param)
	{
		// echo '<pre>';
		// print_r($param);
		// echo '</pre>';
		/*Copy all general data*/
		$this->data = $this->general->data;
		
		$this->data["pagetitle"] = "Terminal";
		$this->data["currpage"] = "terminal";
		$this->data["terminal"] = $param[0];
		
		if( isset($param[1]) )
			$this->data["cam"] = $param[1];
		
		$this->template->parse_view('tpl_header', 'template/header', $this->data);
		$this->template->parse_view('tpl_footer', 'template/footer', $this->data);
		//$this->template->parse_view('tpl_main', 'terminal', $this->data);
		// $this->template->parse_view('tpl_main', 'terminal_recordmp4', $this->data);
		$this->template->parse_view('tpl_main', 'terminal_tembakip', $this->data);
		//$this->template->parse_view('tpl_main', 'terminal_recordasf', $this->data);

		$this->template->render();
	}
	function phpinfo()
	{
		echo '<pre>';
		print_r($_SERVER);
		echo '</pre>';
	}
	function dariip()
	{
		$this->load->view('cobaip');
		// $ip='http://203.130.228.202:6500/axis-cgi/mjpg/video.cgi?resolution=800x450&compression=50';
		// echo '<img src="'.$ip.'" style="width:500px;height:300px;">&nbsp;&nbsp;';
		// $ip2='http://203.130.228.202:6500/axis-cgi/mjpg/video.cgi?resolution=800x450&compression=80';
		// echo '<img src="'.$ip2.'" style="width:500px;height:300px;">';
		// $ip2='http://192.168.10.10:80/axis-cgi/mjpg/video.cgi?resolution=800x450&compression=60';
		// echo '<img src="'.$ip2.'">';
	}
	// public function ___getcctv($params)
	public function getcctvcoba($params)
	{
		$terminal = $params[0];
		$cctvid = $params[1];
		$camurl = '';
		// $ip='http://203.130.228.202:6500/mjpg/video.mjpg?timestamp=1487062811995';
		// $ip='http://203.130.228.202:6500/';

		if($terminal == "giwangan"){
			if($cctvid == 'jg1')
				$camurl = "http://10.10.11.11/";
			else if($cctvid == 'jg2')
				$camurl = "http://10.10.11.12/";
			else if($cctvid == 'jg3')
				$camurl = "http://10.10.10.14/";
			else if($cctvid == 'jg4')
				$camurl = "http://10.10.10.15/";
			else if($cctvid == 'jg5')
				$camurl = "http://10.10.12.13/";
			else if($cctvid == 'jg6')
				$camurl = "http://10.10.13.10/";
			else $camurl = "http://10.10.11.11/";
		}
		else if($terminal == "soekarno"){
			if($cctvid == 'kl1')
				$camurl = "http://10.11.11.22/";
			else if($cctvid == 'kl2')
				$camurl = "http://10.11.12.21/";
			else if($cctvid == 'kl3')
				$camurl = "http://10.11.13.23/";
			else if($cctvid == 'kl4')
				$camurl = "http://10.11.13.26/";
			else if($cctvid == 'kl5')
				$camurl = "http://10.11.14.25/";
			else if($cctvid == 'kl6')
				$camurl = "http://10.11.14.24/";
			else $camurl = "http://10.11.11.22/";
		}
		else if($terminal == "tirtonadi"){
			if($cctvid == 'sl1')
				$camurl = "http://10.12.12.31/";
			else if($cctvid == 'sl2')
				$camurl = "http://10.12.13.32/";
			else if($cctvid == 'sl3')
				$camurl = "http://10.12.14.35/";
			else if($cctvid == 'sl4')
				$camurl = "http://10.12.14.36/";
			else if($cctvid == 'sl5')
				$camurl = "http://10.12.15.33/";
			else if($cctvid == 'sl6')
				$camurl = "http://10.12.15.34/";
			else $camurl = "http://10.12.12.31/";
		}
		else if($terminal == "purabaya"){
			if($cctvid == 'sd1')
				$camurl = "http://10.13.13.41/";
			else if($cctvid == 'sd2')
				$camurl = "http://10.13.14.42/";
			else if($cctvid == 'sd3')
				$camurl = "http://10.13.14.43/";
			else if($cctvid == 'sd4')
				$camurl = "http://10.13.15.44/";
			else if($cctvid == 'sd5')
				$camurl = "http://10.13.15.45/";
			else if($cctvid == 'sd6')
				$camurl = "http://10.13.16.46/";
			else $camurl = "http://10.13.13.41/";
		}
		

		// $campath =  $ip."/axis-cgi/jpg/image.cgi";
		$campath =  "/axis-cgi/mjpg/video.cgi";
		$userpass = "root:pass";  

		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_URL, $camurl . $campath);
		curl_setopt($ch, CURLOPT_POSTFIELDS, '?compression=50&resolution=320x180');
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($ch, CURLOPT_USERPWD, $userpass);
		curl_setopt($ch, CURLOPT_TIMEOUT, 4);
		$result = curl_exec($ch);
		
		if($result == false)
		{
			$file = "assets/img/" . $terminal . "/terminal.jpg";
			header('Cache-control: private');
			header('Content-Type: image/jpeg');
			header('Content-Length: '.filesize($file));
			header('Accept-Ranges: bytes');
			header("Content-Transfer-Encoding: binary");
			readfile($file);
		}
		//var_dump($file); exit;
		
		header('Content-type: image/jpeg'); 
		echo $result;           
		curl_close($ch);
	}
	
	public function __getcctv($params)
	{
		$terminal = $params[0];
		$cctvid = $params[1];
		$folder = '';
		
		$img = "assets/img/" . $terminal . "/terminal.jpg";
		if($terminal == "giwangan"){
			$folder =  "assets/RECORDING/1".strtoupper($terminal)."_".strtoupper($cctvid)."/". date("Y") ."/". date("m") ."/". date("d", strtotime("-1 days")) ."/"; //, strtotime("-1 days")
		}
		else if($terminal == "soekarno"){
			$folder =  "assets/RECORDING/2".strtoupper($terminal)."_".strtoupper($cctvid)."/". date("Y") ."/". date("m") ."/". date("d", strtotime("-1 days")) ."/";
		}
		else if($terminal == "tirtonadi"){
			$folder =  "assets/RECORDING/3".strtoupper($terminal)."_".strtoupper($cctvid)."/". date("Y") ."/". date("m") ."/". date("d", strtotime("-1 days")) ."/";
		}
		else if($terminal == "purabaya"){
			$folder =  "assets/RECORDING/4".strtoupper($terminal)."_".strtoupper($cctvid)."/". date("Y") ."/". date("m") ."/". date("d", strtotime("-1 days")) ."/";
		}
		
		$extList = array("mp4");
		$latestfile = '';
		$latest_ctime = 0;
		$latest_filename = '';
		
		if (is_dir($folder))
		{
			if ($dh = opendir($folder))
			{
				while (($file = readdir($dh)) !== false)
				{
					if ($file != "." and
						$file != ".." and
						in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), $extList) ) //and substr($file, 0, 3) == "det"
					{
						if(filemtime($folder . '/' . $file) > $latest_ctime)
						{
							$latest_ctime = filemtime($folder . '/' . $file);
							$latestfile = $file;
						}
					}
				}
				closedir($dh);
			}
		}
		
		$file = ($folder . $latestfile);
		
		/*
		$splitfile = explode('/', $file);
		
		if(trim($splitfile[end(array_keys($splitfile))]) == '' or
		   trim($splitfile[end(array_keys($splitfile))]) == null)
		{
			$file = $img;
			header('Cache-control: private');
			header('Content-Type: image/jpeg');
			header('Content-Length: '.filesize($file));
			header('Accept-Ranges: bytes');
			header("Content-Transfer-Encoding: binary");
			readfile($file);
		}
		*/
		//var_dump($file); exit;
		
		header('Cache-control: private');
		header('Content-Type: video/mp4');
		header('Content-Length: '.filesize($file));
		header('Accept-Ranges: bytes');
		header("Content-Transfer-Encoding: binary");
		readfile($file);
	}
	
	public function _getcctv()
	{
		$terminal = trim($_POST["terminal"]) ? trim($_POST["terminal"]):"giwangan";
		$cctvid = trim($_POST["cctvid"]) ? trim($_POST["cctvid"]):"jg1";
		$folder = '';
		
		$img = "assets/img/" . $terminal . "/terminal.jpg";
		if($terminal == "giwangan"){
			$folder =  "assets/RECORDING/1".strtoupper($terminal)."_".strtoupper($cctvid)."/". date("Y") ."/". date("m") ."/". date("d", strtotime("-1 days")) ."/"; //, strtotime("-1 days")
		}
		else if($terminal == "soekarno"){
			$folder =  "assets/RECORDING/2".strtoupper($terminal)."_".strtoupper($cctvid)."/". date("Y") ."/". date("m") ."/". date("d", strtotime("-1 days")) ."/";
		}
		else if($terminal == "tirtonadi"){
			$folder =  "assets/RECORDING/3".strtoupper($terminal)."_".strtoupper($cctvid)."/". date("Y") ."/". date("m") ."/". date("d", strtotime("-1 days")) ."/";
		}
		else if($terminal == "purabaya"){
			$folder =  "assets/RECORDING/4".strtoupper($terminal)."_".strtoupper($cctvid)."/". date("Y") ."/". date("m") ."/". date("d", strtotime("-1 days")) ."/";
		}
		
		$extList = array("jpg");
		$listfile = '';
		$file = '';
		
		if (is_dir($folder))
		{
			if ($dh = opendir($folder))
			{
				//Get all files into array
				while (($file = readdir($dh)) !== false)
				{
					if ($file != "." and
						$file != ".." and
						in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), $extList) and
						strpos(pathinfo($file, PATHINFO_FILENAME), 'thumb') < -1 )
					{
						$listfile[filemtime($folder . $file)] = $folder . $file;
					}
				}
				closedir($dh);
			}
		}
		
		krsort($listfile);
		$listfile = array_slice($listfile, 0, 20);
		//asort($listfile);
		var_dump ($listfile); exit;
		
		$result = array("status" => 1, "listfile" => $listfile, "n" => count($listfile));
		echo json_encode($result);
	}
	function jadwal($params)
	{
		if($params[0]=='giwangan')
			$terminal='giwangan';
		else if($params[0]=='soekarno')
			$terminal='klaten';
		else if($params[0]=='tirtonadi')
			$terminal='tirtonadi';
		else if($params[0]=='purabaya')
			$terminal='surabaya';

		$data['terminal']=$terminal;
		$this->load->view('jadwal',$data);
	}
	private function getFileList($dir, &$listfile = array())
	{
		$extList = array("mp4");
		$files = scandir($dir);
		// echo '<pre>';
		// print_r($files);
		// echo '</pre>';
		//Change current directory
		// chdir("C:\FFmpegTool\bin");

		foreach($files as $key => $value){
			$path = realpath($dir.DIRECTORY_SEPARATOR.$value);


				if(!is_dir($path)) 
				{
					$ukuran=filesize($path);
					// echo $ukuran.'-'.$path.'<br>';
					if($ukuran>0)
					{
					// echo ceil(filesize($path)/1024).'<br>';
						if(in_array(strtolower(pathinfo($path, PATHINFO_EXTENSION)), $extList))
						{
							// echo strtolower(pathinfo($path, PATHINFO_EXTENSION)) .'<br>';
							//Get duration of .mp4
							// $output = shell_exec('ffmpeg -i "' . $path . '" 2>&1');
							// $regexp = "/Duration: ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2}).([0-9]{1,2})/";
							// preg_match($regexp, $output, $matches);
							// $duration = ((int)$matches[1] * 3600) + ((int)$matches[2] * 60) + (int)$matches[3];
							// $getID3 = new getID3;
							// $ddd=$getID3->analyze($path);
							// $duration=$ddd['playtime_string'];
							// // echo $durasi['playtime_string'];
							// //echo $duration . "<br />";
							
							// if($duration >0)
							// {
								$filename = pathinfo($path, PATHINFO_FILENAME);
							// 	// echo $filename.'<br>';
								$listfile[strtolower(pathinfo($path, PATHINFO_EXTENSION))]['n'.str_replace(' ', '', str_replace('-', '', str_replace('_', '', $filename)))] = $path;
							// }
						}
					}
				} else if($value != "." && $value != "..") {

					$this->getFileList($path, $listfile);
					
					if(in_array(strtolower(pathinfo($path, PATHINFO_EXTENSION)), $extList))
					{
						//Get duration of .mp4
						// $output = shell_exec('ffmpeg -i "' . $path . '" 2>&1');
						// $regexp = "/Duration: ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2}).([0-9]{1,2})/";
						// preg_match($regexp, $output, $matches);
						// $duration = ((int)$matches[1] * 3600) + ((int)$matches[2] * 60) + (int)$matches[3];
						//echo $duration . "<br />";
						// $getID3 = new getID3;
						// $ddd=$getID3->analyze($path);
						// $duration=$ddd['playtime_string'];
						// $duration=0;
						
						// if($duration >0)
						// {
							$filename = pathinfo($path, PATHINFO_FILENAME);
							$listfile[strtolower(pathinfo($path, PATHINFO_EXTENSION))]['n'.str_replace(' ', '', str_replace('-', '', str_replace('_', '', $filename)))] = $path;
						// }
					}
				
			}
		}
		
		//return array_slice($listfile, 0, 1);
		return $listfile;
	}
	
	public function getcctv($params)
	{
		$terminal = strtolower($params[0]);
		$cctvid = strtolower($params[1]);
		$folder = '';
		
		$img = "assets/img/" . $terminal . "/terminal.jpg";
		if($terminal == "giwangan"){
			if($cctvid == "jg1")
				$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/78462234-e6c4-4778-bc5d-9dc11a646886";
			else if($cctvid == "jg2")
				$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/15ee9ed5-06c3-4231-8773-a843e5bed3e1";
			else if($cctvid == "jg3")
				$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/f2aa1dd0-8830-476a-ba78-36ea3eb7ca10/mp4";
			else if($cctvid == "jg4")
				$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/e4571d44-af2c-4dfe-a8a4-ecc6ec3f51f1";
			else if($cctvid == "jg5")
				$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/57ede942-3373-4caa-a00c-8131ac2e3b6b";
			else if($cctvid == "jg6")
				$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/db9f01de-3ce3-4c1e-b17c-96bc2f37abf8";
		}
		else if($terminal == "soekarno"){
			if($cctvid == "kl1")
				$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/2c7cdf6c-a28e-444a-806f-079c7c6cc9f1";
			else if($cctvid == "kl2")
				$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/367ea7d5-8f23-4149-b4e9-f7143af25fdd";
			else if($cctvid == "kl3")
				$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/c6a45dd5-5794-4273-a753-e04c766d1a56";
			else if($cctvid == "kl4")
				$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/df5fb104-99ca-4dc7-b0c7-2b7aebd66318";
			else if($cctvid == "kl5")
				$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/b0a2f2c0-2f85-4ad0-b511-8efee8ffe87c";
			else if($cctvid == "kl6")
				$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/5c3a54ea-06dd-47f5-bead-ef25aa6f96f5";
		}
		else if($terminal == "tirtonadi"){
			if($cctvid == "sl1")
				$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/ea2ecaff-4d95-4272-8527-b5f607562785";
			else if($cctvid == "sl2")
				$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/ce979aaf-fe47-4e80-a6e7-16c56cc73c5e";
			else if($cctvid == "sl3")
				$folder = "-";
			else if($cctvid == "sl4")
				$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/03675c8e-e5e9-41f9-8aac-dc9e5f71cb5f";
			else if($cctvid == "sl5")
				$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/0ac2fef4-a953-4f15-9dd1-31d12b2c34e8";
			else if($cctvid == "sl6")
				$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/e7062a3a-2607-4be9-85d2-90bdcabcc79e";
		}
		else if($terminal == "purabaya"){
			if($cctvid == "sd1")
				$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/20ceaaf3-173a-4e82-a5ee-9477d3333dc3";
			else if($cctvid == "sd2")
				$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/eb1aa791-e675-40bf-bdd4-d4ca1cb43920";
			else if($cctvid == "sd3")
				$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/068a6168-f3ab-4017-bbec-5fd8508412fb";
			else if($cctvid == "sd4")
				$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/9fe45a63-f395-4ad6-be94-9c175a05900e";
			else if($cctvid == "sd5")
				$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/a33208c7-6e57-4b0f-a57d-d5d8f42edaba";
			else if($cctvid == "sd6")
				$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/6ebd140b-ac57-4707-ad9c-a85427b718b5";
		}
		
		$listfile['mp4'] = null;
		$files = $this->getFileList($folder, $listfile);

		krsort($files['mp4']);
		// echo '<pre>';
		// print_r($files);
		// echo '</pre>';
		// if(count($files['mp4']) > 1)
		$idxFiles=key($files['mp4']);
		$lp=explode('::', $files['mp4'][$idxFiles]);
		$latestMp4 = $lp[0];
		// echo $latestMp4;
			// $latestMp4 = array_slice($files['mp4'], 1, 1);
		// else $latestMp4 = array_slice($files['mp4'], 0, 1);
		// else $latestMp4 = array_slice($files['mp4'], 0, 1);

		// $latestMp4 = implode('', $latestMp4);
		// $latestMp4 = str_replace(trim(' \ '), '/', $latestMp4);
		// $fi=explode('\\', $latestMp4);
		// $namafile=$fi[count($fi)-1];
		// echo $namafile;
		//echo 'a' . ceil(filesize($latestMp4)/1024) . 'b'; exit;
		
		header('Cache-control: private');
		header('Cache-control: must-revalidate');
		header('Content-Type: video/mp4');
		header('Content-Length: '.filesize($latestMp4));
		header('Accept-Ranges: bytes');
		header("Content-Transfer-Encoding: binary");
		ob_clean();
		ob_flush();
		flush();
		readfile($latestMp4);
		exit;
	}
	function fileplayvideo($files)
	{
		$file=$files[1];
		$ff=explode('__', $file);
		$f=$ff[count($ff)-1];
		$folder=$ff[0];
		list($name,$ext)=explode('.', $f);
		$jpg_name=$name.'.jpg';
		// $file=str_replace('__', '/', $files[0]);
		$data['index']=$files[0];
		$data['jpg']=$jpg_name;
		$data['file']=$f;
		$data['folder']=$folder;
		// $file='D:/JOB/RAMTEC/CCTV/Terbaru/f2aa1dd0-8830-476a-ba78-36ea3eb7ca10/mp4/2017-02-09 12_29_21_319.mp4';
		$this->load->view('showvideo',$data);
	}
	function playvideo($files)
	{

		$folder=str_replace('%20', ' ', $files[0]);
		$file=str_replace('%20', ' ', $files[1]);
		$file=DIRECTORY_FOLDER.$folder.'/mp4/'.$file;
		// $file='D:/JOB/RAMTEC/CCTV/Terbaru/'.$folder.'/mp4/'.$file;
		// $file='D:/JOB/RAMTEC/CCTV/Terbaru/f2aa1dd0-8830-476a-ba78-36ea3eb7ca10/mp4/2017-02-09 12_29_21_319.mp4';
		// header('Content-Type: video/mp4');
		// header('Content-Length: '.filesize($file));
		// // header('Accept-Ranges: bytes');
		// header("Content-Transfer-Encoding: binary");
		// ob_clean();
		// ob_flush();
		// flush();
		// readfile($file);
		// exit;
		$stream=new VideoStream($file);
		$stream->start();
	}

	function fileplayvideoios($files)
	{
		$file=$files[1];
		$ff=explode('__', $file);
		$f=$ff[count($ff)-1];
		$folder=$ff[0];
		list($name,$ext)=explode('.', $f);
		$jpg_name=$name.'.jpg';
		// $file=str_replace('__', '/', $files[0]);
		$data['index']=$files[0];
		$data['jpg']=$jpg_name;
		$data['file']=$f;
		$data['folder']=$folder;
		// $file='D:/JOB/RAMTEC/CCTV/Terbaru/f2aa1dd0-8830-476a-ba78-36ea3eb7ca10/mp4/2017-02-09 12_29_21_319.mp4';
		$this->load->view('showvideo',$data);
	}
	function playvideoios($files)
	{

		$folder=str_replace('%20', ' ', $files[0]);
		$file=str_replace('%20', ' ', $files[1]);
		$file=DIRECTORY_FOLDER.$folder.'/mp4/'.$file;
		// $file='D:/JOB/RAMTEC/CCTV/Terbaru/'.$folder.'/mp4/'.$file;
		// $file='D:/JOB/RAMTEC/CCTV/Terbaru/f2aa1dd0-8830-476a-ba78-36ea3eb7ca10/mp4/2017-02-09 12_29_21_319.mp4';
		header('Content-Type: video/mp4');
		header('Content-Length: '.filesize($file));
		// header('Accept-Ranges: bytes');
		header("Content-Transfer-Encoding: binary");
		ob_clean();
		ob_flush();
		flush();
		readfile($file);
		//exit;
	}
	function cobavideo()
	{
		// /02bf57e8-3e24-47f9-9326-22a3053ed99f
		//2017-03-06 10_33_34_258.mp4
		// echo '<video controls="" autoplay="" name="media"><source src="http://localhost:81/cctv/terminalku/assets/img/2017-03-06%2010_33_14_258.mp4" type="video/mp4"></video>';
		// $url="http://203.130.228.59:8887/terminal/iosstream/b1db04ab-d030-4f77-9272-c7d97ed70e6a/2017-03-15%2022_51_59_885.mp4";
		$file='D:/JOB/RAMTEC/CCTV/Terbaru/02bf57e8-3e24-47f9-9326-22a3053ed99f/mp4/2017-03-06 10_34_10_725.mp4';
		$stream=new VideoStream($file);
		$stream->start();
		// exit;

	}
	public function getcctvall_new($params)
	{
		// hapussebulan();
		$terminal = strtolower($params[0]);
		$cctvid = strtolower($params[1]);
		$folder = '';
		
		$img = "assets/img/" . $terminal . "/terminal.jpg";

		$wh=array('kode'=>$cctvid,'lokasi_kamera'=>$terminal);
		$data=$this->db->from('tbl_folder')->where($wh)->get()->result();
		if(count($data)!=0)
		{

		// echo DIRECTORY_FOLDER;
			$folder = DIRECTORY_FOLDER.$data[0]->folder.'/mp4';
		
			
			$listfile['mp4'] = null;
			$files = $this->getFileList($folder, $listfile);
			$topFiles=array();

			$getID3 = new getID3;

			$x=0;
			if(count($files['mp4'])>0)
			{

				foreach ($files['mp4'] as $k => $va) 
				{
					if(filesize($va)>1024)
					{
						$g=explode('\\', $va);
						list($n1,$ext)=explode('.', $g[count($g)-1]);
						list($nf1,$nf2)=explode(' ', $n1);
						list($jm,$mn,$dt,$sk)=explode('_', $nf2);
						$hi=$nf1.' '.$jm.':'.$mn.':'.$dt;
						$gettime=(date('H')-1);
						$date = date_create(date('Y-m-d H:i:s'));
						// print_r($date);
						date_add($date, date_interval_create_from_date_string('-15 minutes'));
						date_add($date, date_interval_create_from_date_string('-7 hours'));
						$cekwaktu=date_format($date, 'Y-m-d H:i:s');
						//echo $hi.'-'.$cekwaktu.'<br>';
						if($hi>=$cekwaktu)
						{
						// if($va!=$awal)
						// {
							// if(file_exists($va))
							// {

								$ddd=$getID3->analyze($va);

								// echo $va.'--'.filesize($va).'<br>';
								if($ddd['quicktime']['mdat']['size'] != 0)
								{

									$duration=$ddd['playtime_string'];
									

									// $topFiles[]=$g[count($g)-3].'/'.$n1.'.'.$ext;
									$ddir=str_replace('/', '\\', DIRECTORY_FOLDER);
									$topFiles[]='E:\\Recording\\'.str_replace($ddir, '', $va);
									$x++;
									$jpg=$_SERVER['DOCUMENT_ROOT'].'/assets/img/'.(str_replace('.mp4', '.jpg', $g[count($g)-1])).'';
									shell_exec('C:/FFmpegTool/bin/ffmpeg -ss 0.5 -i "'.$va.'" -t 1 -s 600x350 -f image2 "'.$jpg.'"');
								}
							// }
						}	
					}
				}

				if(count($topFiles)==0)
				{
					krsort($files['mp4']);
					$topTen = array_slice($files['mp4'], 0,10,true);
					$ddbaru=array();
					ksort($topTen);
					foreach ($topTen as $k => $v) 
					{
						if(filesize($v)>1024)
						{
							$ddd=$getID3->analyze($v);

								// echo $va.'--'.filesize($va).'<br>';
							if($ddd['quicktime']['mdat']['size'] != 0)
							{

								$duration=$ddd['playtime_string'];
								$g=explode('\\', $v);
								$jpg=$_SERVER['DOCUMENT_ROOT'].'/assets/img/'.(str_replace('.mp4', '.jpg', $g[count($g)-1])).'';
								shell_exec('C:/FFmpegTool/bin/ffmpeg -ss 0.5 -i "'.$v.'" -t 1 -s 600x350 -f image2 "'.$jpg.'"');
								$ddir=str_replace('/', '\\', DIRECTORY_FOLDER);
								$ddbaru[]='E:\\Recording\\'.str_replace($ddir, '', $v);
							}
						}
					}
					echo '['.json_encode($ddbaru).']';
				}
				else
				{
					echo '['.json_encode($topFiles).']';
				}
			}
			else
			{
				echo '['.json_encode(array()).']';
			}

		}
		else
		{
			echo '['.json_encode(array()).']';
		}
	}
	public function getcctvall($params)
	{
		$terminal = strtolower($params[0]);
		$cctvid = strtolower($params[1]);
		$folder = '';
		
		$img = "assets/img/" . $terminal . "/terminal.jpg";

		$wh=array('kode'=>$cctvid,'lokasi_kamera'=>$terminal);
		$data=$this->db->from('tbl_folder')->where($wh)->get()->result();
		if(count($data)!=0)
		{

		// echo DIRECTORY_FOLDER;
			$folder = DIRECTORY_FOLDER.$data[0]->folder.'/mp4';
			// if($terminal == "giwangan"){
			// 	if($cctvid == "jg1")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/0c448fac-f403-411f-a99a-90cd17441361/mp4";
			// 	else if($cctvid == "jg2")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/5f50deaf-aac8-4eff-a82f-25274aeb5a8d/mp4";
			// 	else if($cctvid == "jg3")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/5f50deaf-aac8-4eff-a82f-25274aeb5a8d/mp4";
			// 	else if($cctvid == "jg4")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/f8124a62-8e3c-4b99-afba-fa900cf9ff10/mp4";
			// 	else if($cctvid == "jg5")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/3f2fbf63-368f-452e-8424-137c88613403/mp4";
			// 	else if($cctvid == "jg6")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/6df639cc-9b34-4cc3-8062-23d650c576d5/mp4";
			// }
			// else if($terminal == "soekarno"){
			// 	if($cctvid == "kl1")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/b1db04ab-d030-4f77-9272-c7d97ed70e6a/mp4";
			// 	else if($cctvid == "kl2")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/7fa65726-40e1-42e5-b439-afb1b9fdcf66/mp4";
			// 	else if($cctvid == "kl3")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/cd52de4a-9a6c-497e-806d-5a0e17d4dc53/mp4";
			// 	else if($cctvid == "kl4")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/19ac5477-db64-4339-81ca-eeccdb852405/mp4";
			// 	else if($cctvid == "kl5")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/edb56316-2488-4221-bcdd-bfdaa61ae066/mp4";
			// 	else if($cctvid == "kl6")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/bb7ded47-4fa6-491a-a618-e0dd424817eb/mp4";
			// }
			// else if($terminal == "tirtonadi"){
			// 	if($cctvid == "sl1")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/51302a4b-5ea4-4d54-a884-dfe29747f780/mp4";
			// 	else if($cctvid == "sl2")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/552485c5-27f0-4d8f-9389-5f687cf1e548/mp4";
			// 	else if($cctvid == "sl3")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/dd72020b-18a8-49f9-a1cd-605f00220508/mp4";
			// 	else if($cctvid == "sl4")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/4d0783ac-0d68-4c45-8440-451a2a55c7ce/mp4";
			// 	else if($cctvid == "sl5")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/304c3c86-73ed-4d2c-a25a-4edad14ef9a5/mp4";
			// 	else if($cctvid == "sl6")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/8dce6c88-eb46-402e-8307-ac6ff7cd7de2/mp4";
			// }
			// else if($terminal == "purabaya"){
			// 	if($cctvid == "sd1")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/9a98fa5e-c9d2-40e6-9a9f-e6f049a13fc2/mp4";
			// 	else if($cctvid == "sd2")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/0334245e-79f3-42eb-8bda-ad991935ce43/mp4";
			// 	else if($cctvid == "sd3")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/f440687e-722f-4797-b95d-bf5bceefbc94/mp4";
			// 	else if($cctvid == "sd4")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/b18c5818-d3f8-444e-b057-1d6c9d9eec5c/mp4";
			// 	else if($cctvid == "sd5")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/9df51a27-dba8-4318-8f6f-46bbb8243146/mp4";
			// 	else if($cctvid == "sd6")
			// 		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/74b5e886-2da2-4607-b8d1-b09c28e296f8/mp4";
			// }
			
			$listfile['mp4'] = null;
			$files = $this->getFileList($folder, $listfile);

			// krsort($files['mp4']);
			// // $countedArray = array_count_values($files['mp4']);
			// $topTen = array_slice($files['mp4'], 0,5,true);
			$topFiles=array();
			// foreach ($files['mp4'] as $k => $v) 
			// {
			// 	// $duration=getDuration($v);
			// 	$topTen[$k]=$v.'::'.$duration;
			// }

			$getID3 = new getID3;
			

			// $topp=array();
			// krsort($topTen);
			// $topp[0]=$awal=$topTen[key($topTen)];

			// ksort($topTen);
			// echo '<pre>';
			// print_r($files);
			// echo '</pre>';
			$x=0;
			if(count($files['mp4'])>0)
			{

				foreach ($files['mp4'] as $k => $va) 
				{
					if(filesize($va)>1024)
					{
						$g=explode('\\', $va);
						list($n1,$ext)=explode('.', $g[count($g)-1]);
						list($nf1,$nf2)=explode(' ', $n1);
						list($jm,$mn,$dt,$sk)=explode('_', $nf2);
						$hi=$nf1.' '.$jm.':'.$mn.':'.$dt;
						$gettime=(date('H')-1);
						$date = date_create(date('Y-m-d H:i:s'));
						// print_r($date);
						date_add($date, date_interval_create_from_date_string('-15 minutes'));
						date_add($date, date_interval_create_from_date_string('-7 hours'));
						$cekwaktu=date_format($date, 'Y-m-d H:i:s');
						if($hi>=$cekwaktu)
						{
						// echo $hi.'-'.$cekwaktu.'<br>';
						// if($va!=$awal)
						// {
							// if(file_exists($va))
							// {

								$ddd=$getID3->analyze($va);

								// echo $va.'--'.filesize($va).'<br>';
								if($ddd['quicktime']['mdat']['size'] != 0)
								{

									$duration=$ddd['playtime_string'];
									

									// $topFiles[]=$g[count($g)-3].'/'.$n1.'.'.$ext;
									$ddir=str_replace('/', '\\', DIRECTORY_FOLDER);
									$topFiles[]=str_replace($ddir, '', $va);
									$x++;
									$jpg=$_SERVER['DOCUMENT_ROOT'].'/assets/img/'.(str_replace('.mp4', '.jpg', $g[count($g)-1])).'';
									shell_exec('C:/FFmpegTool/bin/ffmpeg -ss 0.5 -i "'.$va.'" -t 1 -s 600x350 -f image2 "'.$jpg.'"');
								}
							// }
						}	
					}
				}

				if(count($topFiles)==0)
				{
					krsort($files['mp4']);
					$topTen = array_slice($files['mp4'], 0,6,true);
					$ddbaru=array();
					ksort($topTen);
					foreach ($topTen as $k => $v) 
					{
						if(filesize($v)>1024)
						{
							$ddd=$getID3->analyze($v);

								// echo $va.'--'.filesize($va).'<br>';
							if($ddd['quicktime']['mdat']['size'] != 0)
							{

								$duration=$ddd['playtime_string'];
								$g=explode('\\', $v);
								$jpg=$_SERVER['DOCUMENT_ROOT'].'/assets/img/'.(str_replace('.mp4', '.jpg', $g[count($g)-1])).'';
								shell_exec('C:/FFmpegTool/bin/ffmpeg -ss 0.5 -i "'.$v.'" -t 1 -s 600x350 -f image2 "'.$jpg.'"');
								$ddir=str_replace('/', '\\', DIRECTORY_FOLDER);
								$ddbaru[]=str_replace($ddir, '', $v);
							}
						}
					}
					echo '['.json_encode($ddbaru).']';
				}
				else
				{
					echo '['.json_encode($topFiles).']';
				}
			}
			else
			{
				echo '['.json_encode(array()).']';
			}
			// echo '<pre>';
			// print_r($files['mp4']);
			// echo '</pre>';
			// if(count($files['mp4']) > 1)
			// $idxFiles=key($files['mp4']);
			// $latestMp4 = $files['mp4'][$idxFiles];
			// echo $latestMp4;
				// $latestMp4 = array_slice($files['mp4'], 1, 1);
			// else $latestMp4 = array_slice($files['mp4'], 0, 1);
			// else $latestMp4 = array_slice($files['mp4'], 0, 1);

			// $latestMp4 = implode('', $latestMp4);
			// $latestMp4 = str_replace(trim(' \ '), '/', $latestMp4);
			// $fi=explode('\\', $latestMp4);
			// $namafile=$fi[count($fi)-1];
			// echo $namafile;
			//echo 'a' . ceil(filesize($latestMp4)/1024) . 'b'; exit;
			
			// header('Cache-control: private');
			// header('Cache-control: must-revalidate');
			// header('Content-Type: video/mp4');
			// header('Content-Length: '.filesize($latestMp4));
			// header('Accept-Ranges: bytes');
			// header("Content-Transfer-Encoding: binary");
			// ob_clean();
			// ob_flush();
			// flush();
			// readfile($latestMp4);
			// exit;
		}
		else
		{
			echo '['.json_encode(array()).']';
		}
	}

	function shellscript($ff)
	{
		shell_exec('taskkill /im ffmpeg.exe /f');
		$folder=$ff[0];

		shell_exec('C:\\xampp\\htdocs\\TERMINALKU\\script.bat "'.$folder.'"');
	}

	function shellscriptall()
	{
		shell_exec('taskkill /im ffmpeg.exe /f');
		shell_exec('C:\\xampp\\htdocs\\TERMINALKU\\script.bat');
	} 
	public function pageauto ()
	{
		/*Copy all general data*/
		$this->data = $this->general->data;
		
		$this->data["pagetitle"] = "Page Not Found";
		$this->data["currpage"] = "home";
		
		$this->template->parse_view('tpl_header', 'template/header', $this->data);
		$this->template->parse_view('tpl_footer', 'template/footer', $this->data);
		$this->template->parse_view('tpl_main', 'autoscipt', $this->data);
		$this->template->render();
	}
	function datafolder($terminal)
	{
		// $terminal=$param[0];
		$data=array(
			"giwangan" => array(
				"jg1"=>"0c448fac-f403-411f-a99a-90cd17441361",
				"jg2"=>"5f50deaf-aac8-4eff-a82f-25274aeb5a8d",
				"jg4"=>"f8124a62-8e3c-4b99-afba-fa900cf9ff10",
				"jg5"=>"3f2fbf63-368f-452e-8424-137c88613403",
				"jg6"=>"6df639cc-9b34-4cc3-8062-23d650c576d5"),
			"soekarno" => array(
				"kl1"=>"b1db04ab-d030-4f77-9272-c7d97ed70e6a",
				"kl2"=>"7fa65726-40e1-42e5-b439-afb1b9fdcf66",
				"kl3"=>"cd52de4a-9a6c-497e-806d-5a0e17d4dc53",
				"kl4"=>"19ac5477-db64-4339-81ca-eeccdb852405",
				"kl5"=>"edb56316-2488-4221-bcdd-bfdaa61ae066",
				"kl6"=>"bb7ded47-4fa6-491a-a618-e0dd424817eb"),
			"tirtonadi" => array(
				"sl1"=>"51302a4b-5ea4-4d54-a884-dfe29747f780",
				"sl2"=>"552485c5-27f0-4d8f-9389-5f687cf1e548",
				"sl3"=>"dd72020b-18a8-49f9-a1cd-605f00220508",
				"sl4"=>"4d0783ac-0d68-4c45-8440-451a2a55c7ce",
				"sl5"=>"304c3c86-73ed-4d2c-a25a-4edad14ef9a5",
				"sl6"=>"8dce6c88-eb46-402e-8307-ac6ff7cd7de2"),
			"purabaya"=>array(
				"sd1"=>"9a98fa5e-c9d2-40e6-9a9f-e6f049a13fc2",
				"sd2"=>"0334245e-79f3-42eb-8bda-ad991935ce43",
				"sd3"=>"f440687e-722f-4797-b95d-bf5bceefbc94",
				"sd4"=>"b18c5818-d3f8-444e-b057-1d6c9d9eec5c",
				"sd5"=>"9df51a27-dba8-4318-8f6f-46bbb8243146",
				"sd6"=>"74b5e886-2da2-4607-b8d1-b09c28e296f8")
		);
		// echo $terminal;
		// if(array_key_exists($terminal, $data))
		// {
		// 	echo 'Ada';
		// }
		// else
		// 	echo 'Gk';
		return $data[$terminal];
	}

	function cekdata()
	{
		$folder = "D:/JOB/RAMTEC/CCTV/Terbaru/";
		$data=array(
			"giwangan" => array(
				"jg1"=>"0c448fac-f403-411f-a99a-90cd17441361",
				"jg2"=>"5f50deaf-aac8-4eff-a82f-25274aeb5a8d",
				"jg4"=>"f8124a62-8e3c-4b99-afba-fa900cf9ff10","jg5"=>"3f2fbf63-368f-452e-8424-137c88613403","jg6"=>"6df639cc-9b34-4cc3-8062-23d650c576d5"),
			"soekarno" => array(
				"kl1"=>"b1db04ab-d030-4f77-9272-c7d97ed70e6a",
				"kl2"=>"7fa65726-40e1-42e5-b439-afb1b9fdcf66",
				"kl3"=>"cd52de4a-9a6c-497e-806d-5a0e17d4dc53",
				"kl4"=>"19ac5477-db64-4339-81ca-eeccdb852405",
				"kl5"=>"edb56316-2488-4221-bcdd-bfdaa61ae066",
				"kl6"=>"bb7ded47-4fa6-491a-a618-e0dd424817eb"),
			"tirtonadi" => array(
				"sl1"=>"51302a4b-5ea4-4d54-a884-dfe29747f780",
				"sl2"=>"552485c5-27f0-4d8f-9389-5f687cf1e548",
				"sl3"=>"dd72020b-18a8-49f9-a1cd-605f00220508",
				"sl4"=>"4d0783ac-0d68-4c45-8440-451a2a55c7ce",
				"sl5"=>"304c3c86-73ed-4d2c-a25a-4edad14ef9a5",
				"sl6"=>"8dce6c88-eb46-402e-8307-ac6ff7cd7de2"),
			"purabaya"=>array(
				"sd1"=>"9a98fa5e-c9d2-40e6-9a9f-e6f049a13fc2",
				"sd2"=>"0334245e-79f3-42eb-8bda-ad991935ce43",
				"sd3"=>"f440687e-722f-4797-b95d-bf5bceefbc94",
				"sd4"=>"b18c5818-d3f8-444e-b057-1d6c9d9eec5c",
				"sd5"=>"9df51a27-dba8-4318-8f6f-46bbb8243146",
				"sd6"=>"74b5e886-2da2-4607-b8d1-b09c28e296f8")
		);

		foreach ($data as $k => $v) 
		{
			echo $k.'<br>';
			foreach ($v as $kv => $vv) 
			{
				$listfile['acsm'] = null;
				$fol=$folder.$vv.'/';
				echo $fol.'<br>';
				$files = $this->getFileListNew($fol, $listfile);
				echo '<pre>';
				print_r($files);
				echo '</pre>';
				// echo $kv.'=>'.$vv.'<br>';
			}
		}
	}

	function getFileListNew($dir, &$listfile = array())
	{
		$extList = array("acsm");
		// print_r($extList);
		$files = scandir($dir);
		foreach($files as $key => $value){
			$path = realpath($dir.DIRECTORY_SEPARATOR.$value);
			if(!is_dir($path)) 
			{
				// echo ceil(filesize($path)/1024).'<br>';
				if(in_array(strtolower(pathinfo($path, PATHINFO_EXTENSION)), $extList))
				{
					
						$filename = pathinfo($path, PATHINFO_FILENAME);
						$listfile[strtolower(pathinfo($path, PATHINFO_EXTENSION))]['n'.str_replace(' ', '', str_replace('-', '', str_replace('_', '', $filename)))] = $path;
				}
			} else if($value != "." && $value != "..") {
				$this->getFileListNew($path, $listfile);
				
				if(in_array(strtolower(pathinfo($path, PATHINFO_EXTENSION)), $extList))
				{
						$filename = pathinfo($path, PATHINFO_FILENAME);
						$listfile[strtolower(pathinfo($path, PATHINFO_EXTENSION))]['n'.str_replace(' ', '', str_replace('-', '', str_replace('_', '', $filename)))] = $path;
				}
			}
		}

		return $listfile;
	}
	function cekreadable()
	{
		$getID3 = new getID3;
		$file='E:\\Recording\\Terbaru\\b1db04ab-d030-4f77-9272-c7d97ed70e6a\\mp4\\2017-03-05 15_28_39_149.mp4';
		$file2='E:\\Recording\\Terbaru\\b1db04ab-d030-4f77-9272-c7d97ed70e6a\\mp4\\2017-03-05 15_29_19_149.mp4';
		$file3='E:\\Recording\\Terbaru\\b1db04ab-d030-4f77-9272-c7d97ed70e6a\\mp4\\2017-03-05 15_22_47_600.mp4';
		$d=$getID3->analyze($file);
		$dd=$getID3->analyze($file2);
		$ddd=$getID3->analyze($file3);
		echo '<pre>';
		print_r($d);
		print_r($dd);
		print_r($ddd);
		echo '</pre>';
		if(is_readable($file))
		{
			echo 'oke';
		} 
		else
			echo 'no';

	}
}