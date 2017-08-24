<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("general.php");

class Terminal extends CI_Controller {
	
	var $general, $data;
	
	public function __construct()
	{
		parent::__construct();
		
		/*Create object class General*/
		$params = array("base_url" => base_url());
		$this->general = new General($params);
	}

	public function _remap( $method, $args = array() )
    {
		if (method_exists($this, $method))
			$this->$method($args);
		else $this->page_not_found();
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
		//$this->template->parse_view('tpl_main', 'terminal_recordmp4', $this->data);
		$this->template->parse_view('tpl_main', 'terminal_tembakip', $this->data);

		$this->template->render();
	}
	
	public function getcctv($params)
	{
		$terminal = $params[0];
		$cctvid = $params[1];
		$camurl = '';

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
		

		$campath =  "/axis-cgi/jpg/image.cgi";
		//$campath =  "/axis-cgi/mjpg/video.cgi";
		$userpass = "root:pass";  

		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_URL, $camurl . $campath);
		curl_setopt($ch, CURLOPT_POSTFIELDS, '?compression=95&resolution=320x180');
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
}