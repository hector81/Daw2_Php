<?php
  namespace Amowhi\Cms\Repository;
  use Amowhi\Cms\Core\Database;
  use Amowhi\Cms\Model\Articulo;


class ArticuloRepository
{
  private $con = null;
  public function __construct()
  {
    $this->con = (new Database())->getConexion();
  }


  public function findArticuloByNombre($nombre)
  {
    $sql = "SELECT id, nombreCorto, nombre, descripcion, PVP, idFamilia
              FROM articulo
             WHERE nombre LIKE '%' + ? + '%'";

    $cursor = $this->con->prepare($sql, array(\PDO::ATTR_CURSOR=>\PDO::CURSOR_SCROLL));

    $cursor->execute($nombre);

    $articulos = array();
    while ($fil = $cursor->fetch(\PDO::FETCH_ASSOC))
    { $articulos[] = new Articulo($fil);
    }
    return $articulos;
  }

  public function findArticuloById($id)
  { $sql = "SELECT id, nombreCorto, nombre, descripcion, PVP, idFamilia, foto
              FROM articulo
             WHERE id = ?";

      $articulo = array();
      $cursor = $this->con->prepare($sql);

      $cursor->execute($id);
      $cursor->bindColumn(1, $articulo['id'], \PDO::PARAM_INT);
      $cursor->bindColumn(2, $articulo['nombreCorto']);
      $cursor->bindColumn(3, $articulo['nombre']);
      $cursor->bindColumn(4, $articulo['descripcion']);
      $cursor->bindColumn(5, $articulo['PVP']);
      $cursor->bindColumn(6, $articulo['idFamilia']);
      $cursor->bindColumn(7, $articulo['foto'], \PDO::PARAM_LOB, 0, \PDO::SQLSRV_ENCODING_BINARY);
      $cursor->fetch(\PDO::FETCH_BOUND);

      return $articulo;
  }

  public function actualizaFoto($params)
  { $sql = "UPDATE articulo
               SET foto = ?
             WHERE id = ?";
      $cursor = $this->con->prepare($sql);
      $cursor->bindParam(1, $params['foto'], \PDO::PARAM_LOB, 0,
                                           \PDO::SQLSRV_ENCODING_BINARY);
      $cursor->bindParam(2, $params['id']);
      $cursor->execute();
      $actualizada=$cursor->rowCount();

      return $actualizada;

  }

  public function mostrarArticulos(){
    $sql= "SELECT id, nombre, descripcion, foto, PVP FROM articulo";
    $cursor = $this->con->prepare($sql);
    $cursor->execute();
    $articulo = $cursor->fetchAll();

    return $articulo;
  }

  public function mostrarArticulosInicio(){
    $sql= "SELECT id, nombre, descripcion, foto, PVP, SUM(almacen.stock) as stock
    FROM (articulo
      INNER JOIN almacen ON articulo.id = almacen.idArticulo)
      GROUP BY id,nombre,descripcion, foto, PVP";
    $cursor = $this->con->prepare($sql);
    $cursor->execute();
    $articulo = $cursor->fetchAll();

    return $articulo;

  }

  public function articulosPorFamilias($idFamilia)
  {
    $sql="SELECT id, nombre, descripcion, foto, PVP, SUM(almacen.stock) as stock
    FROM (articulo
      INNER JOIN almacen ON articulo.id = almacen.idArticulo)
      WHERE articulo.idFamilia= :idFamilia
      GROUP BY id,nombre,descripcion, foto, PVP";
    $cursor = $this->con->prepare($sql);
    $cursor->bindValue(':idFamilia',$idFamilia);
    $cursor->execute();
    $articulo = $cursor->fetchAll();

    return $articulo;

  }


}
