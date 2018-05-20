<?php

class UsuarioController
{
    //este metodo te dirige a la pagina inicio
    public function inicio(){
        include_once __DIR__ . '/../../app/plantillas/visitante/inicio.php';
    }

    public function inicioAdministrador(){
        include_once __DIR__ . '/../../app/plantillas/administrador/inicioAdministrador.php';
    }

    public function inicioUsuario(){
        include_once __DIR__ . '/../../app/plantillas/usuario/inicioUsuario.php';
    }

    public function inicioUsuarioComprobar(){
      require_once __DIR__ . '/../Repositorio/usuarioRepositorio.inc';
      include_once __DIR__ . "/../Repositorio/librosRepositorio.inc";
      $librosPaginaPrincipal = (new LibrosRepositorio)->mostrarlibrosPaginaPrincipal();//es un multarray de 2
      if($_SERVER['REQUEST_METHOD']=='POST'){
          if(empty($_POST['email']) && isset($_POST['password'])){
              $error = 'Falta el campo usuario';include_once __DIR__ . "/../../app/plantillas/visitante/inicio.php";
          }elseif(empty($_POST['password']) && isset($_POST['password'])){
              $error =  'Falta el campo contraseña';include_once __DIR__ . "/../../app/plantillas/visitante/inicio.php";
          }else{
                if(!empty($_POST['email']) && !empty($_POST['password'])){
                    $comprobarEmail = (new UsuarioRepositorio)->comprobarEmailExiste($_POST['email']);//comprobamos que el email existe
                    if ($comprobarEmail) {
                        $comprobarContrasenia = (new UsuarioRepositorio)->comprobarUsuarioContrasenia($_POST['email'],$_POST['password']);//comprobamos contraseña
                        if(!$comprobarContrasenia){
                            $devolverGrupo= (new UsuarioRepositorio)->devolverGrupo($_POST['email']);//comprobamos el grupo
                            if($devolverGrupo == 1){
                                $_SESSION['userNombre'] = $_POST['email'];
                                $_SESSION['grupoUser'] = 'administradores';
                                $error = 'Bienvendio';include_once __DIR__ . '/../../app/plantillas/administrador/inicioAdministrador.php';
                            }elseif($devolverGrupo == 2){
                                $_SESSION['userNombre'] = $_POST['email'];
                                $_SESSION['grupoUser'] = 'usuarios';
                                $error = 'Bienvendio';include_once __DIR__ . '/../../app/plantillas/usuario/inicioUsuario.php';
                            }else{
                              $_SESSION['userNombre'] = 'Visitante';
                              $_SESSION['grupoUser'] = 'visitantes';
                              $error = 'Ha habido algún error';include_once __DIR__ . "/../../app/plantillas/visitante/inicio.php";
                            }
                        }else{
                            $error = 'El email existe pero la contraseña es incorrecta';include_once __DIR__ . "/../../app/plantillas/visitante/inicio.php";
                        }
                    }else{
                        $error = 'Usuario o contraseña erróneos';include_once __DIR__ . "/../../app/plantillas/visitante/inicio.php";
                    }
                }
          }
       }
     }//fin metodo

     public function modificarUsuario(){
       include_once __DIR__ . '/../Repositorio/usuarioRepositorio.inc';
       $usuario = (new UsuarioRepositorio())->devolverUsuario($_GET['email']);
       $grupoUsuario = (new UsuarioRepositorio())->devolverGrupoUsuario($_GET['email']);
       $ciudadUsuario = (new UsuarioRepositorio())->devolverCiudadUsuario($_GET['email']);
       $emailAntiguo = $_GET['email'];
       include_once __DIR__ . '/../../app/plantillas/administrador/modificarUsuario.php';
     }//fin metodo

