<?php

/**
 *
 */
class Page
{
  protected $id;
  protected $descripcion;
  protected $titulo;
  protected $texto;
  protected $base64;
  protected $imagenes;
  protected $hijos;

  function __construct($caller)
  {
    $this->caller =& get_instance();
    $this->id = 321;
    $this->caller->load->model('page_m');
    var_dump($this->caller->page_m->get_hijos(0));

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
