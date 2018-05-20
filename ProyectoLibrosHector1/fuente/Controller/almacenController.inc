<?php

class AlmacenController
{
    public function administrarAlmacen(){
        include_once __DIR__ .'/../../app/plantillas/administrador/administrarAlmacen.php';
    }//fin clase

    public function enviarDatosAlmacen(){
      include_once __DIR__ . "/../Repositorio/almacenRepositorio.inc";
      if($_SERVER['REQUEST_METHOD']=='POST'){
        if(empty($_POST['provincia']) && isset($_POST['provincia'])){
              $error= "Debes elegir una provincia";
        }elseif(empty($_POST['municipio']) && isset($_POST['municipio'])){
              $error= "Debes elegir un municipio";
        }elseif(empty($_POST['tienda']) && isset($_POST['tienda'])){
              $error= "Debes elegir una tienda";
        }elseif(empty($_POST['categoria']) && isset($_POST['categoria'])){
              $error= "Debes elegir una categoria";
        }elseif(empty($_POST['subcategoria']) && isset($_POST['subcategoria'])){
              $error= "Debes elegir una subcategoria";
        }else{
          $provincia = (int)$_POST['provincia'];
          $municipio = (int)$_POST['municipio'];
          $tienda = (int)$_POST['tienda'];
          $categoria = (int)$_POST['categoria'];
          $subcategoria = (int)$_POST['subcategoria'];
          var_dump($provincia);var_dump($municipio);var_dump($tienda);var_dump($categoria);var_dump($subcategoria);
        }
      }
      include_once __DIR__ .'/../../app/plantillas/administrador/administrarAlmacen.php';
    }

}//fin clase
