<?php

class SubCategoriasRepositorio
{

  public function devolverSubCategorias(int $IdCategoria) :array{
    $sql = "SELECT  NUMERO_LIBROS, IdSubCategoria, NombreSubCategoria, Descripcion, IdCategoria
        FROM librosPorSubcategorias WHERE IdCategoria = ?;";
    $subCategorias = [];$arraySubCategorias=[];
    include_once __DIR__ . '/../../core/ConexionBaseDatos.inc';
    try{
        $con = (new ConexionBaseDatos)->getConexion();
        $con->beginTransaction();
        $stmt = $con->prepare($sql);
        $stmt->bindParam(1,$IdCategoria,PDO::PARAM_INT);
        $stmt->execute();
        while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
            $subCategorias  = [
                'NUMERO_LIBROS' => $row['NUMERO_LIBROS'],
                'IdSubCategoria' => $row['IdSubCategoria'],
                'NombreSubCategoria' => $row['NombreSubCategoria'],
                'Descripcion' => $row['Descripcion']
            ];
            $arraySubCategorias[]=$subCategorias;
        }
        $con->commit();
        return $arraySubCategorias;
    }catch(PDOException $ex){
       throw $ex;
       $con->rollBack();
    }finally{
      $con = null;
      $stmt = null;
    }
  }//fin metodo

  public function verSubCategoriasAdministrador() :array{
      $sql = "SELECT IdSubCategoria,NombreSubCategoria,Descripcion,IdCategoria FROM SubCategorias;";
      $listaSubCategoria = [];
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      include_once __DIR__ . '/../../fuente/Modelo/subCategorias.inc';
      try{
          $con = (new ConexionBaseDatos)->getConexion();
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->execute();
          while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
              $subCategoria = new SubCategorias($row);
              $listaSubCategoria[] = $subCategoria;
          }
          $con->commit();
          return $listaSubCategoria;
      }catch(PDOException $ex){
        //throw new Exception("Error Processing Request", 1); //el inc es para los includes
         throw $ex;
         $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }
  }//fin metodo

  public function borrarSubCategoriaAdministrador(int $idSubCategoria) :bool{
      $sql = "DELETE FROM SubCategorias WHERE IdSubCategoria = ?;";
      $boolean = false;
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      try{
          $con = (new ConexionBaseDatos)->getConexion();
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$idSubCategoria,PDO::PARAM_INT);
          if($stmt->execute()){
            $boolean = true;
          }
          $con->commit();
          return $boolean;
      }catch(PDOException $ex){
         throw $ex;
         $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }
  }//fin metodo

  public function devolverSubCategoriasPorId(int $idSubCategoria) :array{
    include_once __DIR__ . '/../../fuente/Modelo/SubCategorias.inc';
    $sql = "SELECT  IdSubCategoria,NombreSubCategoria,Descripcion,IdCategoria FROM SubCategorias WHERE IdSubCategoria =?;";
    $arraySubCategorias=[];
    include_once __DIR__ . '/../../core/ConexionBaseDatos.inc';
    try{
          $con = (new ConexionBaseDatos)->getConexion();
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$idSubCategoria,PDO::PARAM_INT);
          $stmt->execute();
          while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
              $subCategoria = new SubCategorias($row);
              $arraySubCategorias[] = $subCategoria;
          }
        $con->commit();
        return $arraySubCategorias;
    }catch(PDOException $ex){
       throw $ex;
       $con->rollBack();
    }finally{
      $con = null;
      $stmt = null;
    }
  }//fin metodo

  public function modificarSubCategoriaAdministradorId(int $idSubCategoria,string $nombreSubCategoria,string $descripcion) :bool{
    $sql = "UPDATE SubCategorias SET NombreSubCategoria = ?, Descripcion = ? WHERE IdSubCategoria = ?;";
    $boolean = false;
    include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
    try{
        $con = (new ConexionBaseDatos)->getConexion();
        $con->beginTransaction();
        $stmt = $con->prepare($sql);
        $stmt->bindParam(1,$nombreSubCategoria,PDO::PARAM_STR);
        $stmt->bindParam(2,$descripcion,PDO::PARAM_STR);
        $stmt->bindParam(3,$idSubCategoria,PDO::PARAM_INT);
        if($stmt->execute()){
          $boolean = true;
        }
        $con->commit();
        return $boolean;
    }catch(PDOException $ex){
       throw $ex;
       $con->rollBack();
    }finally{
      $con = null;
      $stmt = null;
    }
  }//fin metodo

}///fin clase
