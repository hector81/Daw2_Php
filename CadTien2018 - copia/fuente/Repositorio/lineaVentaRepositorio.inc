<?php

class LineaVentaRepositorio {

  public function insertarLineaVenta(int $idVenta,array $carrito) :bool{
      $idArticulo = 0;
      $cantidad = 0;
      $pc = 0;
      $sql ="INSERT INTO lineaVenta(idVenta,idArticulo,cantidad,pc) VALUES(?,?,?,?);";
      $respuesta = false;
      include_once __DIR__ . '/../../core/conexionBd.inc';
      foreach ($carrito as $key => $value) {
          $idArticulo = $value->getIdArticulo();
          $cantidad = $value->getCantidad();
          $pc = $value->getPReserva();
          try{
              $con = (new conexionBd)->getConexion();
              $con->beginTransaction();
              $stmt = $con->prepare($sql);
              $stmt->bindParam(1,$idVenta,PDO::PARAM_INT);
              $stmt->bindParam(2,$idArticulo,PDO::PARAM_INT);
              $stmt->bindParam(3,$cantidad,PDO::PARAM_INT);
              $stmt->bindParam(4,$pc,PDO::PARAM_INT);
              if($stmt->execute()){
                $respuesta = true;
              }
              $con->commit();
              return $respuesta;
          }catch(PDOException $ex){
             throw $ex;
             $con->rollBack();
          }finally{
            $con = null;
            $stmt = null;
          }
      }//fin del foreach

  }//fin metodo

  public function verMisCompras(string $nombreUsuario) :array{
      $vistaCompra = [];$compra= [];
      $sql ="SELECT lineaVenta.idVenta AS NUMERO_VENTA,
          (SELECT articulo.nombre FROM articulo WHERE articulo.id = lineaVenta.idArticulo) as NOMBRE_ARTICULO
          , lineaVenta.cantidad AS CANTIDAD_ARTICULO
          , lineaVenta.pc AS PRECIO_ARTICULO,
          venta.envio AS ESTADO_PEDIDO,
          venta.fVenta AS FECHA_PEDIDO,
          venta.total AS TOTAL_PEDIDO
           FROM lineaVenta
           INNER JOIN venta ON venta.idVenta = lineaVenta.idVenta
           WHERE venta.idUsuario = ?;";
      include_once __DIR__ . '/../../core/conexionBd.inc';
          try{
              $con = (new conexionBd)->getConexion();
              $con->beginTransaction();
              $stmt = $con->prepare($sql);
              $stmt->bindParam(1,$nombreUsuario,PDO::PARAM_STR);
              if($stmt->execute()){
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $compra[] =[
                        "NUMERO VENTA" => $row['NUMERO_VENTA'],
                        "NOMBRE ARTICULO" => $row['NOMBRE_ARTICULO'],
                        "CANTIDAD ARTICULO" => $row['CANTIDAD_ARTICULO'],
                        "PRECIO ARTICULO" => $row['PRECIO_ARTICULO'],
                        "ESTADO PEDIDO" => $row['ESTADO_PEDIDO'],
                        "FECHA PEDIDO" => $row['FECHA_PEDIDO'],
                        "TOTAL PEDIDO" => $row['TOTAL_PEDIDO']
                    ];
                    $vistaCompra[] = $compra;
                }
              }
              $con->commit();
              return $vistaCompra;
          }catch(PDOException $ex){
             throw $ex;
             $con->rollBack();
          }finally{
            $con = null;
            $stmt = null;
          }

  }//fin metodo


}//fin clase


 ?>
