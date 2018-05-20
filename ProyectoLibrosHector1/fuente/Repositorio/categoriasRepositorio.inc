<?php

class CategoriasRepositorio
{

  public function devolverCategorias() :array{
    $sql = "SELECT  NUMERO_LIBROS, IdCategoria, NombreCategoria, Descripcion
      FROM librosPorMateria;";
    $categorias = [];$arrayCategorias=[];
    include_once __DIR__ . '/../../core/ConexionBaseDatos.inc';
    try{
        $con = (new ConexionBaseDatos)->getConexion();
        $con->beginTransaction();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
            $categorias  = [
                'NUMERO_LIBROS' => $row['NUMERO_LIBROS'],
                'IdCategoria' => $row['IdCategoria'],
                'NombreCategoria' => $row['NombreCategoria'],
                'Descripcion' => $row['Descripcion'],
            ];
            $arrayCategorias[]=$categorias;
        }
        $con->commit();
        return $arrayCategorias;
    }catch(PDOException $ex){
       throw $ex;
       $con->rollBack();
    }finally{
      $con = null;
      $stmt = null;
    }
  }//fin metodo

  public function verCategoriasAdministrador() :array{
      $sql = "SELECT IdCategoria, NombreCategoria, Descripcion FROM Categorias;";
      $listaCategoria = [];
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      include_once __DIR__ . '/../../fuente/Modelo/Categorias.inc';
      try{
          $con = (new ConexionBaseDatos)->getConexion();
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->execute();
          while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
              $categoria = new Categorias($row);
              $listaCategoria[] = $categoria;
          }
          $con->commit();
          return $listaCategoria;
      }catch(PDOException $ex){
        //throw new Exception("Error Processing Request", 1); //el inc es para los includes
         throw $ex;
         $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }
  }//fin metodo

  public function borrarCategoriaAdministrador(int $idCategoria) :bool{
      $sql = "DELETE FROM Categorias WHERE IdCategoria = ?;";
      $boolean = false;
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      try{
          $con = (new ConexionBaseDatos)->getConexion();
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$idCategoria,PDO::PARAM_INT);
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

  public function devolverCategoriasPorId(int $idCategoria) :array{
    include_once __DIR__ . '/../../fuente/Modelo/Categorias.inc';
    $sql = "SELECT  IdCategoria, NombreCategoria, Descripcion FROM Categorias WHERE IdCategoria =?;";
    $arrayCategorias=[];
    include_once __DIR__ . '/../../core/ConexionBaseDatos.inc';
    try{
          $con = (new ConexionBaseDatos)->getConexion();
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$idCategoria,PDO::PARAM_INT);
          $stmt->execute();
          while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
              $categoria = new Categorias($row);
              $arrayCategorias[] = $categoria;
          }
        $con->commit();
        return $arrayCategorias;
    }catch(PDOException $ex){
       throw $ex;
       $con->rollBack();
    }finally{
      $con = null;
      $stmt = null;
    }
  }//fin metodo

  public function modificarCategoriaAdministradorId($idCategoria,$nombreCategoria,$descripcion) :bool{
    $sql = "UPDATE Categorias SET NombreCategoria = ?, Descripcion = ? WHERE IdCategoria = ?;";
    $boolean = false;
    include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
    try{
        $con = (new ConexionBaseDatos)->getConexion();
        $con->beginTransaction();
        $stmt = $con->prepare($sql);
        $stmt->bindParam(1,$nombreCategoria,PDO::PARAM_STR);
        $stmt->bindParam(2,$descripcion,PDO::PARAM_STR);
        $stmt->bindParam(3,$idCategoria,PDO::PARAM_INT);
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

}//fin clase
