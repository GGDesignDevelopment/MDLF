<?php

class eSocial
{
  function __construct()
  {

  }

  static function getEnabled()
  {
    $ci =& get_instance();
    $social = $ci->social_m->get(['enabled' => 'S'], false);
    return $social;
  }
}
