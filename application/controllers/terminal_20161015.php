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
		$this->template->parse_view('tpl_main', 'terminal_recordmp4', $this->data);
		//$this->template->parse_view('tpl_main', 'terminal_tembakip', $this->data);
		//$this->template->parse_view('tpl_main', 'terminal_recordasf', $this->data);

		$this->template->render();
	}
	
	public function ___getcctv($params)
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
	
	private function getFileList($dir, &$listfile = array())
	{
		$extList = array("mp4");
		$files = scandir($dir);

		foreach($files as $key => $value){
			$path = realpath($dir.DIRECTORY_SEPARATOR.$value);
			if(!is_dir($path)) 
			{
				if(in_array(strtolower(pathinfo($path, PATHINFO_EXTENSION)), $extList) and ceil(filesize($path)/1024) <= 1024)
				{
					$filename = pathinfo($path, PATHINFO_FILENAME);
					$listfile[strtolower(pathinfo($path, PATHINFO_EXTENSION))][str_replace(' ', '', str_replace('-', '', str_replace('_', '', $filename)))] = $path;
				}
			} else if($value != "." && $value != "..") {
				$this->getFileList($path, $listfile);
				
				if(in_array(strtolower(pathinfo($path, PATHINFO_EXTENSION)), $extList) and ceil(filesize($path)/1024) <= 1024)
				{
					$filename = pathinfo($path, PATHINFO_FILENAME);
					$listfile[strtolower(pathinfo($path, PATHINFO_EXTENSION))][str_replace(' ', '', str_replace('-', '', str_replace('_', '', $filename)))] = $path;
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
				$folder = "E:/Recording/8a1c25dd-ac37-4612-91e4-cf8af1dcb4f9";
			else if($cctvid == "jg2")
				$folder = "E:/Recording/425587d2-4318-4f03-9692-bdec99279172";
			else if($cctvid == "jg3")
				$folder = "E:/Recording";
			else if($cctvid == "jg4")
				$folder = "E:/Recording/bf42a57a-3a2a-47de-8323-17bdbbaee7ee";
			else if($cctvid == "jg5")
				$folder = "E:/Recording/e6497eba-bf16-4b72-8f45-be5f04354903";
			else if($cctvid == "jg6")
				$folder = "E:/Recording/8ae10917-633a-4395-a22f-0ab671a4e7db";
		}
		else if($terminal == "soekarno"){
			if($cctvid == "kl1")
				$folder = "E:/Recording/09743e2d-c6e7-4a1a-b552-dc130200a337";
			else if($cctvid == "kl2")
				$folder = "E:/Recording";
			else if($cctvid == "kl3")
				$folder = "E:/Recording/d9e4e460-b38b-4153-8da1-4db5332ddee4";
			else if($cctvid == "kl4")
				$folder = "E:/Recording/02d4a363-93da-4c8d-967c-61ed932c2eaa";
			else if($cctvid == "kl5")
				$folder = "E:/Recording";
			else if($cctvid == "kl6")
				$folder = "E:/Recording/8d4f2e65-d1e9-4a78-bafd-1656a92096f5";
		}
		else if($terminal == "tirtonadi"){
			if($cctvid == "sl1")
				$folder = "E:/Recording/fad5d8b9-79e8-44e8-83df-be0de80a8288";
			else if($cctvid == "sl2")
				$folder = "E:/Recording/1096b2e4-4ee6-466e-89aa-78f53b789c27";
			else if($cctvid == "sl3")
				$folder = "E:/Recording/05384d54-dc4f-47cb-979f-dc0e24502a2c";
			else if($cctvid == "sl4")
				$folder = "E:/Recording/dd9d9538-9f45-448a-97fe-3ddaeb8d2bef";
			else if($cctvid == "sl5")
				$folder = "E:/Recording/1cf7fd1f-9a49-401d-8cbe-55a9e5d1960b";
			else if($cctvid == "sl6")
				$folder = "E:/Recording/82357a52-4d90-47f1-8e55-0f776a1e3ee3";
		}
		else if($terminal == "purabaya"){
			if($cctvid == "sd1")
				$folder = "E:/Recording/3f2b0c69-7ce2-40ac-b54d-cdec67ff97e9";
			else if($cctvid == "sd2")
				$folder = "E:/Recording/e7e45b37-6438-47da-bd05-1ce4d227ddd8";
			else if($cctvid == "sd3")
				$folder = "E:/Recording/19daa704-3d35-42cf-bcee-c0efef5a89ae";
			else if($cctvid == "sd4")
				$folder = "E:/Recording/ceb51bff-ea9e-40eb-b283-7784b6d04e23";
			else if($cctvid == "sd5")
				$folder = "E:/Recording/8cc5e0dc-341c-42aa-b2a1-784c240d24dd";
			else if($cctvid == "sd6")
				$folder = "E:/Recording/1dc04183-ee80-4e06-985f-2a2049325ddb";
		}
		
		$listfile['mp4'] = null;
		$files = $this->getFileList($folder, $listfile);
		
		krsort($files['mp4']);
		$latestMp4 = array_slice($files['mp4'], 1, 1);
		$latestMp4 = implode('', $latestMp4);
		$latestMp4 = str_replace(trim(' \ '), '/', $latestMp4);
		//echo 'a' . $latestMp4 . 'b'; exit;
		//echo 'a' . ceil(filesize($latestMp4)/1024) . 'b'; exit;
		
		header('Cache-control: private');
		header('Content-Type: video/mp4');
		header('Content-Length: '.filesize($latestMp4));
		header('Accept-Ranges: bytes');
		header("Content-Transfer-Encoding: binary");
		readfile($latestMp4);
	}
}