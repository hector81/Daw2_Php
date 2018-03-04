<?php

class usuarioController {

    public function inicioAdministrador(){
      include_once __DIR__ . "/../../app/plantillas/inicioAdministrador.php";
    }

    public function inicioUsuarioUsuario(){
      include_once __DIR__ . "/../../app/plantillas/inicioUsuarioUsuario.php";
    }

    //para administrar usuarios y añadirlos o eliminarlos
    public function administrarUsuarios(){
        include_once __DIR__ .'/../Repositorio/usuarioRepositorio.inc';
        $listaUsuarios =  (new UsuarioRepositorio())->devolverUsuarios();
        $listaAdministradores =  (new UsuarioRepositorio())->devolverAdministradores();
        include_once __DIR__ . "/../../app/plantillas/administrarUsuarios.php";
    }//fin metodo

    public function modificarUsuario(){
      $nickUsuario = $_POST['nickUsuario'];
      $provinciaUsuario = $_POST['provinciaUsuario'];
      $nombreUsuario = $_POST['nombreUsuario'];
      $apellidoUsuario = $_POST['apellidoUsuario'];
      $calleUsuario = $_POST['calleUsuario'];
      $cpUsuario = $_POST['cpUsuario'];
      $tlfnoUsuario = $_POST['tlfnoUsuario'];
      $emailUsuario = $_POST['emailUsuario'];
      $ciudadUsuario = $_POST['ciudadUsuario'];
      $contraseniaUsuario = $_POST['contraseniaUsuario'];
      $grupoUsuario = $_POST['grupoUsuario'];
      $error = "MODIFICANDO USUARIO O ADMINISTRADOR ".$_POST['nickUsuario']. " ,BORRA Y PON LOS NUEVOS DATOS";
      include_once __DIR__ . "/../../app/plantillas/modificarUsuario.php";
    }//fin metodo

