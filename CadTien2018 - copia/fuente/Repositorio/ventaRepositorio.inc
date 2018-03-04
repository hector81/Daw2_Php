<?php

class ventaRepositorio {


  //para insertar la venta
  public function insertarVenta(string $userNombre, float $precioTotal) :bool{
    //idVenta INT , idUsuario NVARCHAR(20) ,fVenta DATETIME2(7),total MONEY,envio NCHAR(20) DEFAULT('RECOGER') ,--DOMICILIOFACTURA --OTRODOMICILIO
        $envio = 'CONFIRMADO';
        $fecha = date('Y-m-d');
        $sql = "INSERT INTO Venta(idUsuario,fVenta,total,envio) VALUES(?,?,?,?);";
        $respuesta = false;
        include_once __DIR__ . '/../../core/conexionBd.inc';
        try{
            $con = (new conexionBd)->getConexion();
            $con->beginTransaction();
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1,$userNombre,PDO::PARAM_STR);
            $stmt->bindParam(2,$fecha,PDO::PARAM_STR);
            $stmt->bindParam(3,$precioTotal,PDO::PARAM_INT);
            $stmt->bindParam(4,$envio,PDO::PARAM_INT);
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
  }//fin metodo


  public function sacarIdVenta(string $userNombre) :int{
    $sql = "SELECT idVenta FROM Venta WHERE idUsuario = ?;";
    $idVenta = 0;
    include_once __DIR__ . '/../../core/conexionBd.inc';
    try{
        $con = (new conexionBd)->getConexion();
        $con->beginTransaction();
        $stmt = $con->prepare($sql);
        $stmt->bindParam(1,$userNombre,PDO::PARAM_STR);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $idVenta = $row['idVenta'];
        }

        $con->commit();
        return $idVenta;
    }catch(PDOException $ex){
       throw $ex;
       $con->rollBack();
    }finally{
      $con = null;
      $stmt = null;
    }
  }//fin metodo


}//finc lcase

 ?>
