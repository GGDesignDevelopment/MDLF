<?php

class eContact extends Entity
{
  static protected $_keys = ['id'];
  static protected $_model = 'contacto_m';
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
}
