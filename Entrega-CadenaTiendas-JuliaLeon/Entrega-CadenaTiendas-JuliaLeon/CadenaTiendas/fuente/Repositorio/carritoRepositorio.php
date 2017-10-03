<?php
  class CarritoRepositorio{
    public function finalizePurchase(){
      $insertPedido = "INSERT INTO pedido (usuario, fCompra, Pv)
                       VALUES(:usu, :fc, :pv)";
      $updateAlmacen = "UPDATE almacen
                        SET stock = stock - :uds
                        WHERE idTienda = :idT AND idArticulo= :idA";
      $insertVenta = "INSERT INTO venta (idPedido, idArticulo, uds)
                      VALUES(:ip, :ia, :uds)";

      require_once __DIR__ . '/../../core/conexionBd.php';

      $con = (new ConexionBd())->getConexion();

      $cursorIP = $con->prepare($insertPedido);
      $cursorUA = $con->prepare($updateAlmacen);
      $cursorIV = $con->prepare($insertVenta);

      $con->beginTransaction();
      try{
        //update almacén
        foreach ($_SESSION['carrito'] as $id => $infoArticulo) {
          $cursorUA->execute([':uds'=>(int)$infoArticulo['uds'],
                              ':idT'=>1,
                              ':idA'=>(int)$id]);
        }
        //insert pedido
        $cursorIP->execute([':usu'=> $_SESSION['usuario'],
                            ':fc'=>date('Y-d-m'),
                            ':pv'=> floatval($_SESSION['total']) ]);
        //insert ventas(articulos del pedido)
        $pedidoId = $con->lastInsertId();
        foreach ($_SESSION['carrito'] as $id => $infoArticulo) {
          $cursorIV->execute([':ip'=>(int)$pedidoId,
                              ':ia'=>(int)$id,
                              ':uds'=>(int)$infoArticulo['uds']]);
        }
        $con->commit();
        return true;
      }catch(Exception $e){
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        $con->rollBack();
        return false;
      }
    }
  }
 ?>
