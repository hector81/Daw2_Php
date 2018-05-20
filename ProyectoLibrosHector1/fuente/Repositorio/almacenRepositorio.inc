<?php

class AlmacenRepositorio
{
  public function comprobarStockExistencias(int $idTienda,int $idEjemplar) :bool{
    $confirmacion =false;
     include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
     $con = (new ConexionBaseDatos)->getConexion();
     $stock= 0;
     try{
         /* Iniciar una transacción, desactivando 'autocommit' */
         $con->beginTransaction();
         $sql = "SELECT stock FROM dbo.almacen WHERE
                           idTienda LIKE ? AND idEjemplar LIKE ?;";
         $stmt = $con->prepare($sql);
         $stmt->bindParam(1,$idTienda,PDO::PARAM_INT);
         $stmt->bindParam(2,$idEjemplar,PDO::PARAM_INT);
         $stmt->execute();
         while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
           $stock = $row['stock'];
         }
         if($stock < 1){
             $confirmacion =false;
         }elseif($stock > 0){
             $confirmacion =true;
         }
         $con->commit();
         return $confirmacion;
     }catch(PDOException  $eX ){
         echo "Error: ".$eX;
         $con->rollback();
     }finally {
         $con = null;
         $stmt = null;
       }
  }//fin metodo
}
