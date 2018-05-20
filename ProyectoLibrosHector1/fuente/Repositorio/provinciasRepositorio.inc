<?php

class ProvinciasRepositorio
{
    public function devolverProvincias() :array{
      $sql = "SELECT NombreProvincia FROM Provincias;";
      $provincias = [];
      include_once __DIR__ . '/../../core/ConexionBaseDatos.inc';
      try{
          $con = (new ConexionBaseDatos)->getConexion();
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->execute();
          while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
              $provincias[]  = $row['NombreProvincia'];
          }
          $con->commit();
          return $provincias;
      }catch(PDOException $ex){
         throw $ex;
         $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }
    }//fin metodo

}//fin clase
