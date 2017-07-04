<?php
class Social_M extends MY_Model {

	protected $_table_name = 'socialnetwork';
	protected $_order_by = '';

	function __construct() {
		parent::__construct();
	}


	function _new() {
		$sn = new stdClass();
		$sn->name = '';
		$sn->icon = '';
		$sn->url = '';
		$sn->enabled = '';
		return $sn;
	}
}
