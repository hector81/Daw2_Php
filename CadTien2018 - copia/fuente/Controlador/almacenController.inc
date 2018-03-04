<?php

class AlmacenController {

    public function verExistencias(){
        include_once __DIR__ . "/../Repositorio/almacenRepositorio.inc";
        $articulosExistencias = (new almacenRepositorio)->mostrarArticulosStockTienda();//es un multarray de 2
        include_once __DIR__ .'/../../app/plantillas/verExistencias.php';
    }//fin metodo


    public function verModificarExistencias(){
      //solo nos lleva a la página
      include_once __DIR__ . "/../Repositorio/almacenRepositorio.inc";
      $articulosExistencias = (new almacenRepositorio)->mostrarArticulosStockTienda();//es un multarray de 2
      include_once __DIR__ . "/../../app/plantillas/verModificarExistencias.php";
    }

    public function actualizarStock(){
      include_once __DIR__ . "/../Repositorio/almacenRepositorio.inc";
      if($_SERVER['REQUEST_METHOD']=='POST'){
          if(empty($_POST['numeroNuevoStock']) && isset($_POST['numeroNuevoStock'])){
              $error = "Debes poner un número para actualizar";
          }else{
              $artId = trim($_POST['artId']);
              $tiendaId = trim($_POST['tiendaId']);
              $numeroNuevoStock = trim($_POST['numeroNuevoStock']);
              $boolConfirmacion = (new almacenRepositorio)->modificarArticulosStockTienda($artId,$tiendaId,$numeroNuevoStock);
              if($boolConfirmacion){
                  $error = "El stock ha sido modificado";
              }else{
                  $error = "El stock no ha sido modificado";
              }
          }

      }
      $articulosExistencias = (new almacenRepositorio)->mostrarArticulosStockTienda();//es un multarray de 2
      include_once __DIR__ . "/../../app/plantillas/verModificarExistencias.php";
    }

}


 ?>
