<?php

class ePage extends Entity
{
  static protected $_keys = ['id'];
  static protected $_model = 'page_m';
  public $id;
  public $descripcion;
  public $titulo;
  public $texto;
  public $portada;

  // protected $imagenes;
  // protected $hijos;

  function __construct() {
    parent::__construct();
  }

  // static function getChildrens($parent=0) {
  //   $ci =& get_instance();
  //   $childrens = $ci->page_m->get(['padre' => $parent], FALSE);
  //   return $childrens;
  // }

  // function getAll()
  // {
  //   $coleccion = array();
  //   $pages = $this->page_m->get_hijos(0);
  //   foreach ($pages as $page) {
  //     $newpage = new page($this->caller);
  //     $newpage = $page;
  //
  //     $coleccion[] = $newpage;
  //   }
  //
  //   return $coleccion;
  // }
}
