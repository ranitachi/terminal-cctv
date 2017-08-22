<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include("general.php");include("cropimg.php");
class User extends CI_Controller {	
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
		$this->data["pagetitle"] = "Login Page";
		$this->data["currpage"] = "user";
		$this->data["contactaction"] = base_url() . "user/loginAction";		
		$this->template->parse_view('tpl_header', 'template/header', $this->data);
		$this->template->parse_view('tpl_footer', 'template/footer', $this->data);
		$this->template->parse_view('tpl_main', 'login', $this->data);
		$this->template->render();
	}	
	public function loginAction()
	{
		$errfield = array();
		$errmsg = array();
		$ctrError = 0;		
		/*Get data posted*/
		$un = $_POST["un"];
		$pw = $_POST["pw"];		
		/*Check required item*/
		$this->form_validation->set_rules('un', 'Username', 'trim|strip_tags|required');
		$this->form_validation->set_rules('pw', 'Password', 'trim|strip_tags|required');		
		if ($this->form_validation->run() === FALSE)
		{
			if( form_error("un") )
			{
				$errfield[] = "un";
				$errmsg[] = "Make sure you entry username";
				$ctrError++;
			}			
			if( form_error("pw") )
			{
				$errfield[] = "pw";
				$errmsg[] = "Make sure you entry password";
				$ctrError++;
			}
		}
		else{			if($un == "root" and $pw == "d3phub"){				$data_session = array("un" => $un,									  "islogin" => 'Y');				$this->session->set_userdata($data_session);								$result = array("status" => 1);				echo json_encode($result);			}			else{				$errfield[] = "pw";				$errmsg[] = "Username or password is not valid";				$ctrError++;			}
		}		
		/*If there's error*/
		if($ctrError > 0)
		{
			/*Return to Json*/
			$result = array("status" => 0, "errfield" => $errfield, "errmsg" => $errmsg);
			echo json_encode($result);
		}
	}		public function uploadImage()	{		/*Copy all general data*/		$this->data = $this->general->data;				$this->data["pagetitle"] = "Uplaod Image Page";		$this->data["currpage"] = "user";		$this->data["uploadaction"] = base_url() . "user/uploadAction";		$this->data["signout"] = base_url() . "user/SignOut";				$this->template->parse_view('tpl_header', 'template/header', $this->data);		$this->template->parse_view('tpl_footer', 'template/footer', $this->data);		$this->template->parse_view('tpl_main', 'uploadimage', $this->data);		$this->template->render();	}		public function uploadAction()	{		$dirimgori = '';		$dirimgcrop = '';		/*Assign directory*/		if( isset($_POST["avatar_path"])){			if($_POST["avatar_path"] == "giwangan")			{				$dirimgcrop = "assets/img/giwangan/";				$dirimgori = "assets/img/giwangan/temp/";			}			else if($_POST["avatar_path"] == "soekarno")			{				$dirimgcrop = "assets/img/soekarno/";				$dirimgori = "assets/img/soekarno/temp/";			}			else if($_POST["avatar_path"] == "purabaya")			{				$dirimgcrop = "assets/img/purabaya/";				$dirimgori = "assets/img/purabaya/temp/";			}			else if($_POST["avatar_path"] == "tirtonadi")			{				$dirimgcrop = "assets/img/tirtonadi/";				$dirimgori = "assets/img/tirtonadi/temp/";			}		}				/*Create object class Crop*/		$this->crop = new CropImg(			isset($_POST['avatar_src']) ? $_POST['avatar_src'] : null,			isset($_POST['avatar_data']) ? $_POST['avatar_data'] : null,			isset($_FILES['file']) ? $_FILES['file'] : null,			$dirimgori,			$dirimgcrop		);				$response = array(		  'state'  => 200,		  'message' => $this->crop->getMsg(),		  'result' => $this->crop->getResult()		);				echo json_encode($response);		//var_dump($_POST['avatar_src'] . '<br /><br />' . $_POST['avatar_data']); die();	}		public function SignOut(){		$this->session->sess_destroy();				redirect(base_url() . "user");	}
}