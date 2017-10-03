<?php
class ArticuloRepositorio
{
  public function findArticuloByNombre($nombre)
  {
    $sql = "SELECT id, nombreCorto, nombre, descripcion, PVP, idFamilia
              FROM articulo
             WHERE nombre LIKE '%' + ? + '%'";
    include __DIR__ . '/../../core/conexionBd.php';
    $con = (new ConexionBd())->getConexion();

    $cursor = $con->prepare($sql, array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));

    $cursor->execute($nombre);

    $articulos = array();
    while ($fil = $cursor->fetch(PDO::FETCH_ASSOC))
    { $articulos[] = $fil;
    }
    return $articulos;

  }

  public function findArticuloById($id)
  { $sql = "SELECT id, nombreCorto, nombre, descripcion, PVP, idFamilia, foto
              FROM articulo
             WHERE id = ?";
      include __DIR__ . '/../../core/conexionBd.php';
      $con = (new ConexionBd())->getConexion();

      $articulo = array();
      $cursor = $con->prepare($sql);

      $cursor->execute($id);
      $cursor->bindColumn(1, $articulo['id'], PDO::PARAM_INT);
      $cursor->bindColumn(2, $articulo['nombreCorto']);
      $cursor->bindColumn(3, $articulo['nombre']);
      $cursor->bindColumn(4, $articulo['descripcion']);
      $cursor->bindColumn(5, $articulo['PVP']);
      $cursor->bindColumn(6, $articulo['idFamilia']);
      $cursor->bindColumn(7, $articulo['foto'], PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
      $cursor->fetch(PDO::FETCH_BOUND);

      return $articulo;
  }

  public function actualizaFoto($params)
  { $sql = "UPDATE articulo
               SET foto = ?
             WHERE id = ?";
      include __DIR__ . '/../../core/conexionBd.php';
      $con = (new ConexionBd())->getConexion();
      $subeFoto = $con->prepare($sql);
      $subeFoto->bindParam(1, $params['foto'], PDO::PARAM_LOB, 0,
                                           PDO::SQLSRV_ENCODING_BINARY);
      $subeFoto->bindParam(2, $params['id']);
      $subeFoto->execute();

  }
}
