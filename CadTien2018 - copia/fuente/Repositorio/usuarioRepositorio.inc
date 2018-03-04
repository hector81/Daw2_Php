<?php

class UsuarioRepositorio {
/*VALUES(N'Administrador',N'', , , )";*/ //contrasenia contraseña
  public function introducirUsuario(string $nickUsuario,string $passwordUsuario,string $grupo
  ,string $nombreUsuario,string $apellidosUsuario,string $calleUsuario,string $ciudadUsuario,string $cpUsuario,string $provinciaUsuario,
  string $tlfnoUsuario,string $eCorreoUsuario) :bool{
      $contraseniaCodificada = password_hash($passwordUsuario, PASSWORD_DEFAULT);//codificarContrasenia, es un string lo que da
      $sql = "INSERT INTO Usuario(usuario,
      contrasenia,
      grupo,
      nombre,
      apellido,
      calle,
      ciudad,
      cp,
      provincia,
      tlfno,
      eCorreo) VALUES(?,?,?,?,?,?,?,?,?,?,?);";
      $respuesta = true;
      include_once __DIR__ . '/../../core/conexionBd.inc';
      include_once __DIR__ . '/../../fuente/modelo/usuario.inc';
      try{
          $con = (new conexionBd)->getConexion();
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$nickUsuario,PDO::PARAM_STR);
          $stmt->bindParam(2,$contraseniaCodificada,PDO::PARAM_STR);
          $stmt->bindParam(3,$grupo,PDO::PARAM_STR);
          $stmt->bindParam(4,$nombreUsuario,PDO::PARAM_STR);
          $stmt->bindParam(5,$apellidosUsuario,PDO::PARAM_STR);
          $stmt->bindParam(6,$calleUsuario,PDO::PARAM_STR);
          $stmt->bindParam(7,$ciudadUsuario,PDO::PARAM_STR);
          $stmt->bindParam(8,$cpUsuario,PDO::PARAM_STR);
          $stmt->bindParam(9,$provinciaUsuario,PDO::PARAM_STR);
          $stmt->bindParam(10,$tlfnoUsuario,PDO::PARAM_STR);
          $stmt->bindParam(11,$eCorreoUsuario,PDO::PARAM_STR);
          //$con->debugDumpParams();//dara la construccion de la sentencia de sql
        //  $stmt->debugDumpParams();//dara la construccion de la sentencia de sql el que hay que usar
          //die();
          //se puede poner un die(); para ver si es error
          $stmt->execute();
          if($stmt){
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

  public function modificarUsuario(string $nickUsuario,string $passwordUsuario,string $grupo
  ,string $nombreUsuario,string $apellidosUsuario,string $calleUsuario,string $ciudadUsuario,string $cpUsuario,string $provinciaUsuario,
  string $tlfnoUsuario,string $eCorreoUsuario) :bool{
        $respuesta = true;
        $contraseniaCodificada = password_hash($passwordUsuario, PASSWORD_DEFAULT);//codificarContrasenia, es un string lo que da
        $sql ="UPDATE Usuario SET usuario = ?,
         contrasenia = ?,
         grupo = ?,
         nombre = ?,
         apellido = ?,
         calle = ?,
         ciudad = ?,
         cp = ?,
         provincia = ?,
         tlfno = ?,
         eCorreo = ? WHERE usuario = ?";
         include_once __DIR__ . '/../../core/conexionBd.inc';
         include_once __DIR__ . '/../../fuente/modelo/usuario.inc';
         try{
             $con = (new conexionBd)->getConexion();
             $con->beginTransaction();
             $stmt = $con->prepare($sql);
             $stmt->bindParam(1,$nickUsuario,PDO::PARAM_STR);
             $stmt->bindParam(2,$contraseniaCodificada,PDO::PARAM_STR);
             $stmt->bindParam(3,$grupo,PDO::PARAM_STR);
             $stmt->bindParam(4,$nombreUsuario,PDO::PARAM_STR);
             $stmt->bindParam(5,$apellidosUsuario,PDO::PARAM_STR);
             $stmt->bindParam(6,$calleUsuario,PDO::PARAM_STR);
             $stmt->bindParam(7,$ciudadUsuario,PDO::PARAM_STR);
             $stmt->bindParam(8,$cpUsuario,PDO::PARAM_STR);
             $stmt->bindParam(9,$provinciaUsuario,PDO::PARAM_STR);
             $stmt->bindParam(10,$tlfnoUsuario,PDO::PARAM_STR);
             $stmt->bindParam(11,$eCorreoUsuario,PDO::PARAM_STR);
             $stmt->bindParam(12,$nickUsuario,PDO::PARAM_STR);

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
  }


public function comprobarUsuarioIdentificacion(string $usuarioN, string $contrasenia) :bool{
    include_once __DIR__ . '/../../core/conexionBd.inc';
    $con = (new ConexionBd())->getConexion();
    $ComprobarUsuario = true;

    //include_once __DIR__ . '/../../fuente/repositorio/usuarioRepositorio.inc';
    //$contraseniaCodificada = (new usuarioRepositorio)->codificarContrasenia($contrasenia);
    $sql = "SELECT contrasenia FROM dbo.usuario WHERE grupo LIKE 'usuarios' AND usuario = ?;";
      try{
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$usuarioN,PDO::PARAM_STR);
          if($stmt->execute()){
              $arrayContrasenia = $stmt->fetch(PDO::FETCH_ASSOC);
              if(password_verify($contrasenia,$arrayContrasenia['contrasenia'])){
                  $ComprobarUsuario = false;//coincide
              }else{
                  $ComprobarUsuario = true;
              }
          }else{
              $ComprobarUsuario = true;
          }
          $con->commit();
          return $ComprobarUsuario;
      }catch(PDOException $ex){
        throw $ex;
        $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }

  }//fin metodo

  public function comprobarAdministradorIdentificacion(string $usuarioN, string $contrasenia) :bool{
    include_once __DIR__ . '/../../core/conexionBd.inc';
    $con = (new ConexionBd())->getConexion();
    $ComprobarUsuario = true;

    //include_once __DIR__ . '/../../fuente/repositorio/usuarioRepositorio.inc';
    //$contraseniaCodificada = (new usuarioRepositorio)->codificarContrasenia($contrasenia);
    $sql = "SELECT contrasenia FROM dbo.usuario WHERE grupo LIKE 'admins' AND usuario = ?;";
      try{
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$usuarioN,PDO::PARAM_STR);
          if($stmt->execute()){
              $arrayContrasenia = $stmt->fetch(PDO::FETCH_ASSOC);
              if(password_verify($contrasenia,$arrayContrasenia['contrasenia'])){
                  $ComprobarUsuario = false;//coincide
              }else{
                  $ComprobarUsuario = true;
              }
          }else{
              $ComprobarUsuario = true;
          }
          $con->commit();
          return $ComprobarUsuario;
      }catch(PDOException $ex){
        throw $ex;
        $con->rollBack();
      }finally{
        $conexionBD = null;
        $stmt = null;
      }

    }//fin metodo

