<?php
//masterclass RIAM gnoss
//  http://localhost:8080/comercio/php/MVC/CadTien2018/index.php?ctl=inicio
//http://localhost:8080/comercio/php/MVC/CadTien2018%20-%20copia/index.php?ctl=inicio
//EXAMEN PHP 7 MARZO 2018//MINIMO 4 HORAS

// | Ver reseñas | Escribir reseñas | Ver todas las reseñas
//$sqlog = "SELECT nombre, pwd,eCorreo FROM usuario WHERE nombre = :nombre AND pvd = :pass ";$cursor = $con->prepare($sqlog);
//$cursor->bindValue(':nombre',$username);
//$cursor->bindValue(':pass',$password);
//$cursor->execute();
  //      if($fila = $cursor->fetch(PDO::FETCH_BOUND)){
    //       $_SESSION['Username'] = $username;

    //<meta http-equiv="refresh" content="0;index.php">

//bool is_int ( mixed $var )

//echo "<h1>ERORR</h1>";
//echo "<p>lOS SENTIMOS VUELVE A INTERTALOS DE NUIEVO</p>";
//  $stmt->debugDumpParams();//dara la construccion de la sentencia de sql el que hay que usar
  //  strval()

//    trim()

//    <?php
//    if($_SESSION['grupo']=='admins'){
//      include_once 'baseAdministrador.php';
//    }elseif($_SESSION['grupo']=='clientes'){
  //    include_once 'baseUsuario.php';
  //  }

//modificarArticulo, usuario, categoria, tienda

/*
$con->commit();
          return $respuesta;
Lo primero que hace es la reserva y cuando confirme en el carrito, hace una venta y luego linea pedido
*/
session_start();

 ?>
<?php
require_once __DIR__ . '/fuente/Controlador/familiaController.inc'; /*controladores */
require_once __DIR__ . '/fuente/Controlador/articuloController.inc'; /*controladores */
require_once __DIR__ . '/fuente/Controlador/tiendaController.inc'; /*controladores */
require_once __DIR__ . '/fuente/Controlador/almacenController.inc'; /*controladores */
require_once __DIR__ . '/fuente/Controlador/usuarioController.inc'; /*controladores */
require_once __DIR__ . '/fuente/Controlador/ventaController.inc'; /*controladores */
require_once __DIR__ . '/fuente/Controlador/lineaVentaController.inc'; /*controladores */
require_once __DIR__ . '/fuente/Controlador/reservaController.inc'; /*controladores */
require_once __DIR__ . '/fuente/Controlador/articuloReservadoController.inc'; /*controladores */
require_once __DIR__ . '/app/conf/rutas.php'; /*Ubicación del archivo de rutas*/


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
