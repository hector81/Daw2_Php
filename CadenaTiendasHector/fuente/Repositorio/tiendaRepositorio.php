<?php
//include_once __DIR__ . "/../Modelo/articulo.php";
class TiendaRepositorio
{
  public function findTiendaByNombre($nombreCiudad)
  {
    $resultado[]=null;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
      $sql = "SELECT id,nombre,provincia,ciudad,tlfno FROM dbo.tienda WHERE provincia LIKE '$nombreCiudad';";
      foreach ($conexionBD->query($sql) as $row) {
        $resultado[] = $row;
      }
      return $resultado;
  }
}

?>
