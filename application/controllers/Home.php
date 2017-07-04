<?php

class Home extends Frontend_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('page_m');
		$this->load->model('config_m');
		$this->load->model('social_m');
	}

	function index() {
		//Home principal de la pagina
		$this->data['pages'] = ePage::getChildrens();
		$this->data['config'] = eConfig::get();
		$this->data['social'] = eSocial::getEnabled();
		$this->load->view('frontend/home',$this->data);
	}

	function contact() {
		// POST formulario de contacto
	}
}