    //devolver array de usuarios
    public function devolverUsuarios() :array{
        $listaUsuarios = [];
        $contadorUsuarios = 0;
        $grupo = 'usuarios';
        $sql = "SELECT usuario,contrasenia,grupo,nombre,apellido,calle,ciudad,cp,provincia,tlfno,eCorreo FROM Usuario
            WHERE grupo = ?;";
        include_once __DIR__ . '/../../core/conexionBd.inc';
        $con = (new ConexionBd())->getConexion();
        include_once __DIR__ . '/../../fuente/modelo/usuario.inc';
        try{
            $con->beginTransaction();
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1,$grupo,PDO::PARAM_STR);
            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $usuario = new Usuario($row);
                    $listaUsuarios[$contadorUsuarios] = $usuario;
                    $contadorUsuarios++;
            }
            $con->commit();
            return $listaUsuarios;
        }catch(PDOException $ex){
            throw $ex;
            $con->rollBack();
        }finally{
            $stmt = null;
            $con = null;
        }
    }//fin metodo

    //devolver array de Administradores
    public function devolverAdministradores() :array{
        $listaAdm = [];
        $contadorAdm = 0;
        $grupo = 'admins';
        $sql = "SELECT usuario,contrasenia,grupo,nombre,apellido,calle,ciudad,cp,provincia,tlfno,eCorreo FROM Usuario
            WHERE grupo = ?;";
        include_once __DIR__ . '/../../core/conexionBd.inc';
        $con = (new ConexionBd())->getConexion();
        include_once __DIR__ . '/../../fuente/modelo/usuario.inc';
        try{
            $con->beginTransaction();
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1,$grupo,PDO::PARAM_STR);
            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $usuario = new Usuario($row);
                    $listaAdm[$contadorAdm] = $usuario;
                    $contadorAdm++;
            }
            $con->commit();
            return $listaAdm;
        }catch(PDOException $ex){
            throw $ex;
            $con->rollBack();
        }finally{
            $stmt = null;
            $con = null;
        }
    }//fin metodo

    //metodo para borrar usuarios
    public function borrarUsuario($nombreUsuario) :bool{
        $boolBorrado = false;
        $sql = "DELETE FROM Usuario WHERE usuario = ? ";
        include_once __DIR__ . '/../../core/conexionBd.inc';
        $con = (new ConexionBd())->getConexion();
        try{
            $con->beginTransaction();
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1,$nombreUsuario,PDO::PARAM_STR);
            if($stmt->execute()){
                $boolBorrado = true;
            }else{
                $boolBorrado = false;
            }
            $con->commit();
            return $boolBorrado;
        }catch(PDOException $ex){
            throw $ex;
            $con->rollBack();
        }finally{
            $stmt = null;
            $con = null;
        }
    }//fin metodo

    public function comprobarUsuarioExiste(string $nickUsuario) :bool{
        $respuesta = false;
        $sql = "SELECT usuario FROM Usuario ";
        include_once __DIR__ . '/../../core/conexionBd.inc';
        $con = (new ConexionBd())->getConexion();
        try{
            $con->beginTransaction();
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1,$nombreUsuario,PDO::PARAM_STR);
            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                if($row['usuario'] == $nickUsuario){
                    $respuesta = true;
                }
            }
            $con->commit();
            return $respuesta;
        }catch(PDOException $ex){
            throw $ex;
            $con->rollBack();
        }finally{
            $stmt = null;
            $con = null;
        }
    }//fin metodo


    //funcion para el telefono
    public function comprobarTelefono(string $tlfno): bool{
        if(!preg_match("/^[0-9]{9}$/", $tlfno)){
            return false;
        }
            return true;
    }
    //funcion para comprobar el email
    public function validarEmail(string $eCorreo): bool{
       if (!filter_var($eCorreo, FILTER_VALIDATE_EMAIL)){
          return false;
       }
          return true;
    }

    public function comprobarCodigoPostal(string $cp) :bool{
        if(!is_numeric($cp) && strlen($cp) != 5){
            return false;
        }else{
            return true;
        }
    }


}//fin clase
 ?>
