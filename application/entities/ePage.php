<?php

/**
 *
 */
class ePage
{
  protected $id;
  protected $descripcion;
  protected $titulo;
  protected $texto;
  protected $base64;

  // protected $imagenes;
  // protected $hijos;

  function __construct() {
  }

  static function getChildrens($parent=0) {
    $ci =& get_instance();
    $childrens = $ci->page_m->get(['padre' => $parent], FALSE);
    return $childrens;
  }

  function getAll()
  {
    $coleccion = array();
    $pages = $this->page_m->get_hijos(0);
    foreach ($pages as $page) {
      $newpage = new page($this->caller);
      $newpage = $page;

      $coleccion[] = $newpage;
    }

    return $coleccion;
  }
}
