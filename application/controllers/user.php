<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include("general.php");
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
		else{
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