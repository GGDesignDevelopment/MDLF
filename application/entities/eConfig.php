<?php

class eConfig extends Entity
{
  static protected $_keys = ['id'];
  static protected $_model = 'config_m';
  protected $id;
  public $tituloSobreMi;
  public $textoSobreMi;
  public $tituloMiTrabajo;
  public $textoMiTrabajo;
  public $imagenSobreMi;
  public $imagenMiTrabajo;
  public $imagenPerfil;
  public $telefono;
  public $email;

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
