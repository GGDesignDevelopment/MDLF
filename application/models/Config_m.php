<?php
class Config_M extends MY_Model {

	protected $_table_name = 'config';
	protected $_order_by = '';

	function __construct() {
		parent::__construct();
	}

	// function new_config() {
	// 	$conf = new stdClass();
	// 	$conf->id = 0;
	// 	$conf->linkFacebook = '';
	// 	$conf->linkTwitter = '';
	// 	$conf->linkInstagram = '';
	// 	$conf->linkFlickr = '';
	// 	$conf->tituloSobreMi = '';
	// 	$conf->textoSobreMi = '';
	// 	$conf->tituloMiTrabajo = '';
	// 	$conf->textoMiTrabajo = '';
	// 	$conf->imagenSobreMi = '';
	// 	$conf->imagenMiTrabajo = '';
	// 	return $conf;
	// }
}
