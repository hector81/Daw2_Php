<?php

class UsuarioRepositorio
{
  public function comprobarEmailExiste(string $email) :bool{
    include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
    $con = (new ConexionBaseDatos)->getConexion();
    $comprobarUsuario = false;
    $sql = "SELECT Email FROM dbo.usuario WHERE Email = ?;";
      try{
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$email,PDO::PARAM_STR);
          $stmt->execute();
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              if($row['Email'] == $email){
                  $comprobarUsuario = true;//devolvera true si existe
              }
          }
          $con->commit();
          return $comprobarUsuario;
      }catch(PDOException $ex){
        throw $ex;
        $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }
  }//fin metodo

  public function devolverContraseniaUsuario(string $email) :string{
    include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
    $con = (new ConexionBaseDatos)->getConexion();
    $password = '';
    $sql = "SELECT Contrasenia FROM dbo.usuario WHERE Email = ?;";
      try{
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$email,PDO::PARAM_STR);
          $stmt->execute();
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              $password = $row['Contrasenia'];//devolvera la contraseña codificada
          }
          $con->commit();
          return $password;
      }catch(PDOException $ex){
        throw $ex;
        $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }
  }//fin metodo

  public function comprobarUsuarioExiste(string $usuario) :bool{
    include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
    $con = (new ConexionBaseDatos)->getConexion();
    $comprobarUsuario = false;
    $sql = "SELECT Usuario.usuario AS USER_NICK  FROM usuario WHERE Usuario.usuario = ?;";
      try{
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$usuario,PDO::PARAM_STR);
          $stmt->execute();
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              if($row['USER_NICK'] == $usuario){
                  $comprobarUsuario = true;//devolvera true si existe
              }
          }
          $con->commit();
          return $comprobarUsuario;
      }catch(PDOException $ex){
        throw $ex;
        $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }
  }//fin metodo

  //Con esta funcion comprobamos que el dni es valido
  public function validarDni(string $dni) :bool{
    $boolDni = false;
    $numeros=  substr($dni,0,8);
    $letra = strtoupper(substr($dni,-1));
    if (substr("TRWAGMYFPDXBNJZSQVHLCKE",$numeros%23,1) == $letra){
      $boolDni = true;
    }else{
      $boolDni = false;
    }
    return $boolDni;
  }

  //Con esta funcion comprobamos que el dni tiene un formato valido
  public function comprobarFormatoDni(string $dni) :bool{
    $boolDni = true;
    $ultimaLetra=  substr($dni,-1);
    $primerosOchoNumeros =substr($dni,0,8);
    if (strlen($dni) != 9){ //comprobamos que la longitud no sea diferente a 9
      $boolDni = false;
    }
    if(!is_numeric($primerosOchoNumeros)){//comprobamos que los 8 primeros caracteres sean numeros
      $boolDni = false;
    }
    if(is_numeric($ultimaLetra)){//comprobamos que el ultimo caracter sea una letra
      $boolDni = false;
    }
    return $boolDni;
  }

  public function comprobarDniRepetido(string $dni) :bool{
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      $con = (new ConexionBaseDatos)->getConexion();
      $ComprobarDniRepetido = true;
      $sql = "SELECT COUNT(Nif) AS CONTADOR FROM dbo.usuario WHERE Nif = ?";
        try{
            $con->beginTransaction();
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1,$dni,PDO::PARAM_STR);
            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                if($row['CONTADOR'] > 0){
                    $ComprobarDniRepetido = false;
                }
            }
            $con->commit();
            return $ComprobarDniRepetido;
        }catch(PDOException $ex){
          throw $ex;
          $con->rollBack();
        }finally{
          $con = null;
          $stmt = null;
        }
  }//fin metodo

  public function comprobarUsuarioContrasenia(string $email, string $contrasenia) :bool{
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      $con = (new ConexionBaseDatos)->getConexion();
      $ComprobarUsuario = true;
      $sql = "SELECT contrasenia FROM dbo.usuario WHERE Email = ?;";
        try{
            $con->beginTransaction();
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1,$email,PDO::PARAM_STR);
            if($stmt->execute()){
                $arrayContrasenia = $stmt->fetch(PDO::FETCH_ASSOC);
                if(password_verify($contrasenia,$arrayContrasenia['contrasenia'])){
                    $ComprobarUsuario = false;//coincide
                }else{
                    $ComprobarUsuario = true;//no coincide
                }
            }else{
                $ComprobarUsuario = true;//no hace bien la select
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

  public function devolverGrupo(string $email) :int{
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      $con = (new ConexionBaseDatos)->getConexion();
      $grupo = 3;
      $sql = "SELECT IdGrupoUsuario FROM dbo.usuario WHERE Email = ?;";
        try{
            $con->beginTransaction();
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1,$email,PDO::PARAM_STR);
            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $grupo = $row['IdGrupoUsuario'];
            }
            $con->commit();
            return $grupo;
        }catch(PDOException $ex){
          throw $ex;
          $con->rollBack();
        }finally{
          $con = null;
          $stmt = null;
        }
  }//fin metodo

  public function devolverTodosUsuarios() :array{
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      $con = (new ConexionBaseDatos)->getConexion();
      $usuario = [];$administrador = [];$usuarioArray = [];$administradorArray  = [];$listaUsuarios = [];
      $comprobarUsuario = false;
      $sql = "SELECT IdGrupoUsuario, Usuario AS NICK_USUARIO,Nombre, PrimerApellido,SegundoApellido,Telefono,Nif, Email  FROM usuario;";
        try{
            $con->beginTransaction();
            $stmt = $con->prepare($sql);
            $stmt->bindParam(1,$email,PDO::PARAM_STR);
            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                if($row['IdGrupoUsuario']==2){
                  $usuario = [
                    'IdGrupoUsuario' => $row['IdGrupoUsuario'],
                    'NICK_USUARIO' => $row['NICK_USUARIO'],
                    'Nombre' => $row['Nombre'],
                    'PrimerApellido' => $row['PrimerApellido'],
                    'SegundoApellido' => $row['SegundoApellido'],
                    'Telefono' => $row['Telefono'],
                    'Nif' => $row['Nif'],
                    'Email' => $row['Email']
                  ];
                  $usuarioArray[] = $usuario;
                }
                if($row['IdGrupoUsuario']==1){
                  $administrador = [
                    'IdGrupoUsuario' => $row['IdGrupoUsuario'],
                    'NICK_USUARIO' => $row['NICK_USUARIO'],
                    'Nombre' => $row['Nombre'],
                    'PrimerApellido' => $row['PrimerApellido'],
                    'SegundoApellido' => $row['SegundoApellido'],
                    'Telefono' => $row['Telefono'],
                    'Nif' => $row['Nif'],
                    'Email' => $row['Email']
                  ];
                  $administradorArray[] = $administrador;
                }
            }
            $listaUsuarios = [
                'usuarioArray' => $usuarioArray,
                'administradorArray' => $administradorArray
            ];
            $con->commit();
            return $listaUsuarios;
        }catch(PDOException $ex){
          throw $ex;
          $con->rollBack();
        }finally{
          $con = null;
          $stmt = null;
        }
  }//fin metodo

  public function borrarUsuarios(string $email) :bool{
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      $con = (new ConexionBaseDatos)->getConexion();
      $boolBorrado = false;
      $sql = "DELETE FROM Usuario WHERE Email = ? ";
      try{
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$email,PDO::PARAM_STR);
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

  public function devolverUsuario(string $email) :array{
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      include_once __DIR__ . '/../../fuente/modelo/usuario.inc';
      $con = (new ConexionBaseDatos)->getConexion();
      $sql = "SELECT Usuario,Contrasenia,IdGrupoUsuario,Nombre,PrimerApellido,SegundoApellido,IdCiudad,Telefono,Direccion,Nif,Fax,Email
              FROM usuario
              WHERE Email = ?;";
      try{
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$email,PDO::PARAM_STR);
          $stmt->execute();
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              $usuario[] = new Usuario($row);
          }
          $con->commit();
          return $usuario;
      }catch(PDOException $ex){
        throw $ex;
        $con->rollBack();
      }finally{
        $con = null;
        $stmt = null;
      }
  }//fin metodo

  public function devolverGrupoUsuario(string $email) :string{
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      $con = (new ConexionBaseDatos)->getConexion();
      $grupo='';
      $sql = "SELECT Grupo FROM GrupoUsuario
              JOIN Usuario ON Usuario.IdGrupoUsuario = GrupoUsuario.IdGrupoUsuario
              WHERE Usuario.Email = ?; ";
      try{
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$email,PDO::PARAM_STR);
          $stmt->execute();
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              $grupo =  $row['Grupo'];
          }
          $con->commit();
          return $grupo;
      }catch(PDOException $ex){
          throw $ex;
          $con->rollBack();
      }finally{
          $stmt = null;
          $con = null;
      }
  }//fin metodo

  public function devolverCiudadUsuario(string $email) :string{
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      $con = (new ConexionBaseDatos)->getConexion();
      $ciudad='';
      $sql = "SELECT NombreCiudad FROM Ciudades
              JOIN Usuario ON Usuario.IdCiudad = Ciudades.IdCiudad
              WHERE Usuario.Email = ?; ";
      try{
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$email,PDO::PARAM_STR);
          $stmt->execute();
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              $ciudad =  $row['NombreCiudad'];
          }
          $con->commit();
          return $ciudad;
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
  }//fin metodo
  //funcion para comprobar el email
  public function validarEmail(string $eCorreo): bool{
     if (!filter_var($eCorreo, FILTER_VALIDATE_EMAIL)){
        return false;
     }
        return true;
  }//fin metodo

  //funcion para modificar usuario
  public function modificarUsuario(string $nickUsuario,string $nombreUsuario,string $apellidos1,string $apellidos2,string $direccionUsuario
      ,string $ciudadUsuario,string $tlfnoUsuario,string $nifUsuario,string $eCorreoUsuario,string $faxUsuario,string $emailAntiguo
      ,string $contraseniaUsuarioNUEVA,string $contraseniaUsuarioVIEJA) :bool{
        $respuesta = true;//$emailAntiguo
     $sql ="UPDATE usuario SET
      Usuario = ?,
      Nombre = ?,
      PrimerApellido = ?,
      SegundoApellido = ?,
      Telefono = ?,
      Direccion = ?,
      Nif = ?,
      Fax = ?,
      Email = ?,
      Contrasenia = ? WHERE Email = ?";
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      try{
          $con = (new ConexionBaseDatos)->getConexion();
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$nickUsuario,PDO::PARAM_STR);
          $stmt->bindParam(2,$nombreUsuario,PDO::PARAM_STR);
          $stmt->bindParam(3,$apellidos1,PDO::PARAM_STR);
          $stmt->bindParam(4,$apellidos2,PDO::PARAM_STR);
          $stmt->bindParam(5,$tlfnoUsuario,PDO::PARAM_STR);
          $stmt->bindParam(6,$direccionUsuario,PDO::PARAM_STR);
          $stmt->bindParam(7,$nifUsuario,PDO::PARAM_STR);
          $stmt->bindParam(8,$faxUsuario,PDO::PARAM_STR);
          $stmt->bindParam(9,$eCorreoUsuario,PDO::PARAM_STR);
          //esto es por si ha introducido un password vacio, entonces se introduce la antigua
          if($contraseniaUsuarioNUEVA == ''){
              $stmt->bindParam(10,$contraseniaUsuarioVIEJA,PDO::PARAM_STR);
          }else{
              $contraseniaCodificada = password_hash($contraseniaUsuarioNUEVA, PASSWORD_DEFAULT);//codificarContrasenia, es un string lo que da
              $stmt->bindParam(10,$contraseniaCodificada,PDO::PARAM_STR);
          }
          $stmt->bindParam(11,$emailAntiguo,PDO::PARAM_STR);
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


  public function introducirUsuario(string $nickUsuario,string $contrasenia,int $idGrupoUsuario, string $nombre,
  string $primerApellido,string $segundoApellido
  ,int $idCiudad,string $telefono,string $direccionUsuario,string $nifUsuario,
  string $faxUsuario,string $emailUsuario) :bool{
      $contraseniaCodificada = password_hash($contrasenia, PASSWORD_DEFAULT);//codificarContrasenia, es un string lo que da
      $sql = "INSERT INTO Usuario(
        Usuario, Contrasenia, IdGrupoUsuario, Nombre, PrimerApellido, SegundoApellido, IdCiudad, Telefono, Direccion, Nif,Fax, Email)
         VALUES(?,?,?,?,?,?,?,?,?,?,?,?);";
      $respuesta = true;
      include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
      try{
          $con = (new ConexionBaseDatos)->getConexion();
          $con->beginTransaction();
          $stmt = $con->prepare($sql);
          $stmt->bindParam(1,$nickUsuario,PDO::PARAM_STR);
          $stmt->bindParam(2,$contraseniaCodificada,PDO::PARAM_STR);
          $stmt->bindParam(3,$idGrupoUsuario,PDO::PARAM_INT);
          $stmt->bindParam(4,$nombre,PDO::PARAM_STR);
          $stmt->bindParam(5,$primerApellido,PDO::PARAM_STR);
          $stmt->bindParam(6,$segundoApellido,PDO::PARAM_STR);
          $stmt->bindParam(7,$idCiudad,PDO::PARAM_INT);
          $stmt->bindParam(8,$telefono,PDO::PARAM_STR);
          $stmt->bindParam(9,$direccionUsuario,PDO::PARAM_STR);
          $stmt->bindParam(10,$nifUsuario,PDO::PARAM_STR);
          $stmt->bindParam(11,$faxUsuario,PDO::PARAM_STR);
          $stmt->bindParam(12,$emailUsuario,PDO::PARAM_STR);
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


}//fin clase
