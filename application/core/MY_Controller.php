<?php

class MY_Controller extends CI_Controller {

	public $data = array();

	public $errors = array();

	function __construct() {
		parent::__construct();
		date_default_timezone_set("America/Montevideo");
		$this->data['scripts'] = array();
		$this->data['styles'] = array();
		$this->data['photosDirectory'] = site_url('photos') . '/';
	}
}