     public function enviarDatosModificacionUsuario(){
       include_once __DIR__ . "/../Repositorio/usuarioRepositorio.inc";
       if($_SERVER['REQUEST_METHOD']=='POST'){
          if(empty($_POST['nickUsuario']) && isset($_POST['nickUsuario'])){
              $error = 'Falta un nick de Usuario';
          }elseif(empty($_POST['nombreUsuario']) && isset($_POST['nombreUsuario'])){
              $error =  'Falta un nombre de Usuario';
          }elseif(empty($_POST['apellidos1']) && isset($_POST['apellidos1'])){
              $error =  'Falta el primer apellido de Usuario';
          }elseif(empty($_POST['apellidos2']) && isset($_POST['apellidos2'])){
              $error =  'Falta el segundo apellido de Usuario';
          }elseif(empty($_POST['direccionUsuario']) && isset($_POST['direccionUsuario'])){
              $error =  'Falta la direccion de Usuario';
          }elseif(empty($_POST['ciudadUsuario']) && isset($_POST['ciudadUsuario'])){
              $error =  'Falta un ciudad de Usuario';
          }elseif(empty($_POST['tlfnoUsuario']) && isset($_POST['tlfnoUsuario'])){
              $error =  'Falta un teléfono de usuario';
          }elseif(empty($_POST['nifUsuario']) && isset($_POST['nifUsuario'])){
              $error =  'Falta el nif de Usuario';
          }elseif(empty($_POST['eCorreoUsuario']) && isset($_POST['eCorreoUsuario'])){
              $error =  'Falta un correo o email de usuario';
          }elseif(empty($_POST['faxUsuario']) && isset($_POST['faxUsuario'])){
              $error =  'Falta un fax de usuario';
          }else{
              ////los datos son correctos
              $nickUsuario = $_POST['nickUsuario'];
              $nombreUsuario = $_POST['nombreUsuario'];
              $apellidos1 = $_POST['apellidos1'];
              $apellidos2 = $_POST['apellidos2'];
              $direccionUsuario = $_POST['direccionUsuario'];
              $ciudadUsuario = $_POST['ciudadUsuario'];
              $tlfnoUsuario = $_POST['tlfnoUsuario'];
              $nifUsuario = $_POST['nifUsuario'];
              $eCorreoUsuario = $_POST['eCorreoUsuario'];
              $faxUsuario = $_POST['faxUsuario'];
              $emailAntiguo = $_POST['emailAntiguo'];//el mail que tenia antes
              $contraseniaUsuarioNUEVA = $_POST['contraseniaUsuarioNUEVA'];
              $contraseniaUsuarioVIEJA =(new UsuarioRepositorio)->devolverContraseniaUsuario($emailAntiguo);
                //comprobamos que los datos de correo y telefono sean correctos
                if(!(new UsuarioRepositorio)->comprobarTelefono($tlfnoUsuario)){
                    $error = "El campo teléfono debe tener nueve número y no contener letras";
                }elseif(!(new UsuarioRepositorio)->validarEmail($eCorreoUsuario)){
                    $error = "El email debe ser correcto";
                }else{
                    $insercion = (new UsuarioRepositorio)->modificarUsuario($nickUsuario,$nombreUsuario,$apellidos1,$apellidos2,$direccionUsuario
                        ,$ciudadUsuario,$tlfnoUsuario,$nifUsuario,$eCorreoUsuario,$faxUsuario,$emailAntiguo,$contraseniaUsuarioNUEVA,$contraseniaUsuarioVIEJA);
                    if(!$insercion){
                      $usuario = (new UsuarioRepositorio())->devolverUsuario($eCorreoUsuario);
                      $error =  "El usuario acaba de ser modificado";
                    }else{
                      $error =  "El usuario no ha podido ser introducido";
                    }
              }
          }//include_once __DIR__ . "/../../app/plantillas/modificarUsuario.php";
          include_once __DIR__ . "/../../app/plantillas/administrador/modificarUsuario.php";
        }
     }

