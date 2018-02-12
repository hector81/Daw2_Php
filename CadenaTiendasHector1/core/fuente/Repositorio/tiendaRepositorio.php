<?php
class TiendaRepositorio
{
  public function findTiendaByNombre($nombreCiudad)
  {
    $resultado[]=null;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $sql = "SELECT id,nombre,provincia,ciudad,tlfno FROM dbo.tienda WHERE provincia LIKE '$nombreCiudad';";
        $stmt = $conexionBD->query( $sql );
        $contador=0;
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
           $id= $row['id'];
           $nombre = $row['nombre'];
           $provincia = $row['provincia'];
           $ciudad = $row['ciudad'];
           $tlfno = $row['tlfno'];

           //crear Tienda
           require_once __DIR__ . '/../Modelo/tienda.php';
           $tienda = new Tienda($id,$nombre,$provincia,$ciudad,$tlfno);
           $resultado[$contador] = $tienda;
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
      return $resultado;
  }

  //para mostrar al inicio las tiendas
  public function mostrarTiendas()
  {
    $resultado[]=null;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    try{
      /* Iniciar una transacción, desactivando 'autocommit' */
      $conexionBD->beginTransaction();
      $sql = "SELECT id,nombre,provincia,ciudad,tlfno FROM dbo.tienda;";
      $stmt = $conexionBD->query( $sql );
          $contador=0;
          while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
             $id= $row['id'];
             $nombre = $row['nombre'];
             $provincia = $row['provincia'];
             $ciudad = $row['ciudad'];
             $tlfno = $row['tlfno'];

             //crear Tienda
             require_once __DIR__ . '/../Modelo/tienda.php';
             $tienda = new Tienda($id,$nombre,$provincia,$ciudad,$tlfno);
             $resultado[$contador] = $tienda;
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
    return $resultado;

  }

  public function comprobarTiendaExiste($nombreProvincia)
  {
    $nombreSelect='';
    $booleano = false;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $sql = "SELECT nombre FROM dbo.tienda WHERE provincia LIKE '$nombreProvincia';";
        $stmt = $conexionBD->query( $sql );
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
           $nombreSelect = $row['nombre'];
        }
        if($nombreSelect == ''){
          $resultado = true;
        }
        else{
          $resultado = false;
        }
        /* Consignar los cambios */
        $conexionBD->commit();
    }catch(PDOException  $e ){
        echo "Error: ".$e;
    }finally {
      	if($stmt !=null){
          $stmt =null;
        }
        if($conexionBD !=null){
          $conexionBD !=null;
        }
      }
    return $resultado;
  }


  public function buscarIdTiendaPorNombre($ciudad){
    //PARA BUSCAR ID TIENDA
    $idCiudad= '';
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $sql = "SELECT id FROM dbo.tienda WHERE
                          ciudad LIKE '$ciudad';";
        $stmt = $conexionBD->query( $sql );
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
          $idCiudad = $row['id'];
        }
        /* Consignar los cambios */
        $conexionBD->commit();
    }catch(PDOException  $e ){
        echo "Error: ".$e;
    }finally {
        if($stmt !=null){
          $stmt =null;
        }
        if($conexionBD !=null){
          $conexionBD !=null;
        }
      }
    return $idCiudad;

  }



}

?>
