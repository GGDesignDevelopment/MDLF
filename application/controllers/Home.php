<?php

class Home extends Frontend_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('page_m');
		$this->load->model('config_m');
		$this->load->model('social_m');
		$this->load->model('contacto_m');
	}

	function index() {
		// Home Page
		$this->data['title'] = "Mariana de la Fuente";
		$this->data['pages'] = ePage::find(['padre' => 0]);
		$this->data['config'] = new eConfig();
		$this->data['config']->load();
		$this->data['social'] = eSocial::find(['enabled' => 'S']);
		$this->load->view('frontend/home',$this->data);
	}

	function contact() {
		// [POST] - Contact Form
		$contact = new eContact();
		$contact->nombre = $this->input->post('nombre');
		$contact->email = $this->input->post('email');
		$contact->celular = $this->input->post('celular');
		$contact->texto = $this->input ->post('texto');
		$contact->save();
	}
}
