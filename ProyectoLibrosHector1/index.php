<?php
//http://localhost:8080/ProyectoLibrosHector/
// usuario = maria@gmail.com    ,pass =123456
// administrador = hector@gmail.com    ,pass =123456
//Dropdown Example
//introducir usuario
//$con->debugDumpParams();//dara la construccion de la sentencia de sql
//  $stmt->debugDumpParams();//dara la construccion de la sentencia de sql el que hay que usar
//die();
//se puede poner un die(); para ver si es error
/*

<p>
  Inicio usuario
  Ver y comprar articulos
  Buscar tiendas provincia
  Buscar artículos por categoría
  Ver Carrito
  Ver mis compras
  Cerrar Sesion



  apuntate es introducir usuario nuevo
  contacto es para enivar mensjae

  usuario

  //https://victorroblesweb.es/2014/07/15/ejemplo-php-poo-mvc/

  //https://www.w3schools.com/bootstrap/bootstrap_examples.asp

  //https://www.w3schools.com/bootstrap/bootstrap_navbar.asp

  //http://cazaresluis.com/category/desarrollo-web/

  //https://azure.microsoft.com/es-es/overview/what-is-azure/

  //http://cazaresluis.com/category/desarrollo-web/

  //https://www.w3schools.com/bootstrap/tryit.asp?filename=trybs_navbar_collapse&stacked=h

  <p>
    administrador
  
  Ver/Modificar/Borrar Articulos
  Ver Existencias
  Ver/Borrar/Modificar usuarios
  Introducir user/adm
  Ver/Modificar tiendas
  Ver/Modificar Existencias
  Alta Categoria
  Alta producto
  Insertar Tienda
  Modificar/Borrar Categorias
  Ver Categorias y articulos
  Ver compras y rerservas
  Cerrar Sesion

//Subir imagen ajax - quecosasleo.com

  $2y$10$7SFeHFUm0lpKtUVwVTYUmu3c2tv8VEUQyKbgJTxkNw.kKza2N3A4O

*/

session_start();
$_SESSION['userNombre'] = 'Visitante';
$_SESSION['grupoUser'] = 'visitantes';
require_once __DIR__ . '/app/config/rutas.php';
require_once __DIR__ . '/fuente/Controller/almacenController.inc';
require_once __DIR__ . '/fuente/Controller/autoresController.inc';
require_once __DIR__ . '/fuente/Controller/categoriasController.inc';
require_once __DIR__ . '/fuente/Controller/ciudadesController.inc';
require_once __DIR__ . '/fuente/Controller/ventaController.inc';
require_once __DIR__ . '/fuente/Controller/detallesVentaController.inc';
require_once __DIR__ . '/fuente/Controller/editorialesController.inc';
require_once __DIR__ . '/fuente/Controller/grupoUsuarioController.inc';
require_once __DIR__ . '/fuente/Controller/librosController.inc';
require_once __DIR__ . '/fuente/Controller/librosReservadosController.inc';
require_once __DIR__ . '/fuente/Controller/paisesController.inc';
require_once __DIR__ . '/fuente/Controller/provinciasController.inc';
require_once __DIR__ . '/fuente/Controller/reseniasArticuloController.inc';
require_once __DIR__ . '/fuente/Controller/reservaController.inc';
require_once __DIR__ . '/fuente/Controller/subCategoriasController.inc';
require_once __DIR__ . '/fuente/Controller/tiendasController.inc';
require_once __DIR__ . '/fuente/Controller/usuarioController.inc';


if(isset($_GET['ctl'])){
    if(isset($mapeoRutas[$_GET['ctl']])){
        $ruta = $_GET['ctl'];
    }else{
        header('Status: 404 not found');
        echo 'La ruta '.$_GET['ctl']. ' no existe' ;
    }
}else{
  $ruta = 'inicio';
}

$controlador = $mapeoRutas[$ruta];

if(method_exists($controlador['controller'],$controlador['action'])){
    call_user_func(array(new $controlador['controller'],$controlador['action']));
}else{
  header('Status: 404 not found');
  echo 'El controlador '.$controlador['action']. ' no existe. No se encuentra el el controlador '.$controlador['controller'] ;
}

?>
