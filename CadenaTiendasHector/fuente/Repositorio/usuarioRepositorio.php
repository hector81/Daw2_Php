<?php

class UsuarioRepositorio
{ public function findUsuarioPorNombre($nombre, $contrasenia)
  {
    $booleanoComprobar = false;

    $sql = "SELECT contrasenia, grupo
              FROM usuario
             WHERE usuario = :usu";
    require_once __DIR__ . '/../../core/conexionBd.php';

    $con = (new ConexionBd())->getConexion();
    $cursor = $con->prepare($sql);
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
    return $booleanoComprobar;
  }

  public function comprobarUsuarioIdentificacion($nombre, $contrasenia)
    {
      require_once __DIR__ . '/../../core/conexionBd.php';
      $conexionBD = (new ConexionBd())->getConexion();
  		$ComprobarUsuario = false;
  			$sql = "SELECT usuario,contrasenia FROM dbo.usuario WHERE grupo LIKE 'usuario';";
  			foreach ($conexionBD->query($sql) as $row) {
  				$USUARIO =$row['usuario'];
  				$CLAVE =$row['contrasenia'];
  				if($USUARIO == $nombre && $CLAVE == $contrasenia){
  					$ComprobarUsuario = true;
  				}
  				else{
  					$ComprobarUsuario = false;
  				}
  			}
  		return $ComprobarUsuario;
    }

   public function introducirUsuarioRegistro($nombre, $contrasenia){
  		require_once __DIR__ . '/../../core/conexionBd.php';
      $conexionBD = (new ConexionBd())->getConexion();
      $GRUPOClienteRegistrar = 'clientes';
      $hash = $contrasenia;
        $stmt = $conexionBD->prepare ("INSERT INTO usuario (usuario, contrasenia,grupo) VALUES (:usuario, :contrasenia,:grupo)");
    		$stmt -> bindParam(':usuario' ,$nombre);
    		$stmt -> bindParam(':contrasenia',$contrasenia);
    		$stmt -> bindParam(':grupo',$GRUPOClienteRegistrar);
    		$stmt -> execute();

    }

}
