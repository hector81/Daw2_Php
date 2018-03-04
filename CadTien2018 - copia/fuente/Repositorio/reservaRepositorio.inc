<?php

class reservaRepositorio{


  public function borrarReservaUsuario(string $userNombre) :bool{
        $sql = "delete from reserva where idUsuario = ?;";
        $respuesta = false;
        include_once __DIR__ . '/../../core/conexionBd.inc';
        try{
            $con = (new conexionBd)->getConexion();
            $con->beginTransaction();
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1,$userNombre,PDO::PARAM_STR);
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

  public function insertarReserva(string $idUsuario,string $grupo) :bool{
        $sql = "INSERT INTO Reserva(idUsuario,grupo,fReserva) VALUES(?,?,?);";
        $respuesta = false;
        $fecha = date('Y-m-d h:i:s');
        include_once __DIR__ . '/../../core/conexionBd.inc';
        try{
            $con = (new conexionBd)->getConexion();
            $con->beginTransaction();
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1,$idUsuario,PDO::PARAM_STR);
            $stmt->bindParam(2,$grupo,PDO::PARAM_STR);
            $stmt->bindParam(3,$fecha,PDO::PARAM_STR);
            //$stmt->debugDumpParams();
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

  public function comprobarClienteReserva(string $idUsuario,string $grupo) :bool{
      $sql = "SELECT idUsuario FROM Reserva WHERE grupo = ?;";
      $respuesta = true;
      $fecha = date('Y-m-d');
      include_once __DIR__ . '/../../core/conexionBd.inc';
      try{
          $con = (new conexionBd)->getConexion();
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$grupo,PDO::PARAM_STR);
          $stmt->execute();
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              if(strtoupper($row['idUsuario']) == strtoupper($idUsuario)){//lo cnvertimos a mayusculas por si acaso
                $respuesta = false;
              }
          }//FIN WHILE
          $con->commit();
          return $respuesta;
      }catch(PDOException $ex){
         throw $ex;
         $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }
  }//metodo

}//fin clase

?>
