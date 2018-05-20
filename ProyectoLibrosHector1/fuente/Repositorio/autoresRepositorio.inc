<?php

class AutoresRepositorio
{
  public function devolverAutoresTotales() :array{
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      include_once __DIR__ . '/../../fuente/modelo/autores.inc';
      $con = (new ConexionBaseDatos)->getConexion();
      $sql = "SELECT IdAutor,Nombre,Nacionalidad,IdPais FROM Autores  ORDER BY Nombre ASC;";
      $autores =[];
      try{
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->execute();
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              $autores[] = new Autores($row);
          }
          $con->commit();
          return $autores;
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
