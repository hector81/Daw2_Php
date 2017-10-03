<?php

namespace Amowhi\Cms\Controller;

use Amowhi\Cms\Model\Usuario;
use Amowhi\Cms\Repository\UsuarioRepository;
use Amowhi\Cms\Repository\VentaRepository;
use Amowhi\Cms\Core\Utilidades;

class UsuarioController extends BaseController
{

  private $usuarioRepository = null;
  private $ventaRepository = null;

  public function __construct()
  {
    $this->usuarioRepository = new UsuarioRepository();
    $this->ventaRepository = new VentaRepository();
  }

  //Utilizado en la vista login.
  public function inicioSesion()
  {
    $params=[];
    if($_SERVER['REQUEST_METHOD']=='POST')
    { $nombre = $_POST['nombre'];
      $pass = $_POST['password'];

      if(!empty($nombre) && !empty($pass))
      {
        $idUsuario= $this->usuarioRepository->findUsuario($nombre, $pass);
        if($idUsuario>0)
        {
          if(isset($_SESSION['carrito'])){
            header('Location: /Namespaces/web/index.php?ctl=carrito');
          }else{
          header('Location: /Namespaces/web/index.php?ctl=inicio');
          }
        }else
        {
          $params['error'] = 'Usuario o contraseña erróneos. Si aún no tienes cuenta, <a href="index.php?ctl=registrarUsuario">registrate aquí</a>';
        }
      }else
      {
        $params['error'] = 'Son necesarios el Usuario y la Contraseña';
      }
    }
    $this->cargarVista('login', $params);

  }

  //Función que tras comprobar los datos en la función test_input y validar los parámetros,
  //si no hay errores realiza el insert desde UsuarioRepository.
  public function registrarUsuario()
  {
    $params=[];
    $params['datosUsuario'] = [];
    $params['errors'] = [];
    if($_SERVER['REQUEST_METHOD']=='POST')
      {
        $usuario = Utilidades::test_input($_POST['usuario']);
        $aContrasenia = Utilidades::test_input($_POST['password']);
        $contrasenia= password_hash($aContrasenia, PASSWORD_BCRYPT);
        $grupo = Utilidades::test_input($_POST['grupo']);
        $nombre = Utilidades::test_input($_POST['nombre']);
        $apellidos = Utilidades::test_input($_POST['apellidos']);
        $direccion = Utilidades::test_input($_POST['direccion']);
        $provincia = Utilidades::test_input($_POST['provincia']);
        $ciudad = Utilidades::test_input($_POST['ciudad']);
        $codPostal = Utilidades::test_input($_POST['codigoPostal']);
        $pais = Utilidades::test_input($_POST['pais']);
        $telefono = Utilidades::test_input($_POST['telefono']);
        $email = Utilidades::test_input($_POST['email']);


        $params['datosUsuario'] = [
            'usuario' => $usuario,
            'grupo'=> $grupo,
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'direccion' => $direccion,
            'provincia' => $provincia,
            'ciudad'=> $ciudad,
            'codigoPostal'=> $codPostal,
            'pais' => $pais,
            'telefono'=> $telefono,
            'email'=> $email,

        ];

      $params['errors']=Utilidades::validarParametrosRegistroUsuario($usuario, $contrasenia,$grupo);
      $params['errors']=Utilidades::validarDatosUsuario($nombre, $apellidos,$direccion, $provincia, $ciudad, $codPostal, $pais,$telefono, $email);

      if(count($params['errors']) == 0){
      $registrado=$this->usuarioRepository->registerUsuario($usuario, $contrasenia,$grupo, $nombre, $apellidos,$direccion, $provincia, $ciudad, $codPostal, $pais,$telefono, $email );
      }
      if($registrado>0){
          header('Location: /Namespaces/web/index.php?ctl=iniciasesion&registroOk');
      }else{
        $params['errors']['error']="Ha habido un error inesperado";
      }
    }
    $this->cargarVista('registrarUsuario', $params);
  }

  //Muestra los datos del usuario en la vista miCuenta que también permite modificar los datos.
  public function perfil(){
    $idUsuario=$_SESSION['idUsuario'];
    $params['datosUsuario']=$this->usuarioRepository->findDatos($idUsuario);

    $this->cargarVista('miCuenta', $params);
  }

  //Recoge los datos del formulario miCuenta en caso de que modifiquen y le den al submit y envía los datos a la función actualizardatos() de UsuarioRepository.
  public function actualizarUsuario()
  { if($_SERVER['REQUEST_METHOD']=='POST')
    {
    $idUsuario=$_SESSION['idUsuario'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $direccion = $_POST['direccion'];
    $provincia = $_POST['provincia'];
    $ciudad = $_POST['ciudad'];
    $codPostal = $_POST['codigoPostal'];
    $pais = $_POST['pais'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $datosUsuario=$this->usuarioRepository->actualizarDatos($idUsuario, $nombre, $apellidos,$direccion, $provincia, $ciudad, $codPostal, $pais,$telefono, $email);
    header('Location: /Namespaces/web/index.php?ctl=miCuenta&modificado=Ok');
    }
  }

  public function mostrarPedidosUsuario()
  {
    $idUsuario=$_SESSION['idUsuario'];
    if(isset($_GET['detalles'])){
      $idVenta= $_GET['detalles'];
      $params['articulos']=$this->ventaRepository->datosVentaDetalle($idVenta);
    }
    $params['envio'] = $this->usuarioRepository->findEnviosUsuario($idUsuario);
    $total=count($params['envio']);
      if($total>0){
          for($i=0;$i<$total;$i++){
            $idsVenta[]=$params['envio'][$i]['idVenta'];
          }
      $params['datosVenta']=$this->ventaRepository->datosTablaVenta($idsVenta);

      }
    $this->cargarVista('misPedidos',$params);

  }

  public function mostrarDetallesPedido()
  {
      $idVenta= $_GET['detalles'];
      $params['articulos']=$this->ventaRepository->datosVentaDetalle($idVenta);
      $params['datosVenta']=$this->ventaRepository->datosTablaVenta($idVenta);
      $params['envio']=$this->ventaRepository->datosEnvio($idVenta);
    $this->cargarVista('vistaVentaDetalle',$params);
  }

  //Botón en el menú cerrarSesion
  public function cerrarSesion()
  {
    session_destroy();
    unset($_COOKIE['usuario']);
    setcookie('usuario', null, -1, '/');
    header('Location: /Namespaces/web/index.php?ctl=inicio');
  }

}
