<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Coba extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function ___getcctv($terminal,$cctvid)
	{
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
		$userpass = "root:d3phub";  

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

	function getcctv($terminal,$cctvid)
	{
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
	?>
	<video width="320" height="240" autoplay controls>
	    <source src="<?=$camurl?>" type="video/mp4">
	    <object width="320" height="240" type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf">
	        <param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf" /> 
	        <param name="flashvars" value='config={"clip": {"url": "<?=$camurl?>", "autoPlay":true, "autoBuffering":true}}' /> 
	        <p><a href="<?=$camurl?>">view with external app</a></p> 
	    </object>
	</video>
	<?
	}
}