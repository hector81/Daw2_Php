<?php

class UsuarioRepositorio
{ public function findUsuarioPorNombre($nombre, $contrasenia)
  {
    $booleanoComprobar = false;
    require_once __DIR__ . '/../../core/conexionBd.php';
    $conexionBD = (new ConexionBd())->getConexion();
    try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $sql = "SELECT contrasenia, grupo
                  FROM usuario
                 WHERE usuario = :usu";
        $cursor = $conexionBD->prepare($sql);
        $cursor->bindValue(':usu', $nombre);
        $cursor->execute();
        if($fila = $cursor->fetch())
        { if(password_verify($contrasenia, $fila['contrasenia']))
          { $_SESSION['grupo'] = $fila['grupo'];
            $_SESSION['usuario'] = $nombre;
            $booleanoComprobar =  true;
          }
        }else
        { $booleanoComprobar =  false;
        }
        /* Consignar los cambios */
        $conexionBD->commit();
        }catch(PDOException  $e ){
          echo "Error: ".$e;
          /* Reconocer el error y revertir los cambios */
          $conexionBD->rollBack();
        }finally {
        	if($cursor !=null){
            $cursor =null;
          }
          if($conexionBD !=null){
            $conexionBD !=null;
          }
        }

    return $booleanoComprobar;
  }

  public function comprobarGrupo($nombre)
    {
      $resultado='';
      require_once __DIR__ . '/../../core/conexionBd.php';
      $conexionBD = (new ConexionBd())->getConexion();

      try{
          /* Iniciar una transacción, desactivando 'autocommit' */
          $conexionBD->beginTransaction();
          $sql = "SELECT grupo
                    FROM dbo.usuario WHERE usuario LIKE '$nombre';";
          $stmt = $conexionBD->query( $sql );
          $contador=0;
          while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
             $resultado = $row['grupo'];
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

    public function comprobarNombreUsuario($nombre)
      {
        $resultado=false;
        $nombreUsuario ='';
        require_once __DIR__ . '/../../core/conexionBd.php';
        $conexionBD = (new ConexionBd())->getConexion();
        $nombreUsuario="";
        try{
            /* Iniciar una transacción, desactivando 'autocommit' */
            $conexionBD->beginTransaction();
            $sql = "SELECT usuario
                      FROM dbo.usuario WHERE usuario LIKE '$nombre';";
            $stmt = $conexionBD->query( $sql );
            $contador=0;
            while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
               $nombreUsuario = $row['usuario'];
            }
            if($nombreUsuario == ''){
    					$resultado = true;
    				}
    				else{
    					$resultado = false;
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

  public function borrarUsuarioPorNombre($nombre)
    {
      $resultado = true;
      require_once __DIR__ . '/../../core/conexionBd.php';
      $conexionBD = (new ConexionBd())->getConexion();

      try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $sql = "DELETE FROM dbo.usuario WHERE usuario LIKE '$nombre';";
        $stmt = $conexionBD->query( $sql );
        $stmt->execute();
        $stmt->closeCursor();
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

    //para visualizar todos los usuarios
    public function visualizarTodosLosUsuarios()
    {
      $resultado[]=null;
      require_once __DIR__ . '/../../core/conexionBd.php';
      $conexionBD = (new ConexionBd())->getConexion();
      $stmt = null;
      try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();

        $sql = "SELECT usuario, grupo
                          FROM dbo.usuario";
        $stmt = $conexionBD->query( $sql );
        $contador=0;
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){
              $usuario = $row['usuario'];
              $grupo = $row['grupo'];
              //crear articulo
              require_once __DIR__ . '/../Modelo/usuario.php';
              $usuario= new Usuario($usuario,$grupo);
              $resultado[$contador] = $usuario;
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

  public function comprobarUsuarioIdentificacion($nombre, $contrasenia)
    {
      $USUARIO = '';
      $PASSWORD = '';
      require_once __DIR__ . '/../../core/conexionBd.php';
      $conexionBD = (new ConexionBd())->getConexion();
  		$ComprobarUsuario = false;
      try{
          /* Iniciar una transacción, desactivando 'autocommit' */
          $conexionBD->beginTransaction();
    			$sql = "SELECT usuario, contrasenia FROM dbo.usuario WHERE usuario LIKE 'usuario'
          AND contrasenia LIKE '$contrasenia';";
    			foreach ($conexionBD->query($sql) as $row) {
    				$USUARIO =$row['usuario'];
            $USUARIO =$row['contrasenia'];
    			}
          if($USUARIO == '' && $PASSWORD == ''){
            $ComprobarUsuario = true;
          }
          else{
            $ComprobarUsuario = false;
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
  		return $ComprobarUsuario;
    }

   public function introducirUsuarioRegistro($nombre, $contrasenia,$grupo){
  		require_once __DIR__ . '/../../core/conexionBd.php';
      $conexionBD = (new ConexionBd())->getConexion();
      $contrasenia= password_hash($contrasenia, PASSWORD_DEFAULT);
      try{
        /* Iniciar una transacción, desactivando 'autocommit' */
        $conexionBD->beginTransaction();
        $stmt = $conexionBD->prepare ("INSERT INTO usuario (usuario, contrasenia,grupo) VALUES (:usuario, :contrasenia,:grupo)");
    		$stmt -> bindParam(':usuario' ,$nombre);
    		$stmt -> bindParam(':contrasenia',$contrasenia);
    		$stmt -> bindParam(':grupo',$grupo);
    		$stmt -> execute();
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

    }

}
