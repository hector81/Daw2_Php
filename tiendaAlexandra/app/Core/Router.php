<?php
namespace Amowhi\Cms\Core;

class Router
{
  // enrutamiento
  private $rutas = null;

  public function __construct(){

    $this->rutas = include __DIR__ . './../../config/rutas.php';
  }

  public function resolve(){

    // Parseo de la ruta
    if (isset($_GET['ctl']))
    { if (isset($this->rutas[$_GET['ctl']]))
      { $ruta = $_GET['ctl'];
      }else
      { header('Status: 404 Not Found');
        echo '<html><body><h1>Error 404: No existe la ruta <i>' .
              $_GET['ctl'] .
              '</h1></body></html>';
        exit;
      }
    }else
    { $ruta = 'inicio';
    }

    $controlador = $this->rutas[$ruta];


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

  }
}
