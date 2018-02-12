<?php

class CompraRepositorio
{
  //para ver carrito
  public function verCarrito($nombreCliente)
  {
    $resultado[]=null;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $sql = "SELECT idCompra, idArt, cantidad, fechaCompra, usuario, idTienda
                          FROM dbo.compra WHERE usuario LIKE '$nombreCliente';";
        $stmt = $conexionBD->query( $sql );
        $contador=0;
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
           $idCompra = $row['idCompra'];
           $idArt = $row['idArt'];
           $cantidad = $row['cantidad'];
           $fechaCompra = $row['fechaCompra'];
           $usuario = $row['usuario'];
           $idTienda = $row['idTienda'];
           //crear compra
           require_once __DIR__ . '/../Modelo/compra.php';
           $compra = new Compra($idCompra,$idArt,$cantidad,$fechaCompra,$usuario,$idTienda);
           $resultado[$contador] = $compra ;
           $contador++;
        }
        /* Consignar los cambios */
        $conexionBD->commit();
      }catch(PDOException  $e ){
        echo "Error: ".$e;
        /* Reconocer el error y revertir los cambios */
        $conexionBD->rollBack();
      }finally {
      	if($stmt !=null){
          $stmt =null;
        }
        if($conexionBD !=null){
          $conexionBD !=null;
        }
      }
      return $resultado;
  }


  public function borrarCompraCarritoId($idCompra)
  {
    $resultado = true;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $sql = "DELETE FROM dbo.compra WHERE idCompra LIKE $idCompra;";
        $stmt = $conexionBD->query( $sql );
        $stmt->execute();
        /* Consignar los cambios */
        $conexionBD->commit();
    }catch(PDOException  $e ){
        echo "Error: ".$e;
        /* Reconocer el error y revertir los cambios */
        $conexionBD->rollBack();
    }finally {
      if($stmt !=null){
        $stmt =null;
      }
      if($conexionBD !=null){
        $conexionBD !=null;
      }
    }
    return $resultado;
  }

  public function comprobarCompraExiste($idCompra){
    $resultado = false;
    $idComprobar= '';
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    $stmt = null;
    try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $sql = "SELECT idCompra FROM dbo.compra WHERE idCompra LIKE $idCompra;";
        $stmt = $conexionBD->query($sql);
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
          $idComprobar = $row['idCompra'];
        }
        //si hay algun resultado
        if ($idComprobar=='') {
          $resultado = false;
        }else{
          //si no hay resultados
          $resultado = true;
        }
        /* Consignar los cambios */
          $conexionBD->commit();
    }catch(PDOException  $e ){
      echo "Error: ".$e;
      /* Reconocer el error y revertir los cambios */
      $conexionBD->rollBack();
    }finally {
    	if($stmt !=null){
        $stmt =null;
      }
      if($conexionBD !=null){
        $conexionBD !=null;
      }
    }
    return $resultado;
  }

  //para ver carrito
  public function sumarCarrito($nombreCliente)
  {
    $total =0;
    $resultado = '';
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    $stmt = null;
    try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $sql = "SELECT SUM(compra.cantidad * articulo.pvp) AS total from dbo.compra JOIN dbo.articulo ON
        articulo.id = compra.idArt and usuario like '$nombreCliente'
        ";

        $stmt = $conexionBD->query( $sql );
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
           $total = $row['total'];
        }
        /* Consignar los cambios */
        $conexionBD->commit();
      }catch(PDOException  $e ){
        echo "Error: ".$e;
        /* Reconocer el error y revertir los cambios */
        $conexionBD->rollBack();
      }finally {
      	if($stmt !=null){
          $stmt =null;
        }
        if($conexionBD !=null){
          $conexionBD !=null;
        }
      }

      $resultado = strval($total);

      return $resultado;
  }

}
?>
