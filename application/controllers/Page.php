<?php

class Page extends Frontend_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('page_m');
		$this->load->model('page_images_m');
	}

	function id($id=null) {
		$this->data['title'] = "Mariana de la Fuente";
		$this->data['page'] = new ePage();
		$this->data['page']->load(['id' => $id]);
		$this->data['folders'] = ePage::find(['padre' => $id]);
		$this->data['photos'] = ePagePhoto::find(['id' => $id], 'order');
		$this->load->view('frontend/page',$this->data);
	}
}