    public function verUsuarioModificado(){
      include_once __DIR__ . "/../Repositorio/usuarioRepositorio.inc";
      $listaUsuarios =  (new UsuarioRepositorio())->devolverUsuarios();
      $listaAdministradores =  (new UsuarioRepositorio())->devolverAdministradores();
      if($_SERVER['REQUEST_METHOD']=='POST'){
          if(empty($_POST['nickUsuario']) && isset($_POST['nickUsuario'])){
              $error = 'Falta un nick de Usuario';include_once __DIR__ . "/../../app/plantillas/administrarUsuarios.php";
          }elseif(empty($_POST['passwordUsuario']) && isset($_POST['passwordUsuario'])){
              $error =  'Falta un password de Usuario';include_once __DIR__ . "/../../app/plantillas/administrarUsuarios.php";
          }elseif(empty($_POST['grupo']) && isset($_POST['grupo'])){
              $error =  'Falta un grupo';include_once __DIR__ . "/../../app/plantillas/administrarUsuarios.php";
          }elseif(empty($_POST['nombreUsuario']) && isset($_POST['nombreUsuario'])){
              $error =  'Falta un nombre de Usuario';include_once __DIR__ . "/../../app/plantillas/administrarUsuarios.php";
          }elseif(empty($_POST['apellidosUsuario']) && isset($_POST['apellidosUsuario'])){
              $error =  'Falta un apellido de Usuario';include_once __DIR__ . "/../../app/plantillas/administrarUsuarios.php";
          }elseif(empty($_POST['calleUsuario']) && isset($_POST['calleUsuario'])){
              $error =  'Falta un calle de Usuario';include_once __DIR__ . "/../../app/plantillas/administrarUsuarios.php";
          }elseif(empty($_POST['ciudadUsuario']) && isset($_POST['ciudadUsuario'])){
              $error =  'Falta un ciudad de Usuario';include_once __DIR__ . "/../../app/plantillas/administrarUsuarios.php";
          }elseif(empty($_POST['cpUsuario']) && isset($_POST['cpUsuario'])){
              $error =  'Falta un código postal';include_once __DIR__ . "/../../app/plantillas/administrarUsuarios.php";
          }elseif(empty($_POST['provinciaUsuario']) && isset($_POST['provinciaUsuario'])){
              $error =  'Falta un provincia de Usuario';include_once __DIR__ . "/../../app/plantillas/administrarUsuarios.php";
          }elseif(empty($_POST['tlfnoUsuario']) && isset($_POST['tlfnoUsuario'])){
              $error =  'Falta un teléfono de usuario';include_once __DIR__ . "/../../app/plantillas/administrarUsuarios.php";
          }elseif(empty($_POST['eCorreoUsuario']) && isset($_POST['eCorreoUsuario'])){
              $error =  'Falta un correo o email de usuario';include_once __DIR__ . "/../../app/plantillas/administrarUsuarios.php";
          }else{
              ////los datos son correctos
              $usuarioNuevoEnseñar =[];
              $nickUsuario = $_POST['nickUsuario'];
              $passwordUsuario = $_POST['passwordUsuario'];
              $grupo = $_POST['grupo'];
              $nombreUsuario = $_POST['nombreUsuario'];
              $apellidosUsuario = $_POST['apellidosUsuario'];
              $calleUsuario = $_POST['calleUsuario'];
              $ciudadUsuario = $_POST['ciudadUsuario'];
              $cpUsuario = $_POST['cpUsuario'];
              $provinciaUsuario = $_POST['provinciaUsuario'];
              $tlfnoUsuario = $_POST['tlfnoUsuario'];
              $eCorreoUsuario = $_POST['eCorreoUsuario'];
                //comprobamos que los datos de correo y telefono sean correctos
                if(!(new usuarioRepositorio)->comprobarTelefono($tlfnoUsuario)){
                    $error = "El campo teléfono debe tener nueve número y no contener letras";
                }elseif(!(new usuarioRepositorio)->validarEmail($eCorreoUsuario)){
                    $error = "El email debe ser correcto";
                }else{
                    $respuesta = (new usuarioRepositorio)->modificarUsuario($nickUsuario,$passwordUsuario,$grupo
                    ,$nombreUsuario,$apellidosUsuario,$calleUsuario,$ciudadUsuario,$cpUsuario,$provinciaUsuario,$tlfnoUsuario,$eCorreoUsuario);
                    if(!$respuesta){
                      $usuarioModificadoEnseñar= ['NICK USUARIO' => $nickUsuario,'CONTRASEÑA' => $passwordUsuario,'GRUPO' => $grupo
                      ,'NOMBRE USUARIO' => $nombreUsuario,'APELLIDOS' => $apellidosUsuario,'CALLE' => $calleUsuario,'CIUDAD' => $ciudadUsuario,
                      'CÓDIGO POSTAL' => $cpUsuario
                      ,'PROVINCIA' => $provinciaUsuario,'TELÉFONO' => $tlfnoUsuario,'EMAIL' => $eCorreoUsuario];
                      $error =  "El usuario acaba de ser modificado";
                      include_once __DIR__ . "/../../app/plantillas/verUsuarioModificado.php";
                    }else{
                      $error =  "El usuario no ha podido ser introducido";
                      include_once __DIR__ . "/../../app/plantillas/administrarUsuarios.php";
                    }
              }


          }
          include_once __DIR__ . "/../../app/plantillas/verUsuarioModificado.php";
        }
    }

    public function cerrarSesion(){
      $_SESSION = array();
      unset($_SESSION);//se carga todo los datos de la sesion
      session_destroy();
      //header('Location: http://localhost:8080/comercio/php/MVC/CadTien2018/index.php');
      //header('Location: http://localhost:8080/comercio/php/MVC/CadTien2018%20-%20copia/index.php');
      //header('Location: http://localhost/MVC/CadTien2018%20-%20copia//index.php');
      header('Location: index.php');
    }//fin metodo

