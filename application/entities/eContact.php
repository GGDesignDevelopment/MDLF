<?php

class eContact
{
  protected $id;
  protected $estado;
  protected $creado;
  public $nombre;
  public $email;
  public $celular;
  public $texto;

  function __construct()
  {
    $this->estado = 0;
    $this->creado = date('y-m-d H:i:s');
  }

  function save()
  {
    foreach($this as $key => $value) {
      if (!is_array($this->$key)) {
        $data[$key] = $value;
      }
    }

    $ci =& get_instance();
    $ci->contacto_m->save($data, NULL);
  }
}
