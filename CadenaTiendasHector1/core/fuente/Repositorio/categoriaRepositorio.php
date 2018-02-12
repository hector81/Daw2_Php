<?php
class CategoriaRepositorio
{
  public function findCategoriaPorNombre($nombreCategoria)
  {
    $resultado[]=null;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();

    try{
      /* Iniciar una transacción, desactivando 'autocommit' */
      $conexionBD->beginTransaction();
      $sql = "SELECT id,nombre,descripcion
                FROM familia
               WHERE nombre = '$nombreCategoria' OR nombre LIKE '%$nombreCategoria' OR nombre LIKE '$nombreCategoria%';";
      $stmt = $conexionBD->query( $sql );
      $contador=0;
      while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
         $id = $row['id'];
         $nombre = $row['nombre'];
         $descripcion = $row['descripcion'];
         //crear Familia
         require_once __DIR__ . '/../Modelo/familia.php';
         $familia = new Familia($id,$nombre,$descripcion);
         $resultado[$contador] = $familia;
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

  //categoriasInicio visualzar
  public function categoriasInicio()
  {
    $resultado[]=null;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();

    try{
      /* Iniciar una transacción, desactivando 'autocommit' */
      $conexionBD->beginTransaction();
      $sql = "SELECT id,nombre,descripcion
                FROM familia;";
      $stmt = $conexionBD->query( $sql );
      $contador=0;
      while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
         $id = $row['id'];
         $nombre = $row['nombre'];
         $descripcion = $row['descripcion'];
         //crear Familia
         require_once __DIR__ . '/../Modelo/familia.php';
         $familia = new Familia($id,$nombre,$descripcion);
         $resultado[$contador] = $familia;
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


  //para visualizar por categorias
  public function visualizarCategoria($nombreCategoria)
  {
    $resultado[]=null;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    try{
      /* Iniciar una transacción, desactivando 'autocommit' */
      $conexionBD->beginTransaction();
      $sql = "SELECT Id FROM dbo.articulo WHERE nombre LIKE '$nombreCategoria'
      OR nombre LIKE '%$nombreCategoria' OR nombre LIKE '$nombreCategoria%';";
      foreach ($conexionBD->query($sql) as $row) {
        $sqlCategoria = "SELECT id,nombreCorto,nombre,descripcion,PVP, idFamilia,foto FROM dbo.articulo WHERE id LIKE '$row';";
        foreach ($conexionBD->query($sqlCategoria) as $rowCategoria) {
          $resultado[] = $rowCategoria;
        }
      }
      /* Consignar los cambios */
      $conexionBD->commit();
    }catch(PDOException  $e ){
      echo "Error: ".$e;
      /* Reconocer el error y revertir los cambios */
     $conexionBD->rollBack();
    }finally {
        if($conexionBD !=null){
          $conexionBD !=null;
        }
      }


      return $resultado;
  }


  //para visualizar por categorias
  public function mostrarCategorias()
  {
    $resultado[][]=null;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    try{
      /* Iniciar una transacción, desactivando 'autocommit' */
      $conexionBD->beginTransaction();
      $sql = "SELECT nombre FROM dbo.familia";
      $stmt = $conexionBD->query( $sql );
      $contador=0;
      while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
         $resultado[$contador][0] = $row['nombre'];
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

  public function insertarCategoria($nombre,$descripcion){
    $confirmacion = true;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    try {
      $conexionBD->beginTransaction();
      $stmt = $conexionBD->prepare ("INSERT INTO familia (nombre,descripcion) VALUES (:nombre, :descripcion)");
      $stmt -> bindParam(':nombre' ,$nombre);
      $stmt -> bindParam(':descripcion',$descripcion);
      $stmt -> execute();

      $conexionBD->commit();
    }catch (Exception $e) {
      $conexionBD->rollBack();
      echo "Error: ".$e;
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

  public function borrarCategoriaPorNombre($nombre){
    $resultado = true;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $sql = "DELETE FROM dbo.familia WHERE nombre LIKE '$nombre';";
        $stmt = $conexionBD->query( $sql );
        $stmt->execute();
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

  public function comprobarCategoriaExiste($categoria){
    $resultado = false;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $sql = "SELECT COUNT(*) FROM dbo.familia WHERE nombre LIKE '$categoria';";
        $stmt = $conexionBD->query($sql);
        //si hay algun resultado
        if ($stmt->fetchColumn() > 0) {
          $resultado = false;
        }else{
          //si no hay resultados
          $resultado = true;
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

  public function sacarIdCategoria($categoria){
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    $idCategoria=0;
    try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $stmt = $conexionBD->query( "SELECT Id FROM familia WHERE nombre LIKE '$categoria';" );
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
          $idCategoria = $row['Id'];
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

    return $idCategoria;
  }

  public function comprobarCategoriaExisteNombre($nombreCategoria){
    $resultado = false;
    $nombreComprobar= '';
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $sql = "SELECT nombre FROM dbo.familia WHERE nombre LIKE '$nombreCategoria';";
        $stmt = $conexionBD->query($sql);
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
          $nombreComprobar = $row['nombre'];
        }
        //si hay algun resultado
        if ($nombreComprobar=='') {
          $resultado = false;
        }else{
          //si no hay resultados
          $resultado = true;
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

}

?>
