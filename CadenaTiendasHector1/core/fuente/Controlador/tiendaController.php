<?php
class TiendaController
{ public function nuestrasTiendas()
  {
        require __DIR__ . '/../Repositorio/tiendaRepositorio.php';
        $tiendasCiudad = (new TiendaRepositorio)->mostrarTiendas();
        require __DIR__ . '/../../app/plantillas/nuestrasTiendas.php';
  }

  public function verTiendas()
    {
      $comprobarProvincia= false;
      if($_SERVER['REQUEST_METHOD']=='POST')
      if($_POST['nombreCiudad']==""){
        $error = 'NOMBRE PROVINCIA VACIO';

      }else{
          require __DIR__ . '/../Repositorio/tiendaRepositorio.php';
          $comprobarProvincia = (new TiendaRepositorio)->comprobarTiendaExiste($_POST['nombreCiudad']);
          if($comprobarProvincia== true){
              $error = 'PROVINCIA NO EXISTE';
          }else{
              $tiendasCiudad = (new TiendaRepositorio)->findTiendaByNombre($_POST['nombreCiudad']);
              require __DIR__ . '/../../app/plantillas/visualizarTiendasCiudad.php';
          }
      }

      require __DIR__ . '/../../app/plantillas/verTiendas.php';
    }
}

?>
