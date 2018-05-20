<?php

class ReservaRepositorio
{
  public function insertarReserva(string $usuario) :bool{
          $sql = "INSERT INTO Reserva(Usuario,fReserva) VALUES(?,?);";
          $respuesta = false;
          $fecha = date('Y-m-d h:i:s');
          include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
          try{
              $con = (new ConexionBaseDatos)->getConexion();
              $con->beginTransaction();
              $stmt = $con->prepare($sql);
              $stmt->bindParam(1,$usuario,PDO::PARAM_STR);
              $stmt->bindParam(2,$fecha,PDO::PARAM_STR);
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

      public function comprobarClienteNumeroReserva(string $usuario) :bool{
          $sql = "SELECT COUNT(Usuario) AS NUMERO FROM Reserva WHERE Usuario = ?;";
          $respuesta = true;
          include_once __DIR__ . '/../../core/conexionBd.inc';
          try{
              $con = (new conexionBd)->getConexion();
              $con->beginTransaction();
              $stmt = $con->prepare($sql);
              $stmt->bindParam(1,$usuario,PDO::PARAM_STR);
              $stmt->execute();
              while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                  if($row['NUMERO'] >0){//Si es mayor que 0, tenia reserva hecha antes
                    $respuesta = false;
                  }
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
      }//FIN metodo
}

?>
