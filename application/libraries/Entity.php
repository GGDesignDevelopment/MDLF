<?php

class Entity
{
  static protected $_keys = array();
  static protected $_model = '';
  private $loaded = false;

  function __construct()
  {
    // $this->id = 1;
  }

  static function find($where = null)
  {
    $ci =& get_instance();
    $class = get_called_class();
    $model = $class::$_model;

    $col = $ci->$model->get($where, false);
    $retorno = array();

    foreach($col as $item){
      $new = new $class;
      $new->loaded = true;
      foreach($new as $key => $value) {
        if (!is_array($new->$key) && ($key != 'loaded'))
        {
          $new->$key = $item->$key;
        }
      }

      $retorno[] = $new;
    }

    return $retorno;
  }

  function load($keys=null)
  {
    $ci =& get_instance();
    $class = get_called_class();
    $model = $class::$_model;

    $_entity = $ci->$model->get($keys, TRUE);

    if ($_entity)
    {
      $this->loaded = true;
      foreach($this as $key => $value) {
        if (!is_array($this->$key) && ($key != 'loaded'))
        {
          $this->$key = $_entity->$key;
        }
      }
    }
  }

  function save()
  {
    $ci =& get_instance();
    $class = get_called_class();
    $model = $class::$_model;

    $where = null;
    foreach($this as $key => $value) {
      if (in_array($key,$class::$_keys) && ($value != null) && $this->loaded)
      {
        $where[$key] = $value;
      } elseif (!is_array($this->$key) && ($key != 'loaded')) {
        $data[$key] = $value;
      }
    }
    $ci->$model->save($data, $where);
  }

  function delete()
  {
    if ($this->loaded)
    {
      $ci =& get_instance();
      $class = get_called_class();
      $model = $class::$_model;
      $where = null;
      foreach($class::$_keys as $key) {
        $where[$key] = $this->$key;
      }
      $ci->$model->delete($where);
    }
  }
}
