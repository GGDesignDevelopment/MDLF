<?php

class eSocial extends Entity
{
  static protected $_keys = ['id'];
  static protected $_model = 'social_m';
  public $id;
  public $name;
  public $icon;
  public $url;
  public $enabled;

  function __construct()
  {

  }

  // static function getEnabled()
  // {
  //   $ci =& get_instance();
  //   $social = $ci->social_m->get(['enabled' => 'S'], false);
  //   return $social;
  // }
}
