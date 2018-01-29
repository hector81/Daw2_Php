<?php
class ArticuloRepositorio{
  public function findArticuloByNombre($nombre){
    $sql = "SELECT id, nombreCorto, nombre, descripcion, PVP, idFamilia, stock
              FROM articulo
             WHERE nombre LIKE '%' + ? + '%'";

    include_once __DIR__ . '/../../core/conexionBd.php';
    $con = (new ConexionBd())->getConexion();

    $cursor = $con->prepare($sql, array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
    $cursor->execute($nombre);

    $articulos = array();
    while ($fil = $cursor->fetch(PDO::FETCH_ASSOC)){
      $articulos[] = new Articulo($fil);
    }
    return $articulos;
  }

  public function findArticuloById($id){
    $sql = "SELECT id, nombreCorto, nombre, descripcion, PVP, idFamilia, stock
              FROM articulo
             WHERE id = ?";

      include_once __DIR__ . '/../../core/conexionBd.php';
      $con = (new ConexionBd())->getConexion();

      $cursor = $con->prepare($sql);
      $cursor->execute($id);

      $articulo= new Articulo($cursor->fetch(PDO::FETCH_ASSOC));
      return $articulo;
  }

  public function findFotoById($id){
    $sql = "SELECT foto
              FROM articulo
             WHERE id ?";

    include_once __DIR__ . '/../../core/conexionBd.php';
    $con = (new ConexionBd())->getConexion();
    $cursor = $con->prepare($sql);

    $cursor->execute($id);
    $cursor->bindColumn(1, $foto, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
    $cursor->fetch(PDO::FETCH_BOUND);
    echo $foto;
  }

  public function findArtByCat($id){
    $sql = "SELECT id, nombreCorto, nombre, descripcion, PVP, idFamilia, stock
              FROM articulo
              WHERE idFamilia = ?";
    include_once __DIR__ . '/../../core/conexionBd.php';
    $con = (new ConexionBd())->getConexion();
    $cursor = $con->prepare($sql);
    $cursor->execute($id);

    $articulos = array();
    while ($fila = $cursor->fetch(PDO::FETCH_ASSOC)){
      $articulos[] = new Articulo($fila);
    }
    return $articulos;

  }

  public function actualizaFoto($params){
    $sql = "UPDATE articulo
               SET foto = ?
             WHERE id = ?";

      include_once __DIR__ . '/../../core/conexionBd.php';
      $con = (new ConexionBd())->getConexion();

      $subeFoto = $con->prepare($sql);
      $subeFoto->bindParam(1, $params['foto'], PDO::PARAM_LOB, 0,
                                           PDO::SQLSRV_ENCODING_BINARY);
      $subeFoto->bindParam(2, $params['id']);
      $subeFoto->execute();
  }
}
