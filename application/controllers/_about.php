<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("general.php");

class About extends CI_Controller {
	
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

		$this->data["currpage"] = "about";

		$this->data["ourprofiletitle"]["en"] = 'Our Profile';
		$this->data["ourprofiletitle"]["id"] = 'Profil Kami';

		$this->data["ourprofilebody"]["en"] = '<strong class="text-info">PT Horecaba Jaya Makmur (HJM)</strong> is a distribution company established and began operation in Jakarta since 2014. HJM distributes <strong class="text-info">foods & beverages</strong> like <strong class="text-info">dry & frozen foods</strong> to <strong class="text-info">hotels, restaurant, café, catering, and home industry</strong>. Now, HJM work very closely with its business partners in <strong class="text-info">Malaysia, Italy, and South Africa</strong> to supply high quality foods & beverages products to its customers in Indonesia.';
		$this->data["ourprofilebody"]["id"] = '<strong class="text-info">PT Horecaba Jaya Makmur (HJM)</strong> merupakan perusahaan distributor yang berdiri dan beroperasi di Jakarta sejak 2014. HJM mendistribusikan <strong class="text-info">foods & beverages</strong> seperti <strong class="text-info">dry & frozen foods</strong> ke berbagai industri makanan seperti <strong class="text-info">hotel, resto, kafe, ketering, dan industri rumahan</strong>. Sekarang, HJM bekerja sama dengan partner bisnisnya di <strong class="text-info">Malaysia, Italy, dan South Africa</strong> untuk mensuplai foods & beverages yang berkualitas tinggi bagi semua pelanggannya di Indonesia.';

		$this->data["ourvisiontitle"]["en"] = 'Our Vision';
		$this->data["ourvisiontitle"]["id"] = 'Visi Kami';

		$this->data["ourvisionbody"]["en"] = '<strong class="text-info">To be the best distributor company</strong> of foods and beverages in Indonesia in terms of <strong class="text-info">quality and service</strong>.';
		$this->data["ourvisionbody"]["id"] = '<strong class="text-info">Menjadi perusahaan distributor foods & beverages terbaik</strong> di Indonesia dalam hal <strong class="text-info">kualitas dan pelayanan</strong>.';

		$this->data["ourmissiontitle"]["en"] = 'Our Mission';
		$this->data["ourmissiontitle"]["id"] = 'Misi Kami';

		$this->data["ourmissionbody"]["en"] = 'We are <strong class="text-info">committed to enhance the healthy quality of lives of our customers</strong> and also <strong class="text-info">provide services in a timely and appropriately</strong>.';
		$this->data["ourmissionbody"]["id"] = 'Kami <strong class="text-info">berkomitmen untuk meningkatkan kualitas hidup sehat pelanggan </strong> dan juga <strong class="text-info">memberikan pelayanan tepat waktu dan tepat guna</strong>.';

		$this->data["ourpartnertitle"]["en"] = 'Our Partners';
		$this->data["ourpartnertitle"]["id"] = 'Partner Kami';
		
		$this->template->parse_view('tpl_header', 'template/header', $this->data);
		$this->template->parse_view('tpl_footer', 'template/footer', $this->data);
		$this->template->parse_view('tpl_main', 'about', $this->data);
		$this->template->render();
	}
}