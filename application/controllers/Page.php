<?php

class Page extends Frontend_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('page_m');
	}

	function padre($padre=0) {
		$pages = ePage::find(['padre' => $padre]);
		var_dump($pages);
	}

	function id($id=null) {

	}
}
