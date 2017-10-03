<?php
  namespace Amowhi\Cms\Repository;
  use Amowhi\Cms\Core\Database;


class CarritoRepository
{
  private $con = null;
  public function __construct(){
    $this->con = (new Database())->getConexion();
  }

  //Devuelve la información que se muestra en la vista carrito.
  public function infoCarrito($ids)
  {
    if(empty($ids)){
      return array();
    }
    $in = join(',', array_fill(0, count($ids), '?'));// ?,?,?,
    $sql = "SELECT id, nombre, PVP
              FROM articulo
             WHERE id IN (".$in.")" ;
    $cursor = $this->con->prepare($sql, array(\PDO::ATTR_CURSOR=>\PDO::CURSOR_SCROLL));
    $cursor->execute((array)$ids);


    $articulosCarrito = array();
    while ($fil = $cursor->fetch(\PDO::FETCH_ASSOC))
    { $articulosCarrito[] = $fil;
    }
    return $articulosCarrito;
  }

}
