<?php

class ResenaRepositorio
{
  public function verResenas($id)
  {
    $listaResenas[]=null;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    $stmt =null;
    try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        //CONVERT(varchar(32), modifiedDate, 107) AS modifiedDate
        $conexionBD->beginTransaction();
        $sql = "SELECT idResenia,idArticulo,nombreArticulo, emailResenia, fechaResenia,
                          puntuacion, comentarios, modifiedDate
           FROM reseniasArticulo
          WHERE idArticulo LIKE $id";
        $contador=0;
        $stmt = $conexionBD->query( $sql );
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
           $idResenia= $row['idResenia'];
           $idArticulo = $row['idArticulo'];
           $nombreArticulo = $row['nombreArticulo'];
           $fechaResenia = $row['fechaResenia'];
           $emailResenia = $row['emailResenia'];
           $puntuacion = $row['puntuacion'];
           $comentarios = $row['comentarios'];
           $modifiedDate = $row['modifiedDate'];
           //crear resena
           require_once __DIR__ . '/../Modelo/articulo.php';
           $resena = new Resena($idResenia,$idArticulo,$nombreArticulo,$fechaResenia,$emailResenia,$puntuacion,
           $comentarios,$modifiedDate);
           $listaResenas[$contador] = $resena;
           $contador++;
        }
        /* Consignar los cambios */
        $conexionBD->commit();
    }catch(PDOException  $e ){
        echo "Error: ".$e;
      /* Reconocer el error y revertir los cambios */
      $conexionBD->rollBack();
    }finally {
      if($stmt !=null){
        $stmt =null;
      }
      if($conexionBD !=null){
        $conexionBD !=null;
      }
    }
    return $listaResenas;
  }

    public function comprobarResenaExiste($id)
    {
      $comprobar=false;
      require_once __DIR__ . '/../../core/conexionBd.php';
      $conexionBD = (new ConexionBd())->getConexion();
      $stmt =null;
      $idResenia = '';
      try{
          /* Iniciar una transacción, desactivando 'autocommit' */
          //CONVERT(varchar(32), modifiedDate, 107) AS modifiedDate
          $conexionBD->beginTransaction();
          $sql = "SELECT idResenia
             FROM reseniasArticulo
            WHERE idResenia LIKE $id";
          $stmt = $conexionBD->query( $sql );
          while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
             $idResenia= $row['idResenia'];
          }
          if($idResenia == ''){
            $comprobar=false;
          }else{
            $comprobar=true;
          }
          /* Consignar los cambios */
          $conexionBD->commit();
      }catch(PDOException  $e ){
          echo "Error: ".$e;
        /* Reconocer el error y revertir los cambios */
        $conexionBD->rollBack();
      }finally {
        if($stmt !=null){
          $stmt =null;
        }
        if($conexionBD !=null){
          $conexionBD !=null;
        }
      }

    return $comprobar;
  }

  public function validarEmail($email)
  {
    $comprobar = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      $comprobar = true;//es valida
    } else {
      $comprobar = false;//no es valida
    }
    return $comprobar;
  }

  public function insertarResena($idArticulo, $nombreArticulo, $fechaResenia,
  $emailResenia, $puntuacion, $comentarios, $modifiedDate)
  {
    $confirmacion =false;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    $stmt = null;
    try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $fecha_actual = date('Y-m-d');
        $sql = "INSERT INTO reseniasArticulo(idArticulo, nombreArticulo, fechaResenia, emailResenia,
                puntuacion, comentarios, modifiedDate)
                VALUES($idArticulo, '$nombreArticulo', $fechaResenia,
                '$emailResenia', $puntuacion, '$comentarios', $modifiedDate)";
              //  die(var_dump($sql));
        $stmt = $conexionBD->query( $sql );
        //$stmt->execute();
        $confirmacion =true;
        /* Consignar los cambios */
        $conexionBD->commit();
    }catch(PDOException  $e ){
        echo "Error: ".$e;
        /* Reconocer el error y revertir los cambios */
        $conexionBD->rollBack();
    }finally {
        if($stmt !=null){
          $stmt =null;
        }
        if($conexionBD !=null){
          $conexionBD !=null;
        }
      }

    return $confirmacion;
  }

  public function visualizarTodasResenas(){
    $listaResultados[] =null;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())-> getConexion();
    $stmt = null;
    try{
      $conexionBD->beginTransaction();
      $sql = "SELECT idResenia, idArticulo, nombreArticulo, fechaResenia, emailResenia,
              puntuacion, comentarios, modifiedDate FROM dbo.reseniasArticulo";
      $stmt = $conexionBD->query($sql);
      $contador = 0;
      while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
          $idResenia = $row['idResenia'];
          $idArticulo = $row['idArticulo'];
          $nombreArticulo = $row['nombreArticulo'];
          $fechaResenia = $row['fechaResenia'];
          $emailResenia = $row['emailResenia'];
          $puntuacion = $row['puntuacion'];
          $comentarios = $row['comentarios'];
          $modifiedDate = $row['modifiedDate'];
          //crear reseña
          require_once __DIR__ . '/../Modelo/resena.php';
          $resena = new Resena($idResenia,$idArticulo,$nombreArticulo,$fechaResenia,$emailResenia,$puntuacion,
            $comentarios,$modifiedDate);
          $listaResultados[$contador] = $resena;
          $contador++;

      }

      $conexionBD->commit();
    }catch(PDOException $e){
      echo $e;
      $conexionBD->rollBack();
    }finally {
        if($stmt !=null){
          $stmt =null;
        }
        if($conexionBD !=null){
          $conexionBD !=null;
        }
      }
    return $listaResultados;
  }

}
?>