    public function inicio()
      { $params = array('mensaje' => 'Bienvenido a la Cadena de Tiendas Media',
                        'fecha' => date('d-m-Y'),);
        require __DIR__ . '/../../app/plantillas/inicio.php';
      }

    public function introducirUsuarioNuevo(){
      //solo nos lleva a la página
      include_once __DIR__ . "/../../app/plantillas/introducirUsuarioNuevo.php";
    }

    function verUsuarioNuevoIntroducido(){
      include_once __DIR__ . "/../Repositorio/usuarioRepositorio.inc";
      if($_SERVER['REQUEST_METHOD']=='POST'){
          if(empty($_POST['nickUsuario']) && isset($_POST['nickUsuario'])){
              $error = 'Falta un nick de Usuario';include_once __DIR__ . "/../../app/plantillas/introducirUsuarioNuevo.php";
          }elseif(empty($_POST['passwordUsuario']) && isset($_POST['passwordUsuario'])){
              $error =  'Falta un password de Usuario';include_once __DIR__ . "/../../app/plantillas/introducirUsuarioNuevo.php";
          }elseif(empty($_POST['grupo']) && isset($_POST['grupo'])){
              $error =  'Falta un grupo';include_once __DIR__ . "/../../app/plantillas/introducirUsuarioNuevo.php";
          }elseif(empty($_POST['nombreUsuario']) && isset($_POST['nombreUsuario'])){
              $error =  'Falta un nombre de Usuario';include_once __DIR__ . "/../../app/plantillas/introducirUsuarioNuevo.php";
          }elseif(empty($_POST['apellidosUsuario']) && isset($_POST['apellidosUsuario'])){
              $error =  'Falta un apellido de Usuario';include_once __DIR__ . "/../../app/plantillas/introducirUsuarioNuevo.php";
          }elseif(empty($_POST['calleUsuario']) && isset($_POST['calleUsuario'])){
              $error =  'Falta un calle de Usuario';include_once __DIR__ . "/../../app/plantillas/introducirUsuarioNuevo.php";
          }elseif(empty($_POST['ciudadUsuario']) && isset($_POST['ciudadUsuario'])){
              $error =  'Falta un ciudad de Usuario';include_once __DIR__ . "/../../app/plantillas/introducirUsuarioNuevo.php";
          }elseif(empty($_POST['cpUsuario']) && isset($_POST['cpUsuario'])){
              $error =  'Falta un código postal';include_once __DIR__ . "/../../app/plantillas/introducirUsuarioNuevo.php";
          }elseif(empty($_POST['provinciaUsuario']) && isset($_POST['provinciaUsuario'])){
              $error =  'Falta un provincia de Usuario';include_once __DIR__ . "/../../app/plantillas/introducirUsuarioNuevo.php";
          }elseif(empty($_POST['tlfnoUsuario']) && isset($_POST['tlfnoUsuario'])){
              $error =  'Falta un teléfono de usuario';include_once __DIR__ . "/../../app/plantillas/introducirUsuarioNuevo.php";
          }elseif(empty($_POST['eCorreoUsuario']) && isset($_POST['eCorreoUsuario'])){
              $error =  'Falta un correo o email de usuario';include_once __DIR__ . "/../../app/plantillas/introducirUsuarioNuevo.php";
          }else{
              ////los datos son correctos
              $usuarioNuevoEnseñar =[];
              $nickUsuario = $_POST['nickUsuario'];
              $passwordUsuario = $_POST['passwordUsuario'];
              $grupo = $_POST['grupo'];
              $nombreUsuario = $_POST['nombreUsuario'];
              $apellidosUsuario = $_POST['apellidosUsuario'];
              $calleUsuario = $_POST['calleUsuario'];
              $ciudadUsuario = $_POST['ciudadUsuario'];
              $cpUsuario = $_POST['cpUsuario'];
              $provinciaUsuario = $_POST['provinciaUsuario'];
              $tlfnoUsuario = $_POST['tlfnoUsuario'];
              $eCorreoUsuario = $_POST['eCorreoUsuario'];
              if((new usuarioRepositorio)->comprobarUsuarioExiste($nickUsuario)){//comprobamos que el usuario nick no este ya
                  $error = "El nick usuario ya está en uso por otra persona";include_once __DIR__ . "/../../app/plantillas/introducirUsuarioNuevo.php";
              }else{
                //comprobamos que los datos de correo y telefono sean correctos
                if(!(new usuarioRepositorio)->comprobarTelefono($tlfnoUsuario)){
                    $error = "El campo teléfono debe tener nueve número y no contener letras";
                }elseif(!(new usuarioRepositorio)->validarEmail($eCorreoUsuario)){
                    $error = "El email debe ser correcto";
                }else{
                    $respuesta = (new usuarioRepositorio)->introducirUsuario($nickUsuario,$passwordUsuario,$grupo
                    ,$nombreUsuario,$apellidosUsuario,$calleUsuario,$ciudadUsuario,$cpUsuario,$provinciaUsuario,$tlfnoUsuario,$eCorreoUsuario);
                    if(!$respuesta){
                      $usuarioNuevoEnseñar= ['NICK USUARIO' => $nickUsuario,'CONTRASEÑA' => $passwordUsuario,'GRUPO' => $grupo
                      ,'NOMBRE USUARIO' => $nombreUsuario,'APELLIDOS' => $apellidosUsuario,'CALLE' => $calleUsuario,'CIUDAD' => $ciudadUsuario,
                      'CÓDIGO POSTAL' => $cpUsuario
                      ,'PROVINCIA' => $provinciaUsuario,'TELÉFONO' => $tlfnoUsuario,'EMAIL' => $eCorreoUsuario];
                      $error =  "El usuario acaba de ser introducido";
                      include_once __DIR__ . "/../../app/plantillas/verUsuarioNuevoIntroducido.php";
                    }else{
                      $error =  "El usuario no ha podido ser introducido";
                      include_once __DIR__ . "/../../app/plantillas/introducirUsuarioNuevo.php";
                    }
                }
                ////////////////
              }


          }
          include_once __DIR__ . "/../../app/plantillas/introducirUsuarioNuevo.php";
        }
    }//fin metodo

