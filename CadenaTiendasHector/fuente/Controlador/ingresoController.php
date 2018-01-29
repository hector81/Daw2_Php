<?php
class IngresoController
//para comprobar que el usuario existe
{ public function inicioSesion()
  {
    //OBJETO A DEVOLVER
    $USU;
    $comp;
     if($_SERVER['REQUEST_METHOD']=='POST')
    { $nombre = $_POST['nombre'];
      $pass = $_POST['password'];
      if(!empty($nombre) && !empty($pass))
      { require_once __DIR__ . '/../Repositorio/usuarioRepositorio.php';
        $comp = (new UsuarioRepositorio)->findUsuarioPorNombre($nombre, $pass);
        if ($comp == true) {
          $_SESSION['usuario'] = $nombre;
          require __DIR__ . '/../../app/plantillas/inicioSesionUsuario.php';
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

  //para comprar productos
  public function altaUsuario()
    { $usuarioBooleano = false;
      if($_SERVER['REQUEST_METHOD']=='POST')
        {
          if($_POST['nombre']!="" || $_POST['password']!="")
          { require_once __DIR__ . '/../Repositorio/usuarioRepositorio.php';
            $usuarioBooleano = (new usuarioRepositorio)->comprobarUsuarioIdentificacion($_POST['nombre'],$_POST['password']);

            if($usuarioBooleano == true)
            {
              $error = 'Usuario ya estaba antes';
            }else
            { require_once __DIR__ . '/../Repositorio/usuarioRepositorio.php';
              //creamos objeto para llamar a la funcion
              (new UsuarioRepositorio)->introducirUsuarioRegistro($_POST['nombre'], $_POST['password']);
              $error = 'USUARIO ACABA DE SER INTRODUCIDO';
            }
          }else
          { $error = 'Son necesarios el Usuario y la Contraseña';
          }
        }
        require __DIR__ . '/../../app/plantillas/altaUsuario.php';
    }

    //para comprar productos
    public function registroUsuario()
      {
        if($_SERVER['REQUEST_METHOD']=='POST')
          require __DIR__ . '/../../app/plantillas/altaUsuario.php';
      }




    //otras funciones
    public function cerrarSesion()
      {
        session_destroy();
    	  header('Location: http://localhost/Ej/EjercicioTienda/cadenatiendasHector/index.php');
      }


    //para inicio sesion usuario
    public function inicioSesionUsuario()
     { $params = array('mensaje' => 'Bienvenido a la Cadena de Tiendas Media',
                       'fecha' => date('d-m-Y'),);
       require __DIR__ . '/../../app/plantillas/inicio.php';
     }


     //para que salgan todas las categorias
     public function visualizarCategorias()
     {
           require __DIR__ . '/../Repositorio/articuloRepositorio.php';
           $listaCateg= (new ArticuloRepositorio)->mostrarCategorias();
           require __DIR__ . '/../../app/plantillas/categorias.php';
     }

     /*
     <!-- <form action="index.php?ctl=visualizarCategorias">
      <table border='1'>
      <?php foreach ($listaCateg as  $a): ?>
          <tr>
            <?php foreach ($a as  $b): ?>
                <td><?php echo $b ?></td>
            <?php endforeach; ?>
          </tr>
      <?php endforeach; ?>
      </table>
    </form> -->

    */

}
