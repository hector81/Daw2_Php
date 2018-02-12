<?php
//index.php
//http://localhost/Ej/EjercicioTienda/cadenatiendasHector/index.php
session_start();

require_once __DIR__ . '/fuente/Modelo/articulo.php';
require_once __DIR__ . '/fuente/Modelo/familia.php';
require_once __DIR__ . '/fuente/Modelo/usuario.php';
require_once __DIR__ . '/fuente/Modelo/tienda.php';
require_once __DIR__ . '/fuente/Modelo/compra.php';
require_once __DIR__ . '/fuente/Modelo/almacen.php';
require_once __DIR__ . '/fuente/Modelo/resena.php';
require_once __DIR__ . '/fuente/Modelo/existencias.php';
require_once __DIR__ . '/fuente/Controlador/articuloController.php';
require_once __DIR__ . '/fuente/Controlador/ingresoController.php';
require_once __DIR__ . '/fuente/Controlador/tiendaController.php';
require_once __DIR__ . '/fuente/Controlador/categoriaController.php';
require_once __DIR__ . '/fuente/Controlador/compraController.php';
require_once __DIR__ . '/fuente/Controlador/almacenController.php';
require_once __DIR__ . '/fuente/Controlador/resenaController.php';
require_once __DIR__ . '/app/conf/rutas.php';


// Parseo de la ruta
if (isset($_GET['ctl']))
{ if (isset($mapeoRutas[$_GET['ctl']]))
  { $ruta = $_GET['ctl'];
  }else
  { header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: No existe la ruta <i>' .
          $_GET['ctl'] .
          '</p></body></html>';
    exit;
  }
}else
{ $ruta = 'inicio';
}

$controlador = $mapeoRutas[$ruta];
// Ejecución del controlador asociado a la ruta

if (method_exists($controlador['controller'],$controlador['action']))
{ call_user_func(array(new $controlador['controller'], $controlador['action']));
}else
{ header('Status: 404 Not Found');
  echo '<html><body><h1>Error 404: El controlador <i>' .
       $controlador['controller'] .
       '->' . $controlador['action'] .
       '</i> no existe</h1></body></html>';
}