    public function inicioUsuario(){
      $params = array('mensaje' => 'Bienvenido a la Cadena de Tiendas Media', 'fecha' => date('d-m-Y'));
      include_once __DIR__ . "/../Repositorio/usuarioRepositorio.inc";
      if($_SERVER['REQUEST_METHOD']=='POST'){
          if(empty($_POST['userNombre']) && isset($_POST['userNombre'])){
              $error = 'Falta el campo usuario';include_once __DIR__ . "/../../app/plantillas/inicio.php";
          }elseif(empty($_POST['contraseniaUser']) && isset($_POST['contraseniaUser'])){
              $error =  'Falta el campo contraseña';include_once __DIR__ . "/../../app/plantillas/inicio.php";
          }elseif(empty($_POST['grupoUser']) && isset($_POST['grupoUser'])){
              $error =  'Falta el campo grupo';include_once __DIR__ . "/../../app/plantillas/inicio.php";
          }else{
              if($_POST['grupoUser']=='Usuario'){
                  $respuesta = (new usuarioRepositorio)->comprobarUsuarioIdentificacion($_POST['userNombre'], $_POST['contraseniaUser']);
                  if(!$respuesta){
                      //PARA ENVIAR EL USUARIO
                      $userNombre = $_POST['userNombre'];
                      $grupoUser = $_POST['grupoUser'];
                      $_SESSION['userNombre'] = $userNombre;
                      $_SESSION['grupoUser'] = $grupoUser;
                      $_SESSION['userNombre'] = $_SESSION['userNombre'];
                      $_SESSION['grupoUser'] = $_SESSION['grupoUser'];
                      $_SESSION['contraseniaUser'] = $_POST['contraseniaUser'];
                      include_once __DIR__ . "/../../app/plantillas/inicioUsuario.php";
                  }else{
                      $error =  'Los datos no son correctos';
                      include_once __DIR__ . "/../../app/plantillas/inicio.php";

                  }
              }elseif($_POST['grupoUser']=='Administrador'){
                  $respuesta = (new usuarioRepositorio)->comprobarAdministradorIdentificacion($_POST['userNombre'], $_POST['contraseniaUser']);
                  if(!$respuesta){
                      //PARA ENVIAR EL USUARIO
                      $userNombre = $_POST['userNombre'];
                      $grupoUser = $_POST['grupoUser'];
                      $_SESSION['userNombre'] = $userNombre;
                      $_SESSION['grupoUser'] = $grupoUser;
                      $_SESSION['userNombre'] = $_SESSION['userNombre'];
                      $_SESSION['grupoUser'] = $_SESSION['grupoUser'];
                      $_SESSION['contraseniaUser'] = $_POST['contraseniaUser'];
                      include_once __DIR__ . "/../../app/plantillas/inicioAdministrador.php";
                  }else{
                      $error =  'Los datos no son correctos';
                      include_once __DIR__ . "/../../app/plantillas/inicio.php";

                  }
              }
          }
      }

    }//fin metodo

