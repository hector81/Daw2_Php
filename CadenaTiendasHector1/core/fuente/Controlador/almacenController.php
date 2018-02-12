<?php
class AlmacenController
{
  //para ver existencias
  public function mostrarExistencias()
  {
    if($_SERVER['REQUEST_METHOD']=='POST')
    if($_POST['nombreProducto']==""){
      $error = 'Nombre vacio';

    }else{
        require __DIR__ . '/../Repositorio/articuloRepositorio.php';
        require __DIR__ . '/../Repositorio/almacenRepositorio.php';
        $comprobar=false;
        $comprobar = (new ArticuloRepositorio)->comprobarArticuloExiste($_POST['nombreProducto']);
        if($comprobar == true){
            $ID = (new ArticuloRepositorio)->findIdArticuloByNombre($_POST['nombreProducto']);
            $nombreProducto = $_POST['nombreProducto'];
            $existenciaNumeros = (new AlmacenRepositorio)->mostrarExistencias($ID,$nombreProducto);
            require __DIR__ . '/../../app/plantillas/verExistencias.php';
        }else{
          $error = 'NO EXISTE EL ARTICULO';
        }

    }


    require __DIR__ . '/../../app/plantillas/mostrarExistencias.php';
  }
}