     public function administrarUsuarios(){
       include_once __DIR__ . '/../Repositorio/usuarioRepositorio.inc';
       $listaUsuarios = (new UsuarioRepositorio())->devolverTodosUsuarios();
       include_once __DIR__ . '/../../app/plantillas/administrador/administrarUsuarios.php';
     }

     public function borrarUsuarios(){
       include_once __DIR__ . '/../Repositorio/usuarioRepositorio.inc';
       $boolean = (new UsuarioRepositorio())->borrarUsuarios($_GET['email']);
       $listaUsuarios = (new UsuarioRepositorio())->devolverTodosUsuarios();
       include_once __DIR__ . '/../../app/plantillas/administrador/administrarUsuarios.php';
     }

    public function verUltimosVeinteLibrosInicios(){
        include_once __DIR__ . '/../Repositorio/librosRepositorio.inc';
        $libros20 = (new LibroRepositorio())->vistaUltimosVeinteLibros();
        include_once __DIR__ . '/../../app/plantillas/visitante/inicio.php';
    }

    public function verUsuarioIndividual(){
        include_once __DIR__ . '/../Repositorio/usuarioRepositorio.inc';
        $usuario = (new UsuarioRepositorio())->devolverUsuario($_GET['email']);
        $ciudadUsuario = (new UsuarioRepositorio())->devolverCiudadUsuario($_GET['email']);
        include_once __DIR__ . '/../../app/plantillas/administrador/verUsuarioIndividual.php';
    }


    public function formularioInscripcion(){
        include_once __DIR__ . '/../Repositorio/provinciasRepositorio.inc';
        $provincias = (new provinciasRepositorio())->devolverProvincias();
        $nickUsuario = '';$_SESSION['nickUsuario']= $nickUsuario;
        $contrasenia = '';$_SESSION['contrasenia']= $contrasenia;
        $nombre = '';$_SESSION['nombre']= $nombre;
        $primerApellido = 'primerApellido';$_SESSION['']= $primerApellido;
        $segundoApellido = '';$_SESSION['segundoApellido']= $segundoApellido;
        $municipio = '';$_SESSION['municipio']= $municipio;
        $provincia = '';$_SESSION['provincia']= $provincia;
        $telefono = '';$_SESSION['telefono']= $telefono;
        $direccionUsuario = '';$_SESSION['']= $direccionUsuario;
        $nifUsuario = '';$_SESSION['nifUsuario']= $nifUsuario;
        $emailUsuario = '';$_SESSION['emailUsuario']= $emailUsuario;
        $fax = '';$_SESSION['fax']= $fax;
        $idGrupoUsuario = '';$_SESSION['idGrupoUsuario']= $idGrupoUsuario;
        require __DIR__ . '/../../app/plantillas/visitante/formularioInscripcion.php';
    }

