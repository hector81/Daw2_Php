<?php
include __DIR__ .  "/../../app/plantillas/herramientas.php";

class UsuarioController{
  public function login(){
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $nombre = $_POST['usuario'];
      $pass = $_POST['password'];
      if(!empty($nombre) && !empty($pass)){
        require_once __DIR__ . '/../Repositorio/usuarioRepositorio.php';
        if((new UsuarioRepositorio)->findUsuario($nombre, $pass)){
          header('Location: /cadenatiendas');
        }else{
          $_SESSION['message'] = 'Usuario o contraseña erróneos';
        }
      }else{
        $_SESSION['message'] = 'Introduzca un usuario y una contraseña para iniciar sesión';
      }
    }
    require __DIR__ . '/../../app/plantillas/login.php';
  }

  public function signIn(){
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $nombre = trim($_POST['usuario']);
      $password = trim($_POST['password']);
      $nombreReal = trim($_POST['nombre']);
      $apellidos = trim($_POST['apellidos']);
      $direccion = trim($_POST['direccion']);
      $codpost = trim($_POST['cod-post']);
      $ciudad = trim($_POST['ciudad']);
      $provincia = trim($_POST['provincia']);
      $pais = trim($_POST['pais']);
      $tlfn = trim($_POST['tlfn']);
      $email = trim($_POST['email']);

      //Comprobaciones
      $upper = preg_match('@[A-Z]@', $password);
      $lower = preg_match('@[a-z]@', $password);
      $number = preg_match('@[0-9]@', $password);
      $spec = preg_match('/[!@#$%^&*()\-_=+{}:,.]/', $password);

      if( compruebaCodigo($nombre) || strlen($nombre)<5 || !ctype_alnum($nombre)){
         $_SESSION['message'] = 'El nombre de usuario debe ser alfanumérico y contener al menos 5 caracteres ';

      }else if ( compruebaCodigo($password) || !$upper || !$lower || !$number || !$spec || strlen($password)<8) {
        $_SESSION['message'] = "La contraseña debe contener al menos 8 caracteres, una mayuscula, un número y un caracter especial <br>
        El sistema limita el uso de algunos caracteres no alfanuméricos por motivos de seguridad";

      }else if ( !preg_match('/^[A-z áéíóúñüÁÉÍÓÚ]+$/', $nombreReal) || !preg_match('/^[A-z áéíóúñüÁÉÍÓÚ]+$/', $apellidos)
      || strlen($nombreReal)<5 || strlen($apellidos)<5 ) {
        $_SESSION['message'] = "Nombre y apellidos deben ser alfabéticos y contener al menos 5 caracteres ";

      }else if ( compruebaCodigo($direccion) || strlen($direccion)<10 ) {
        $_SESSION['message'] = "La dirección debe contener al menos 10 caracteres y tiene reservados algunos caracteres especiales ";

      }else if ( !preg_match('/\d{5}/', $codpost)) {
        $_SESSION['message'] = "El código postal debe ser un número de 5 dígitos " ;

      }else if ( !preg_match('/^[A-z áéíóúñüÁÉÍÓÚ]+$/', $ciudad) || strlen($ciudad)<4 ) {
        $_SESSION['message'] = "Ciudad debe ser alfabética y tener al menos 4 caracteres";

      }else if ( !preg_match('/^[A-z áéíóúñüÁÉÍÓÚ]+$/', $provincia) || strlen($provincia)<4 ) {
        $_SESSION['message'] = "Provincia debe ser alfabética y tener al menos 4 caracteres";

      }else if ( !preg_match('/^[A-z áéíóúñüÁÉÍÓÚ]+$/', $pais) || strlen($pais)<4 ) {
        $_SESSION['message'] = "País debe ser alfabético y tener al menos 4 caracteres";

      }else if ( !preg_match('/\d{9}/', $tlfn) || compruebaCodigo($tlfn)) {
        $_SESSION['message'] = "Teléfono debe ser un número de 9 dígitos";

      }else if ( !filter_var($email, FILTER_VALIDATE_EMAIL) || compruebaCodigo($email) ) {
        $_SESSION['message'] = "El email introducido no cumple el patrón estandar: usuario@proveedor.com ";

      } else{
         require_once __DIR__ . '/../Repositorio/usuarioRepositorio.php';
        if((new UsuarioRepositorio)->newUsuario($nombre, $password, $nombreReal, $apellidos,
        $direccion, $codpost, $ciudad, $provincia, $pais)){
           $_SESSION['message'] = "¡Te has registrado con éxito!";
           $type= '-reg';
           $_POST = array();
        }else{
           $_SESSION['message'] = 'Ya existe un usuario con ese nombre';
        }
      }
    }
      require __DIR__ . '/../../app/plantillas/signIn.php';
  }

  public function userProfile(){
    if(isset($_SESSION['grupo']) && $_SESSION['grupo'] === 'cliente'){
      require_once __DIR__ . '/../Repositorio/usuarioRepositorio.php';
      $pedidos= (new usuarioRepositorio)->loadOrders();
      require __DIR__ . '/../../app/plantillas/userProfile.php';
    }
  }

  public function logOut(){
    $_SESSION['nombre']= '';
    $_SESSION['grupo']= '';
    header('Location: /cadenatiendas');
  }
}
