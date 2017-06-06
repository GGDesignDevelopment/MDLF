<?php
class Admin_Controller extends MY_Controller {
	function __construct() {
		parent::__construct();

		$this->load->library('session');
		$this->load->helper('form');
		$excepcion_uri = array('admin/user/login','admin/user/logout');
		//$this->data['myScript'] = array();
		if ((in_array(uri_string(), $excepcion_uri) == FALSE) ){ //&& (ENVIRONMENT == 'production'))  {
			if (eUser::loggedin() == FALSE) {
				redirect('admin/user/login');
			}
		}
	}
}
