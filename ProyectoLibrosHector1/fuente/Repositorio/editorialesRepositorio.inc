<?php

class EditorialesRepositorio
{

  public function devolverEditorialesTotales() :array{
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      include_once __DIR__ . '/../../fuente/modelo/editoriales.inc';
      $con = (new ConexionBaseDatos)->getConexion();
      $sql = "SELECT IdEditorial, Nombre, Direccion,IdCiudad,Telefono, Fax, Email from editoriales   ORDER BY Nombre ASC;";
      $editoriales =[];
      try{
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->execute();
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              $editoriales[] = new Editoriales($row);
          }
          $con->commit();
          return $editoriales;
      }catch(PDOException $ex){
        throw $ex;
        $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }
  }//fin metodo

}//fin metodo
