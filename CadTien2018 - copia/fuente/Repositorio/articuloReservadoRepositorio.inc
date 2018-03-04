<?php

class articuloReservadoRepositorio{

  public function insertarArticuloReservado(string $idUsuario,int $idArticulo,int $numeroArticulos,float $pc,int $idTienda) :bool{
        $numeroArticulos = (int)$numeroArticulos;
        $sql = "INSERT INTO articulosReservados(idUsuario,idArticulo,cantidad,pReserva,idTienda) VALUES(?,?,?,?,?);";
        $respuesta = true;
        include_once __DIR__ . '/../../core/conexionBd.inc';
        try{
            $con = (new conexionBd)->getConexion();
            $con->beginTransaction();
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1,$idUsuario,PDO::PARAM_STR);
            $stmt->bindParam(2,$idArticulo,PDO::PARAM_INT);
            $stmt->bindParam(3,$numeroArticulos,PDO::PARAM_INT);
            $stmt->bindParam(4,$pc,PDO::PARAM_INT);
            $stmt->bindParam(5,$idTienda,PDO::PARAM_INT);
            if($stmt->execute()){
              $respuesta = false;
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

  //para ver carrito
public function verCarrito($idUsuario) :array{
  $articuloReservados=[];
  include_once __DIR__ . '/../../core/conexionBd.inc';
  require_once __DIR__ . '/../../fuente/Modelo/articuloSReservados.inc';
  $con = (new conexionBd)->getConexion();
  try{
      $con->beginTransaction();/* Iniciar una transacción, desactivando 'autocommit' */
      $sql = "SELECT idUsuario , idArticulo, cantidad ,pReserva, idTienda
      		FROM articulosReservados
      	WHERE articulosReservados.idUsuario = ?;";
      $stmt = $con->prepare($sql);
      $stmt->bindParam(1,$idUsuario,PDO::PARAM_INT);
      $stmt->execute();
      while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
         $articuloReservados[] = new ArticulosReservados($row);
      }
      $con->commit();/* Consignar los cambios */
      return $articuloReservados;
    }catch(PDOException  $e ){
      throw $e;
      $con->rollBack();/* Reconocer el error y revertir los cambios */
    }finally {
        $stmt =null;
        $con=null;
    }

  }//fin metodo

  



  public function borrarArticuloReservado(string $idUsuario,int $idArticulo) :bool{
    $confirmacion =false;
    include_once __DIR__ . '/../../core/conexionBd.inc';
    $con = (new conexionBd)->getConexion();
    $stock= 0;
    try{
        $con->beginTransaction();
        $sql = "DELETE FROM articulosReservados WHERE idUsuario = ? AND idArticulo = ?;";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(1,$idUsuario,PDO::PARAM_STR);
        $stmt->bindParam(2,$idArticulo,PDO::PARAM_INT);
        if($stmt->execute()){
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

  public function comprobarArticulosReservadosDuplicados(string $idUsuario,int $idArticulo) :bool{
      $sql = "SELECT idArticulo FROM articulosReservados WHERE idUsuario = ?;";
      $respuesta = true;
      $fecha = date('Y-m-d');
      include_once __DIR__ . '/../../core/conexionBd.inc';
      try{
          $con = (new conexionBd)->getConexion();
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$idUsuario,PDO::PARAM_STR);
          $stmt->execute();
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              if($row['idArticulo'] == $idArticulo){
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
  }//fin metodo

}//fin clase

?>