    public function inscribirUsuarioNuevo(){
        include_once __DIR__ . "/../Repositorio/usuarioRepositorio.inc";
        include_once __DIR__ . "/../Repositorio/ciudadesRepositorio.inc";
        if($_SERVER['REQUEST_METHOD']=='POST'){
          // //esto es para que si hay algun error no tenga que volver a introducir datos
          //    $_SESSION['nickUsuario'] = $_POST['nickUsuario'];
          //    $_SESSION['contrasenia'] = $_POST['contrasenia'];
          //    $_SESSION['nombre'] = $_POST['nombre'];
          //    $_SESSION['primerApellido'] = $_POST['primerApellido'];
          //    $_SESSION['segundoApellido'] = $_POST['segundoApellido'];
          //    $_SESSION['municipio'] = $_POST['municipio'];
          //    $_SESSION['provincia'] = $_POST['provincia'];
          //    $_SESSION['telefono'] = $_POST['telefono'];
          //    $_SESSION['direccionUsuario'] = $_POST['direccionUsuario'];
          //    $_SESSION['nifUsuario'] = $_POST['nifUsuario'];
          //    $_SESSION['emailUsuario'] = $_POST['emailUsuario'];
          //    $_SESSION['fax'] = $_POST['fax'];
          //    $_SESSION['idGrupoUsuario'] = $_POST['idGrupoUsuario'];
           if(empty($_POST['nickUsuario']) && isset($_POST['nickUsuario'])){
               $error = 'Falta un nick de Usuario';
           }elseif(empty($_POST['contrasenia']) && isset($_POST['contrasenia'])){
               $error =  'Falta una contraseña';
           }elseif(empty($_POST['nombre']) && isset($_POST['nombre'])){
               $error =  'Falta un nombre';
           }elseif(empty($_POST['primerApellido']) && isset($_POST['primerApellido'])){
               $error =  'Falta el primer apellido del usuario';
           }elseif(empty($_POST['segundoApellido']) && isset($_POST['segundoApellido'])){
               $error =  'Falta el segundo apellido del usuario';
           }elseif(empty($_POST['municipio']) && isset($_POST['municipio'])){
               $error =  'Falta la ciudad';
           }elseif(empty($_POST['provincia']) && isset($_POST['provincia'])){
               $error =  'Falta la provincia';
           }elseif(empty($_POST['telefono']) && isset($_POST['telefono'])){
               $error =  'Falta un teléfono de usuario';
           }elseif(empty($_POST['direccionUsuario']) && isset($_POST['direccionUsuario'])){
               $error =  'Falta la direccion de Usuario';
           }elseif(empty($_POST['nifUsuario']) && isset($_POST['nifUsuario'])){
               $error =  'Falta el nif de Usuario';
           }elseif(empty($_POST['emailUsuario']) && isset($_POST['emailUsuario'])){
               $error =  'Falta un correo o email de usuario';
           }else{
             $fax =(string)$_POST['fax'];
             //comprobamos que el telefono Y el mail esten correctos y el usuario y el mail no esten duplicados
             $booleanTelefono =(new UsuarioRepositorio())->comprobarTelefono($_POST['telefono']);//devolvera false si no es correcto
             $booleanEmail =(new UsuarioRepositorio())->validarEmail($_POST['emailUsuario']);//devolvera false si no es correcto
             $booleanEmailExiste =(new UsuarioRepositorio())->comprobarEmailExiste($_POST['emailUsuario']);//devolvera true si existe
             $booleanUsuarioExiste =(new UsuarioRepositorio())->comprobarUsuarioExiste($_POST['nickUsuario']);//devolvera true si existe
             //comprobamos que el dni este correcto y  no este duplicado
             $booleanDniFormato =(new UsuarioRepositorio())->comprobarFormatoDni($_POST['nifUsuario']);///comprobar dni valido
             $booleanDniValido =(new UsuarioRepositorio())->validarDni($_POST['nifUsuario']);///comprobar dni valido
             $booleanDniDuplicado =(new UsuarioRepositorio())->comprobarDniRepetido($_POST['nifUsuario']);///comprobar dni no duplicado
             if(!$booleanTelefono){
                  $error = "El campo teléfono debe tener nueve número y no contener letras";
             }elseif(!$booleanEmail){
                  $error = "El email debe ser correcto, con @";
             }elseif($booleanEmailExiste){
                  $error = "El email ya está siendo usado por otro usuario";
             }elseif($booleanUsuarioExiste){
                  $error = "El nick de usuario ya está siendo usado por otro usuario";
             }elseif(!$booleanDniFormato){
                  $error = "El formato del nif del usuario no es valido";
             }elseif(!$booleanDniValido){
                  $error = "El nif del usuario no es valido";
             }elseif(!$booleanDniDuplicado){
                  $error = "Hay otro usuario que tiene el mismo nif";
             }else{
                  $nickUsuario = $_POST['nickUsuario'];//es un string
                  $contrasenia = $_POST['contrasenia'];//es un string
                  $nombre = $_POST['nombre'];//es un string
                  $primerApellido = $_POST['primerApellido'];//es un string
                  $segundoApellido = $_POST['segundoApellido'];//es un string
                  $municipio = $_POST['municipio'];//es un string
                  $provincia = $_POST['provincia'];//es un string
                  $telefono = $_POST['telefono'];//es un string
                  $direccionUsuario = $_POST['direccionUsuario'];//es un string
                  $nifUsuario = $_POST['nifUsuario'];//es un string
                  $emailUsuario = $_POST['emailUsuario'];//es un string
                  $fax = $_POST['fax'];//es un string
                  $idGrupoUsuario = $_POST['idGrupoUsuario'];//es un string
                  $error =
                      "nickUsuario ".$nickUsuario.'<br>'.
                      "contrasenia ".$contrasenia.'<br>'.
                      "nombre ".$nombre.'<br>'.
                      "primerApellido ".$primerApellido.'<br>'.
                      "segundoApellido ".$segundoApellido.'<br>'.
                      "municipio ".$municipio.'<br>'.///int idciudad
                      "provincia ".$provincia.'<br>'.//string provincia
                      "telefono ".$telefono.'<br>'.
                      "direccionUsuario ".$direccionUsuario.'<br>'.
                      " nifUsuario  ".$nifUsuario.'<br>'.
                      "emailUsuario".$emailUsuario.'<br>'.
                      " fax".$fax.'<br>'.
                      "idGrupoUsuario ".$idGrupoUsuario;
                  //$idCiudad =(new CiudadesRepositorio())->sacarIdCiudad($provincia, $ciudad);
                  //transformamos a int algunas variables
                  //http://enfermeriaburgos.com/descargas/2010/listado_excluidos_dues_especiales_abr10.pdf
                  $idCiudad = (int)$municipio;
                  $idGrupoUsuario = (int)$_POST['idGrupoUsuario'];
                  //Introducimos el usuario
                  $booleanIntroducirUsuario =(new UsuarioRepositorio())->introducirUsuario($nickUsuario,$contrasenia,
                  $idGrupoUsuario,$nombre,$primerApellido,$segundoApellido,$idCiudad,
                  $telefono,$direccionUsuario,$nifUsuario,$fax,$emailUsuario);
                  if(!$booleanIntroducirUsuario){
                      $error = 'El usuario ha sido introducido correctamente.';
                  }else{
                      $error = 'El usuario no ha podido ser introducido por algún error.';
                  }
             }
             //esto es para que si hay algun error no tenga que volver a introducir datos
             // $nickUsuario = $_POST['nickUsuario'];
             // $contrasenia = $_POST['contrasenia'];
             // $nombre = $_POST['nombre'];
             // $primerApellido = $_POST['primerApellido'];
             // $segundoApellido = $_POST['segundoApellido'];
             // $municipio = $_POST['municipio'];
             // $provincia = $_POST['provincia'];
             // $telefono = $_POST['telefono'];
             // $direccionUsuario = $_POST['direccionUsuario'];
             // $nifUsuario = $_POST['nifUsuario'];
             // $emailUsuario = $_POST['emailUsuario'];
             // $fax = $_POST['fax'];
             // $idGrupoUsuario = $_POST['idGrupoUsuario'];

             // <?php
             //    if($_SESSION['nickUsuario'] == ''){
             //       end php
             //       value=""
             //       <?php
             //    }else{
             //        end php
             //        value=
             //        "<?php
             //        $_SESSION['nickUsuario'];
             //         end php"
             //    <?php
             //  }
             // end php


             ////unset($_SESSION['nombre']);
           }

        }else{
            $error = 'El usuario no ha podido ser introducido.';
        }
        require __DIR__ . '/../../app/plantillas/visitante/formularioInscripcion.php';
    }

    public function contacto(){
      require __DIR__ . '/../../app/plantillas/visitante/contacto.php';
    }

    public function cerrarSesion(){
      $_SESSION = array();
      unset($_SESSION);//se carga todo los datos de la sesion
      session_destroy();
      header('Location: index.php');
    }//fin metodo

}//fin clase
