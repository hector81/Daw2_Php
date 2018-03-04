<?php

class familiaRepositorio {

  function cargarFamilias() :array{
    $sql = "SELECT id,nombre,descripcion FROM familia;";
    $familias = [];
    include_once __DIR__ . '/../../core/conexionBd.inc';
    include_once __DIR__ . '/../../fuente/modelo/familia.inc';
    try{
        $con = (new conexionBd)->getConexion();
        $con->beginTransaction();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        while($fila =$stmt->fetch(PDO::FETCH_ASSOC)){
            $familias[] = new Familia($fila);
        }
        $con->commit();
        return $familias;
    }catch(PDOException $ex){
      //throw new Exception("Error Processing Request", 1); //el inc es para los includes
       throw $ex;
       $con->rollBack();
    }finally{
      $con = null;
      $stmt = null;
    }
  }

  public function darAltaCategoria(string $nombreCategoria,string $descripcionCategoria) :bool{
      $boolConfirmacion = false;
      $sql = "INSERT INTO Familia(nombre, descripcion) VALUES(?,?)";
      include_once __DIR__ . '/../../core/conexionBd.inc';
      try{
          $con = (new conexionBd)->getConexion();
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$nombreCategoria,PDO::PARAM_STR);
          $stmt->bindParam(2,$descripcionCategoria,PDO::PARAM_STR);
          //$stmt->debugDumpParams();
          if($stmt->execute()){
              $boolConfirmacion = true;
          }else{
              $boolConfirmacion = false;
          }
          $con->commit();
          return $boolConfirmacion;
      }catch(PDOException $ex){
        //throw new Exception("Error Processing Request", 1); //el inc es para los includes
         throw $ex;
         $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }
  }//fin metodo

  public function modificarFamilia(string $nombreCategoria,string $descripcionCategoria,int $articulosCategoriaId) :bool{
    $boolConfirmacion = false;
    $sql = "UPDATE Familia SET nombre = ?, descripcion = ? WHERE Id = ? ;";
    include_once __DIR__ . '/../../core/conexionBd.inc';
    try{
        $con = (new conexionBd)->getConexion();
        $con->beginTransaction();
        $stmt = $con->prepare($sql);
        $stmt->bindParam(1,$nombreCategoria,PDO::PARAM_STR);
        $stmt->bindParam(2,$descripcionCategoria,PDO::PARAM_STR);
        $stmt->bindParam(3,$articulosCategoriaId,PDO::PARAM_INT);
        if($stmt->execute()){
            $boolConfirmacion = true;
        }else{
            $boolConfirmacion = false;
        }
        $con->commit();
        return $boolConfirmacion;
    }catch(PDOException $ex){
      //throw new Exception("Error Processing Request", 1); //el inc es para los includes
       throw $ex;
       $con->rollBack();
    }finally{
      $con = null;
      $stmt = null;
    }
  }//fin metodo

  public function comprobarFamiliaExiste(string $nombreCategoria) :bool{
    $sql = "SELECT nombre FROM familia;";
    $boolExiste = true;
    include_once __DIR__ . '/../../core/conexionBd.inc';
    try{
        $con = (new conexionBd)->getConexion();
        $con->beginTransaction();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        while($fila =$stmt->fetch(PDO::FETCH_ASSOC)){
            if($fila['nombre'] == $nombreCategoria){
              $boolExiste = false;
            }
        }
        $con->commit();
        return $boolExiste;
    }catch(PDOException $ex){
       throw $ex;
       $con->rollBack();
    }finally{
      $con = null;
      $stmt = null;
    }
  }//fin metodo


  public function verArticulosPorCategoria(string $nombreCategoria) :array{
    $sql = " SELECT id,nombreCorto,nombre,descripcion,PVP,idFamilia,imagen,agotado,pocasUnidades FROM articulo
      WHERE idFamilia = (SELECT id FROM familia WHERE nombre = ?);";
    $articulosPorFamilia = [];
    include_once __DIR__ . '/../../core/conexionBd.inc';
    include_once __DIR__ . '/../../fuente/modelo/articulo.inc';
    try{
        $con = (new conexionBd)->getConexion();
        $con->beginTransaction();
        $stmt = $con->prepare($sql);
        $stmt->bindParam(1,$nombreCategoria,PDO::PARAM_STR);
        $stmt->execute();
        while($fila =$stmt->fetch(PDO::FETCH_ASSOC)){
            $articulosPorFamilia[] = new Articulo($fila);
        }
        $con->commit();
        return $articulosPorFamilia;
    }catch(PDOException $ex){
      //throw new Exception("Error Processing Request", 1); //el inc es para los includes
       throw $ex;
       $con->rollBack();
    }finally{
      $con = null;
      $stmt = null;
    }
  }//////////fin metodo

  public function verArticulosPorIdFamilia(int $articulosCategoriaId) :array{
    $sql = " SELECT id,nombreCorto,nombre,descripcion,PVP,idFamilia,imagen,agotado,pocasUnidades FROM articulo
      WHERE idFamilia = ?;";
    $articulosPorFamilia = [];
    include_once __DIR__ . '/../../core/conexionBd.inc';
    include_once __DIR__ . '/../../fuente/modelo/articulo.inc';
    try{
        $con = (new conexionBd)->getConexion();
        $con->beginTransaction();
        $stmt = $con->prepare($sql);
        $stmt->bindParam(1,$articulosCategoriaId,PDO::PARAM_INT);
        $stmt->execute();
        while($fila =$stmt->fetch(PDO::FETCH_ASSOC)){
            $articulosPorFamilia[] = new Articulo($fila);
        }
        $con->commit();
        return $articulosPorFamilia;
    }catch(PDOException $ex){
      //throw new Exception("Error Processing Request", 1); //el inc es para los includes
       throw $ex;
       $con->rollBack();
    }finally{
      $con = null;
      $stmt = null;
    }
  }//////////fin metodo

  public function borrarCategoria($articulosCategoriaId) :bool{
      //hay que realizar 3 operaciones
      $bool1 = false;$bool2 = false;$bool3 = false;
      $sql1 = "DELETE FROM almacen WHERE idArticulo IN (SELECT id FROM articulo WHERE idFamilia = ?);";
      $sql2 = "DELETE FROM articulo WHERE idFamilia = ?;";
      $sql3 = "DELETE FROM Familia WHERE Id = ?;";
      include_once __DIR__ . '/../../core/conexionBd.inc';
      //primera
      try{
          $con1 = (new conexionBd)->getConexion();
          $con1->beginTransaction();
          $stmt1 = $con1->prepare($sql1);
          $stmt1->bindParam(1,$articulosCategoriaId,PDO::PARAM_INT);
          if($stmt1->execute()){
            $bool1 = true;
          }
          $con1->commit();
      }catch(PDOException $ex){
         throw $ex;
         $con1->rollBack();
      }finally{
        $con1 = null;
        $stmt1 = null;
      }
      //segunda
      if($bool1){
          try{
              $con2 = (new conexionBd)->getConexion();
              $con2->beginTransaction();
              $stmt2 = $con2->prepare($sql2);
              $stmt2->bindParam(1,$articulosCategoriaId,PDO::PARAM_INT);
              if($stmt2->execute()){
                $bool2 = true;
              }
              $con2->commit();
          }catch(PDOException $ex){
             throw $ex;
             $con2->rollBack();
          }finally{
            $con2 = null;
            $stmt2 = null;
          }
      }

      //tercera
      if($bool2){
          try{
              $con3 = (new conexionBd)->getConexion();
              $con3->beginTransaction();
              $stmt3 = $con3->prepare($sql3);
              $stmt3->bindParam(1,$articulosCategoriaId,PDO::PARAM_INT);
              if($stmt3->execute()){
                $bool3 = true;
              }
              $con3->commit();
          }catch(PDOException $ex){
             throw $ex;
             $con3->rollBack();
          }finally{
            $con3 = null;
            $stmt3 = null;
          }
      }
      return $bool3;
  }//////////fin metodo

}
 ?>
