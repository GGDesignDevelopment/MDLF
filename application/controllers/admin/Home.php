<?php

class Home extends Admin_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('page_m');
		$this->load->model('config_m');
		$this->load->model('social_m');
	}

	function index() {
		// Home Page Admin
		$this->data['pages'] = ePage::getChildrens();
		$this->data['config'] = new eConfig();
		$this->data['config']->load();
		$this->data['social'] = eSocial::getEnabled();
		$this->load->view('admin/home',$this->data);
	}

	function saveConfig()
	{
		$config = new eConfig();
		$config->load();

		if (!empty($_FILES['imagenSobreMi']) && $_FILES['imagenSobreMi']['name'] != '') {
			$actual = $config->imagenSobreMi;
			$ext = explode('.', basename($_FILES['imagenSobreMi']['name']));
			$name = md5(uniqid()) . "." . array_pop($ext);
			if (move_uploaded_file($_FILES['imagenSobreMi']['tmp_name'], $data['photosDirectory'] . $name)) {
					$config->imagenSobreMi = $name;
					if ($actual != '') {
							unlink($data['photosDirectory'] . $actual);
					}
			}
		}

		if (!empty($_FILES['imagenMiTrabajo']) && $_FILES['imagenMiTrabajo']['name'] != '') {
			$actual = $config->imagenMiTrabajo;
			$ext = explode('.', basename($_FILES['imagenMiTrabajo']['name']));
			$name = md5(uniqid()) . "." . array_pop($ext);
			if (move_uploaded_file($_FILES['imagenMiTrabajo']['tmp_name'], $data['photosDirectory'] . $name)) {
					$config->imagenMiTrabajo = $name;
					if ($actual != '') {
							unlink($data['photosDirectory'] . $actual);
					}
			}
		}

		$config->tituloSobreMi = $this->input->post('tituloSobreMi');
		$config->textoSobreMi = $this->input->post('textoSobreMi');
		$config->tituloMiTrabajo = $this->input->post('tituloMiTrabajo');
		$config->textoMiTrabajo = $this->input->post('textoMiTrabajo');
		$config->save();
	}
}
