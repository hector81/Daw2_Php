<?php
class AlmacenRepositorio
{
  public function comprobarStockExistencias($idTienda,$id)
  {
    $confirmacion =false;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    //PARA COMPROBAR EL STOCK
    $stock= 0;
    try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $sql = "SELECT stock FROM dbo.almacen WHERE
                          idTienda LIKE '$idTienda' AND idArticulo LIKE '$id';";
        $stmt = $conexionBD->query( $sql );
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
          $stock = $row['stock'];
        }
        if($stock < 1){
            $confirmacion =false;
        }elseif($stock > 0){
            $confirmacion =true;
        }
        /* Consignar los cambios */
        $conexionBD->commit();
    }catch(PDOException  $e ){
        echo "Error: ".$e;
    }finally {
        if($stmt !=null){
          $stmt =null;
        }
        if($conexionBD !=null){
          $conexionBD !=null;
        }
      }
    return $confirmacion;
  }

  public function quitarCantidadAlmacen($cantidad,$idTienda,$id){
    //QUITAMOS DEL STOCK UNA CANTIDAD 1
    $confirmacion =false;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    try{
      /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $sql = "UPDATE almacen SET stock = stock - ($cantidad/2)
                      WHERE idTienda LIKE '$idTienda' AND idArticulo LIKE '$id';";
        $stmt = $conexionBD->query( $sql );
        $stmt->execute();

        $confirmacion = true;
        /* Consignar los cambios */
        $conexionBD->commit();
    }catch(PDOException  $e ){
        echo "Error: ".$e;
    }finally {
        if($stmt !=null){
          $stmt =null;
        }
        if($conexionBD !=null){
          $conexionBD !=null;
        }
      }
    return $confirmacion;
  }

  public function mostrarExistencias($ID,$nombreProducto){
      $productoExistencia[]=null;
      require_once __DIR__ . '/../../core/conexionBd.php';
      $conexionBD = (new ConexionBd())->getConexion();
      try {
        $contador= 0;
        $sql = "SELECT articulo.nombre AS nombreArticulo,tienda.nombre AS nombreTienda, tienda.ciudad AS nombreCiudad,
        tienda.provincia AS nombreProvincia, sum(almacen.stock) AS stock
                FROM dbo.tienda
				JOIN dbo.articulo ON articulo.id = tienda.id
                AND articulo.nombre LIKE '$nombreProducto'
                and articulo.id like $ID
				JOIN dbo.almacen ON almacen.idTienda = tienda.id
                GROUP BY articulo.nombre,tienda.nombre, tienda.ciudad, tienda.provincia
                ORDER BY tienda.ciudad ASC";
        $stmt = $conexionBD->query( $sql );
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
          $nombreProducto = $row['nombreArticulo'];
          $nombreTienda = $row['nombreTienda'];
          $nombreCiudad = $row['nombreCiudad'];
          $nombreProvincia = $row['nombreProvincia'];
          $stock = $row['stock'];
          //crear existencia objeto
          require_once __DIR__ . '/../Modelo/existencias.php';
          $existencia = new Existencias($nombreProducto,$nombreTienda,$nombreCiudad,$nombreProvincia,$stock);
          $productoExistencia[$contador] = $existencia;
          $contador++;
        }
      }
      catch (Exception $e) {
        $conexionBD->rollBack();
        echo "Error: ".$e;
      }
      return $productoExistencia;
  }

}

?>
