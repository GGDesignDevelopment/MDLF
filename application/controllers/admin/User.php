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
		$this->user_m->logout();
		redirect('admin/user/login');
	}

	// ***** Sin Uso *****
	// function index() {
	// 	$this->data['users'] = $this->user_m->get();
	// 	$this->data['subview'] = 'admin/user/index';
	// 	$this->load->view('admin/_layout_main',$this->data);
	// 	//User::loggedin() == FALSE || redirect("admin/home");
	// }
	// function edit($id = NULL) {
	// 	if ($id) {
	// 		$this->data['user'] = $this->user_m->get($id);
	// 		count($this->data['user']) || $this->data['errores'][] = 'Usuario no encontrado';
	// 	} else {
	// 		$this->data['user'] = $this->user_m->new_user();
	// 	}
	// 	$rules = $this->user_m->rules_admin;
	// 	$id || $rules['password']['rules'] .= '|required';
	// 	$this->form_validation->set_rules($rules);
	// 	if ($this->form_validation->run() == TRUE) {
	// 		$data = $this->user_m->array_from_post(array('nombre','email','password'));
	// 		$data['password'] = $this->user_m->hash($data['password']);
	// 		$this->user_m->save($data, $id);
	// 		redirect('admin/user');
	// 	}
	//
	// 	$this->data['subview'] = 'admin/user/edit';
	// 	$this->load->view('admin/_layout_main',$this->data);
	// }
	// function delete($id) {
	// 	$this->user_m->delete($id);
	// 	redirect('admin/user');
	// }
	//
	//
	// function _unique_email ($str) {
	// 	$id = $this->uri->segment(4);
	// 	$this->db->where('email',$this->input->post('email'));
	// 	!$id || $this->db->where('id !=', $id);
	// 	$user = $this->user_m->get();
	//
	// 	if (count($user)) {
	// 		$this->form_validation->set_message('_unique_email', '%s debe ser unico');
	// 		return FALSE;
	// 	}
	//
	// 	return TRUE;
	// }
}
