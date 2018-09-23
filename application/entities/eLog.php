<?php

class eLog extends Entity
{
  static protected $_keys = ['id'];
  static protected $_model = 'log_m';
  protected $id;
  public $mensaje;

  function __construct()
  {
    // $this->id = 1;
  }
}
