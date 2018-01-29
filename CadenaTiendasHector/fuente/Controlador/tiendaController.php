<?php
class TiendaController
{ public function nuestrasTiendas()
  {

    if($_SERVER['REQUEST_METHOD']=='POST')
    if($_POST['nombreCiudad']==""){
      $error = 'NOMBRE CIUDAD VACIO';

    }else{
        require __DIR__ . '/../Repositorio/tiendaRepositorio.php';
        $tiendasCiudad = (new TiendaRepositorio)->findTiendaByNombre($_POST['nombreCiudad']);
        require __DIR__ . '/../../app/plantillas/visualizarTiendasCiudad.php';
    }

    require __DIR__ . '/../../app/plantillas/nuestrasTiendas.php';
  }
}

?>
