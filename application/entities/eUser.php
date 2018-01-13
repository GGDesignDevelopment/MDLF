<?php
/**
 *
 */
class eUser
{
  function __construct()
  {

  }

  static function loggedin() {
    $ci =& get_instance();
		return (bool) $ci->session->userdata('loggedin');
	}

  static function login($user, $password) {
    $ci =& get_instance();
		$user = $ci->user_m->get(['email' => $user,'password' => hash_512($password)],TRUE);

		if (count($user)) {
			$data = array(
				'nombre' => $user->nombre,
				'email' => $user->email,
				'id' => $user->id,
				'loggedin' => TRUE,
			);
			$ci->session->set_userdata($data);
      return true;
		} else {
      return false;
    }
	}

	static function logout() {
        $ci =& get_instance();
		$ci->session->sess_destroy();
	}
}
