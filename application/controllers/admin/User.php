<?php
class User extends Admin_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('user_m');
	}

	// Principales
	function login() {
		$home = 'admin/home';
		if ($this->input->method()==='get') {
			eUser::loggedin() == FALSE || redirect($home);
			$this->load->view('admin/user/login', $this->data);
		} else {
				$user = $this->input->post('email');
				$password = $this->input->post('password');

				if (eUser::login($user, $password) == TRUE) {
					redirect($home);
				} else {
					$this->session->set_flashdata('error','Usuario y/o Password incorrectos');
					redirect('admin/user/login','refresh');
				}
		}
	}

	function logout() {
		eUser::logout();
		redirect('admin/user/login');
	}
}
