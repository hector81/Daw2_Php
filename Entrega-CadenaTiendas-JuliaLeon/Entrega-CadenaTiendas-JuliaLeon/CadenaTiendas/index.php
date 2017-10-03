<?php
session_start();
if (!isset($_SESSION['carrito'])){
  $_SESSION['carrito']=[];
}
if (!isset($_SESSION['grupo'])){
  $_SESSION['grupo']='';
}


require_once __DIR__ . '/fuente/Modelo/articulo.php';
require_once __DIR__ . '/fuente/Modelo/categoria.php';
require_once __DIR__ . '/fuente/Controlador/defaultController.php';
require_once __DIR__ . '/fuente/Controlador/articuloController.php';
require_once __DIR__ . '/fuente/Controlador/categoriaController.php';
require_once __DIR__ . '/fuente/Controlador/usuarioController.php';
require_once __DIR__ . '/fuente/Controlador/carritoController.php';
require_once __DIR__ . '/app/conf/rutas.php';

// Parseo de la ruta
if (isset($_GET['ctl'])){
  if (isset($mapeoRutas[$_GET['ctl']])){
    $ruta = $_GET['ctl'];
  }else{
    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: No existe la ruta <i>' .
          $_GET['ctl'] . '</p></body></html>';
    exit;
  }
}else{
  $ruta = 'home';
}

$controlador = $mapeoRutas[$ruta];

if (method_exists($controlador['controller'],$controlador['action'])){
  call_user_func(array(new $controlador['controller'], $controlador['action']));
}else{
  header('Status: 404 Not Found');
  echo '<html><body><h1>Error 404: El controlador <i>' .
       $controlador['controller'] . '->' . $controlador['action'] .
       '</i> no existe</h1></body></html>';
}
?>
