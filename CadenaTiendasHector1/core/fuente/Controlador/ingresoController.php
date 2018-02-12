<?php
class IngresoController

{
  //funcion inicio principla proveniente de default controller
  public function inicio()
  { $params = array('mensaje' => 'Bienvenido a la Cadena de Tiendas Media',
                    'fecha' => date('d-m-Y'),);
    require __DIR__ . '/../../app/plantillas/inicio.php';
  }

  //para comprobar que el usuario existe
  public function inicioSesion()
  {
    //OBJETO A DEVOLVER
    $USU;
    $comprobarUsuario;
    $comprobarGrupo='';
     if($_SERVER['REQUEST_METHOD']=='POST')
    { $nombre = $_POST['nombre'];
      $pass = $_POST['password'];
      if(!empty($nombre) && !empty($pass))
      { require_once __DIR__ . '/../Repositorio/usuarioRepositorio.php';
        $comprobarUsuario = (new UsuarioRepositorio)->findUsuarioPorNombre($nombre, $pass);
        if ($comprobarUsuario == true) {
          $_SESSION['usuario'] = $nombre;
          //comprobar Grupo
          $comprobarGrupo = (new UsuarioRepositorio)->comprobarGrupo($nombre);
          if($comprobarGrupo == 'admins'){
            require __DIR__ . '/../../app/plantillas/inicioSesionAdministrador.php';
          }elseif($comprobarGrupo == 'clientes'){
            require __DIR__ . '/../../app/plantillas/inicioSesionUsuario.php';
          }

        }else
        {
          $error = 'Usuario o contraseña erróneos';
        }
      }else
      { $error = 'Son necesarios el Usuario y la Contraseña';
      }
    }
    require __DIR__ . '/../../app/plantillas/inicioSesion.php';
  }

  //para dar de alta a personas no registradas como clientes
  public function altaUsuarioNoRegistrado()
  {   $usuarioBooleano = false;
      if($_SERVER['REQUEST_METHOD']=='POST')
        {
          if($_POST['nombre']=="" || $_POST['password']==""){
             $error = 'Son necesarios el Usuario yla contraseña';
          }else{
             require_once __DIR__ . '/../Repositorio/usuarioRepositorio.php';
              $usuarioBooleano = (new usuarioRepositorio)->comprobarUsuarioIdentificacion($_POST['nombre'],$_POST['password']);
              if($usuarioBooleano == true)
              {
                require_once __DIR__ . '/../Repositorio/usuarioRepositorio.php';
                $grupoIngreso = 'clientes';
                //creamos objeto para llamar a la funcion
                (new usuarioRepositorio)->introducirUsuarioRegistro($_POST['nombre'], $_POST['password'],$grupoIngreso);
                $error = 'USUARIO ACABA DE SER INTRODUCIDO';

              }else
              {
                $error = 'Usuario ya estaba antes';
              }

          }

        }
      require __DIR__ . '/../../app/plantillas/altaUsuarioNoRegistrado.php';
  }

  //para comprar productos
  public function altaUsuario()
    { $usuarioBooleano = false;
      if($_SERVER['REQUEST_METHOD']=='POST')
        {
          if($_POST['nombre']=="" || $_POST['password']=="" || $_POST['grupoAlta']==""){
             $error = 'Son necesarios el Usuario,la contraseña y el grupo';
          }elseif($_POST['grupoAlta']!="clientes"  || $_POST['grupoAlta']=="admins"){
             $error = 'El grupo debe ser admins o clientes';
          }else{
             require_once __DIR__ . '/../Repositorio/usuarioRepositorio.php';
              $usuarioBooleano = (new usuarioRepositorio)->comprobarUsuarioIdentificacion($_POST['nombre'],$_POST['password']);
              if($usuarioBooleano == true)
              {
                require_once __DIR__ . '/../Repositorio/usuarioRepositorio.php';
                //creamos objeto para llamar a la funcion
                (new usuarioRepositorio)->introducirUsuarioRegistro($_POST['nombre'], $_POST['password'], $_POST['grupoAlta']);
                $error = 'USUARIO ACABA DE SER INTRODUCIDO';

              }else
              {
                $error = 'Usuario ya estaba antes';
              }

          }

        }
        require __DIR__ . '/../../app/plantillas/altaUsuario.php';
    }

    //para registro
    public function registroUsuario()
      {
        if($_SERVER['REQUEST_METHOD']=='POST')
          require __DIR__ . '/../../app/plantillas/altaUsuario.php';
      }




    //otras funciones
    public function cerrarSesion()
      {
        session_destroy();
        header('Location: /Ej/EjercicioTienda/cadenatiendasHector/index.php');
      }


    //para inicio sesion usuario
    public function inicioSesionUsuario()
     { $params = array('mensaje' => 'Bienvenido a la Cadena de Tiendas Media',
                       'fecha' => date('d-m-Y'),);
       require __DIR__ . '/../../app/plantillas/inicio.php';
     }




     //PARA BORRAR USUARIO
     public function borrarUsuario()
       {
         if($_SERVER['REQUEST_METHOD']=='POST'){
            if($_POST['nombre'] == ""){
              $error = 'TIENES QUE PONER EL NOMBRE';
            }else{
              $nombre = $_POST['nombre'];
              require_once __DIR__ . '/../Repositorio/usuarioRepositorio.php';
              $comprobarNombre= (new UsuarioRepositorio)->comprobarNombreUsuario($nombre);
              if($comprobarNombre==true){
                  $error = 'USUARIO NO EXISTE';
              }else{
                  require_once __DIR__ . '/../Repositorio/usuarioRepositorio.php';
                  $borrar= (new usuarioRepositorio)->borrarUsuarioPorNombre($nombre);
                  if($borrar==true){
                    $error = 'EL USUARIO '.$nombre.' ACABA DE SER BORRADO';
                    require __DIR__ . '/../../app/plantillas/borrarUsuario.php';
                  }else{
                    $error = 'EL USUARIO '.$nombre.' NO HA PODIDO SER BORRADO';
                    require __DIR__ . '/../../app/plantillas/borrarUsuario.php';
                 }
              }

            }
          }

             require __DIR__ . '/../../app/plantillas/borrarUsuario.php';


       }


       public function verTodosUsuarios(){
          require_once __DIR__ . '/../Repositorio/usuarioRepositorio.php';
          $listaUsuarios = (new UsuarioRepositorio)->visualizarTodosLosUsuarios();
          require __DIR__ . '/../../app/plantillas/verTodosUsuarios.php';
       }

}
