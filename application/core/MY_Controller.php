<?php

class MY_Controller extends CI_Controller {

	public $data = array();
	public $directories = array(
			'images' => 'img/',
	);
	public $errors = array();

	function __construct() {
		parent::__construct();
		$this->data['scripts'] = array();
		$this->data['styles'] = array();
	}
}
