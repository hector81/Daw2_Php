<?php
  namespace Amowhi\Cms\Repository;

  use Amowhi\Cms\Core\Database;
  use Amowhi\Cms\Model\Tienda;

class TiendaRepository
{
  private $con = null;
  public function __construct(){
    $this->con = (new Database())->getConexion();
  }

  //Devuelve la info de la tienda
  public function getInfoTienda($idT)
  {
    $in = join(',', array_fill(0, count($idT), '?'));// ?,?,?,
    $sql="SELECT * FROM tienda WHERE id IN (".$in.")" ;
    $cursor = $this->con->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
    $cursor->execute((array)$idT);

    $infoTiendas = array();
    while ($fil = $cursor->fetch(\PDO::FETCH_ASSOC))
    { $infoTiendas[] = $fil;
    }

    return $infoTiendas;

  }

  //Devuelve la info de todas las tiendas
  public function getAllTiendas()
  {
    $sql="SELECT * FROM tienda" ;
    $cursor = $this->con->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL));
    $cursor->execute();

    $infoTiendas = array();
    while ($fil = $cursor->fetch(\PDO::FETCH_ASSOC))
    { $infoTiendas[] = $fil;
    }
    return $infoTiendas;
  }

}
