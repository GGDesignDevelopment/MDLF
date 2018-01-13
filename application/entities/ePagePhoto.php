<?php

class ePagePhoto extends Entity
{
  static protected $_keys = ['id', 'secuencia'];
  static protected $_model = 'page_images_m';
  protected $id;
  protected $secuencial;
  public $foto;

  function __construct()
  {
    // $this->id = 1;
  }

  // static function get()
  // {
  //   $ci =& get_instance();
  //   $config = $ci->config_m->get(null, TRUE);
  //   return $config;
  // }

  // function load()
  // {
  //   $ci =& get_instance();
  //   $config = $ci->config_m->get(['id'=>1], TRUE);
  //
  //   if ($config)
  //   {
  //     foreach($this as $key => $value) {
  //       if (!is_array($this->$key))
  //       {
  //         $this->$key = $config->$key;
  //       }
  //     }
  //   }
  // }

  // function save()
  // {
  //   $where = null;
  //   foreach($this as $key => $value) {
  //     if (in_array($key,eConfig::$keys) && ($value != null))
  //     {
  //       $where[$key] = $value;
  //     } elseif (!is_array($this->$key)) {
  //       $data[$key] = $value;
  //     }
  //   }
  //
  //   $ci =& get_instance();
  //   $ci->config_m->save($data, $where);
  // }
}
