<?php

class Test extends Entity
{
  static protected $_keys = ['id'];
  protected $id;
  public $descripcion;

  function __construct()
  {
    parent::__construct();
  }

  static function get()
  {
    $ci =& get_instance();
    $config = $ci->config_m->get(null, TRUE);
    return $config;
  }

  function save()
  {
    $where = null;
    foreach($this as $key => $value) {
      if (in_array($key,eConfig::$keys) && ($value != null))
      {
        $where[$key] = $value;
      } elseif (!is_array($this->$key)) {
        $data[$key] = $value;
      }
    }

    $ci =& get_instance();
    $ci->config_m->save($data, $where);
  }
}
