<?php

class eConfig
{
  function __construct()
  {

  }

  static function get()
  {
    $ci =& get_instance();
    $config = $ci->config_m->get(null, TRUE);
    return $config;
  }
}
