<?php

class LineaVentaController {

    public function verMisCompras(){
      include_once __DIR__ . "/../Repositorio/lineaVentaRepositorio.inc";
      $nombreUsuario = $_SESSION['userNombre'];
      $compras = null;
      $compras = (new LineaVentaRepositorio)->verMisCompras($nombreUsuario);
      if($compras == null){
          $error= "El cliente aún no ha comprado nada";
      }
      include_once __DIR__ . "/../../app/plantillas/verMisCompras.php";
    }


}//finc clase


 ?>
