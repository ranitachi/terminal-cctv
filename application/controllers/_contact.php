<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("general.php");

class Contact extends CI_Controller {
	
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
	
	public function index()
	{
		/*Copy all general data*/
		$this->data = $this->general->data;
		
		$this->data["pagetitle"] = "Contact Us";
		$this->data["currpage"] = "contact";
		$this->data["contactaction"] = base_url() . "contact/contactAction";

		$this->data["contactformtitle"]["en"] = 'Contact Form';
		$this->data["contactformtitle"]["id"] = 'Form Kontak';

		$this->data["contactformfieldname"]["en"] = 'Name';
		$this->data["contactformfieldname"]["id"] = 'Nama';

		$this->data["contactformfieldphone"]["en"] = 'Phone';
		$this->data["contactformfieldphone"]["id"] = 'Telepon';

		$this->data["contactformfieldemail"]["en"] = 'Email Address';
		$this->data["contactformfieldemail"]["id"] = 'Alamat Email';

		$this->data["contactformfieldmessage"]["en"] = 'Message';
		$this->data["contactformfieldmessage"]["id"] = 'Pesan';

		$this->data["contactformsendbtn"]["en"] = 'Send Message';
		$this->data["contactformsendbtn"]["id"] = 'Kirim Pesan';

		$this->data["ouraddresstitle"]["en"] = 'Our Address';
		$this->data["ouraddresstitle"]["id"] = 'Alamat Kami';
		
		$this->template->parse_view('tpl_header', 'template/header', $this->data);
		$this->template->parse_view('tpl_footer', 'template/footer', $this->data);
		$this->template->parse_view('tpl_main', 'contact', $this->data);
		$this->template->render();
	}
	
	public function contactAction()
	{
		$errfield = array();
		$errmsg = array();
		$ctrError = 0;
		
		/*Get data posted*/
		$contName = trim($_POST["contName"]);
		$contPhone = trim($_POST["contPhone"]);
		$contEmail = trim($_POST["contEmail"]);
		$contMessage = trim($_POST["contMessage"]);
		
		/*Check required item*/
		$this->form_validation->set_rules('contName', 'Name', 'trim|strip_tags|required');
		$this->form_validation->set_rules('contPhone', 'Phone', 'trim|strip_tags|required');
		$this->form_validation->set_rules('contEmail', 'Email', 'trim|strip_tags|required|valid_email');
		$this->form_validation->set_rules('contMessage', 'Message', 'trim|strip_tags|required');
		
		if ($this->form_validation->run() === FALSE)
		{
			if( form_error("contName") )
			{
				$errfield[] = "contName";
				$errmsg[] = "Make sure you entry name";
				$ctrError++;
			}
			
			if( form_error("contPhone") )
			{
				$errfield[] = "contPhone";
				$errmsg[] = "Make sure you entry phone";
				$ctrError++;
			}
			
			if( form_error("contEmail") )
			{
				$errfield[] = "contEmail";
				$errmsg[] = "Make sure you provide valid email";
				$ctrError++;
			}
			
			if( form_error("contMessage") )
			{
				$errfield[] = "contMessage";
				$errmsg[] = "Make sure you entry message";
				$ctrError++;
			}
		}
		else{
			$contMessage = "<p><strong>Tanggal :</strong>". date("d-M-Y H:i:s") ."</p>
							<p><strong>Dari :</strong>&nbsp;". $contName ." (". $contEmail .")</p>
							<p><strong>No. Telp/Hp :</strong> ". $contPhone ."</p>
							<p><strong>Pesan :</strong> ". $contMessage ." </p>";

			$this->email->from($contEmail, $contName);
			$this->email->to("yoan@horecaba.com");
			$this->email->cc('yoan@horecaba.com'); 
			$this->email->subject('MESSAGE FROM WWW.HORECABA.COM');
			$this->email->message($contMessage);
			
			//echo $this->email->print_debugger();

			if($this->email->send())
			{
				$result = array("status" => 1);
				echo json_encode($result);
			}
			else{
				$errfield[] = "contEmail";
				$errmsg[] = "Make sure you provide valid email";

				$result = array("status" => 0, "errfield" => $errfield, "errmsg" => $errmsg);
				echo json_encode($result);
			}
		}
		
		/*If there's error*/
		if($ctrError > 0)
		{
			/*Return to Json*/
			$result = array("status" => 0, "errfield" => $errfield, "errmsg" => $errmsg);
			echo json_encode($result);
		}
	}
}