    //para borrar usuarios
    public function borrarUsuario(){
        include_once __DIR__ .'/../Repositorio/usuarioRepositorio.inc';
        if($_SERVER['REQUEST_METHOD']=='POST'){
              $booleanoBorrado =  (new UsuarioRepositorio())->borrarUsuario($_POST['nombreUsuario']);
              if($booleanoBorrado){
                  $error = 'El usuario ha sido borrado';
              }else{
                  $error = 'El usuario no ha sido borrado';
              }
        }//fin if
        $listaUsuarios =  (new UsuarioRepositorio())->devolverUsuarios();
        $listaAdministradores =  (new UsuarioRepositorio())->devolverAdministradores();
        include_once __DIR__ . "/../../app/plantillas/mostrarUusuariosBorrado.php";
    }//fin metodo


    public function verUserIntroducidoByAdministrador(){
      include_once __DIR__ . "/../Repositorio/usuarioRepositorio.inc";
      if($_SERVER['REQUEST_METHOD']=='POST'){
          if(empty($_POST['nickUsuario']) && isset($_POST['nickUsuario'])){
              $error = 'Falta un nick de Usuario';include_once __DIR__ . "/../../app/plantillas/introducirUsuarioAdministrador.php";
          }elseif(empty($_POST['passwordUsuario']) && isset($_POST['passwordUsuario'])){
              $error =  'Falta un password';include_once __DIR__ . "/../../app/plantillas/introducirUsuarioAdministrador.php";
          }elseif(empty($_POST['grupoUserAdm']) && isset($_POST['grupoUserAdm'])){
              $error =  'Falta un grupo';include_once __DIR__ . "/../../app/plantillas/introducirUsuarioAdministrador.php";
          }elseif(empty($_POST['nombreUsuario']) && isset($_POST['nombreUsuario'])){
              $error =  'Falta un nombre';include_once __DIR__ . "/../../app/plantillas/introducirUsuarioAdministrador.php";
          }elseif(empty($_POST['apellidosUsuario']) && isset($_POST['apellidosUsuario'])){
              $error =  'Falta un apellido';include_once __DIR__ . "/../../app/plantillas/introducirUsuarioAdministrador.php";
          }elseif(empty($_POST['calleUsuario']) && isset($_POST['calleUsuario'])){
              $error =  'Falta una calle';include_once __DIR__ . "/../../app/plantillas/introducirUsuarioAdministrador.php";
          }elseif(empty($_POST['ciudadUsuario']) && isset($_POST['ciudadUsuario'])){
              $error =  'Falta una ciudad';include_once __DIR__ . "/../../app/plantillas/introducirUsuarioAdministrador.php";
          }elseif(empty($_POST['cpUsuario']) && isset($_POST['cpUsuario'])){
              $error =  'Falta un codigo postal';include_once __DIR__ . "/../../app/plantillas/introducirUsuarioAdministrador.php";
          }elseif(empty($_POST['provinciaUsuario']) && isset($_POST['provinciaUsuario'])){
              $error =  'Falta una provincia';include_once __DIR__ . "/../../app/plantillas/introducirUsuarioAdministrador.php";
          }elseif(empty($_POST['tlfnoUsuario']) && isset($_POST['tlfnoUsuario'])){
              $error =  'Falta un teléfono';include_once __DIR__ . "/../../app/plantillas/introducirUsuarioAdministrador.php";
          }elseif(empty($_POST['eCorreoUsuario']) && isset($_POST['eCorreoUsuario'])){
              $error =  'Falta un email';include_once __DIR__ . "/../../app/plantillas/introducirUsuarioAdministrador.php";
          }else{
              ////los datos son correctos
              $usuarioNuevoEnseñar =[];
              $nickUsuario = $_POST['nickUsuario'];
              $passwordUsuario = $_POST['passwordUsuario'];
              $grupo = $_POST['grupoUserAdm'];
              $nombreUsuario = $_POST['nombreUsuario'];
              $apellidosUsuario = $_POST['apellidosUsuario'];
              $calleUsuario = $_POST['calleUsuario'];
              $ciudadUsuario = $_POST['ciudadUsuario'];
              $cpUsuario = $_POST['cpUsuario'];
              $provinciaUsuario = $_POST['provinciaUsuario'];
              $tlfnoUsuario = $_POST['tlfnoUsuario'];
              $eCorreoUsuario = $_POST['eCorreoUsuario'];
              if(!(new usuarioRepositorio)->comprobarTelefono($tlfnoUsuario)){
                  $error = "El campo teléfono debe tener nueve número y no contener letras";
              }elseif(!(new usuarioRepositorio)->validarEmail($eCorreoUsuario)){
                  $error = "El email debe ser correcto";
              }elseif(!(new usuarioRepositorio)->comprobarCodigoPostal($cpUsuario)){
                  $error = "El código postal debe tener 5 números y debe ser numérico";
              }elseif($grupo == 'admins' || $grupo == 'usuarios'){
                  $respuesta = (new usuarioRepositorio)->introducirUsuario($nickUsuario,$passwordUsuario,$grupo
                  ,$nombreUsuario,$apellidosUsuario,$calleUsuario,$ciudadUsuario,$cpUsuario,$provinciaUsuario,$tlfnoUsuario,$eCorreoUsuario);
                  if(!$respuesta){
                    $usuarioNuevoEnseñar= ['NICK USUARIO' => $nickUsuario,'CONTRASEÑA' => $passwordUsuario,'GRUPO' => $grupo
                    ,'NOMBRE USUARIO' => $nombreUsuario,'APELLIDOS' => $apellidosUsuario,'CALLE' => $calleUsuario,'CIUDAD' => $ciudadUsuario,
                    'CÓDIGO POSTAL' => $cpUsuario
                    ,'PROVINCIA' => $provinciaUsuario,'TELÉFONO' => $tlfnoUsuario,'EMAIL' => $eCorreoUsuario];
                    $error =  "El usuario acaba de ser introducido";
                    include_once __DIR__ . "/../../app/plantillas/verUserIntroducidoByAdministrador.php";
                  }else{
                    $error =  "El usuario no ha podido ser introducido";
                    include_once __DIR__ . "/../../app/plantillas/introducirUsuarioNuevo.php";
                  }
              }

          }
          include_once __DIR__ . "/../../app/plantillas/introducirUsuarioNuevo.php";
        }
    }//fin metodo


    public function introducirUsuarioAdministrador(){
      $_SESSION['userNombre'] = $_SESSION['userNombre'];
      $_SESSION['grupoUser'] = $_SESSION['grupoUser'];
        include_once __DIR__ . "/../../app/plantillas/introducirUsuarioAdministrador.php";
    }//fin metodo





}//fin clase


 ?>
