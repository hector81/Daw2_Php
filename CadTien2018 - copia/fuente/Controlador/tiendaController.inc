<?php
  class TiendaController {

    public function verTiendasCadena(){
      include_once __DIR__ .'/../Repositorio/tiendaRepositorio.inc';
      $tiendas = (new TiendaRepositorio())->verTiendasCadena();
      include_once __DIR__ .'/../../app/plantillas/verTiendasCadena.php';
    }//fin metodo

    public function buscarTiendasProvincia(){
      include_once __DIR__ .'/../Repositorio/tiendaRepositorio.inc';
      $tiendas = (new TiendaRepositorio())->devolverProvinciasDistintas();
      include_once __DIR__ .'/../../app/plantillas/buscarTiendasProvincia.php';
    }//fin metodo

    public function buscarTiendasProvinciaAdministrador(){
      include_once __DIR__ .'/../Repositorio/tiendaRepositorio.inc';
      $tiendas = (new TiendaRepositorio())->devolverProvinciasDistintas();
      include_once __DIR__ .'/../../app/plantillas/buscarTiendasProvinciaAdministrador.php';
    }//fin metodo

    public function buscarTiendasProvinciaUsuario(){
      include_once __DIR__ .'/../Repositorio/tiendaRepositorio.inc';
      $tiendas = (new TiendaRepositorio())->devolverProvinciasDistintas();
      include_once __DIR__ .'/../../app/plantillas/buscarTiendasProvinciaUsuario.php';
    }//fin metodo

    public function borrarTienda(){
      include_once __DIR__ .'/../Repositorio/tiendaRepositorio.inc';
      $tiendasProvincia = (new TiendaRepositorio())->verTiendasPorProvincia($_POST['provinciasTiendas']);
      $idTienda = (int)$_POST['idTienda'];
      $boolA = (new TiendaRepositorio())->borrarTiendaAlmacen($idTienda);//primero borramos de almacen
      if($boolA){
          $boolT = (new TiendaRepositorio())->borrarTienda($idTienda);
          if($boolT){
              $error = "La tienda ha sido borrada";
          }else{
              $error = "La tienda no ha podido ser borrada";
          }
      }else{
          $error = "La tienda no ha podido ser borrada";
      }


      include_once __DIR__ .'/../../app/plantillas/verTiendasProvinciaAdministrador.php';
    }

    public function modificarTienda(){
      $nombreTienda = $_POST['nombreTienda'];
      $provinciaUsuario = $_POST['provinciaUsuario'];
      $ciudadTienda = $_POST['ciudadTienda'];
      $telefonoTienda = $_POST['telefonoTienda'];
      $error = "MODIFICANDO TIENDA ".$_POST['nombreTienda']. " ,BORRA Y PON LOS NUEVOS DATOS";
      include_once __DIR__ . "/../../app/plantillas/modificarCategoria.php";
    }//fin metodo

    public function verTiendasProvincia(){
      if($_SERVER['REQUEST_METHOD']=='POST'){
        if(empty($_POST['provinciasTiendas']) && isset($_POST['provinciasTiendas'])){
          $error = 'El nombre de la provincia está vacio';
        }else{
            include_once __DIR__ .'/../Repositorio/tiendaRepositorio.inc';
            $tiendasProvincia = (new TiendaRepositorio())->verTiendasPorProvincia($_POST['provinciasTiendas']);
            $error = 'TIENDAS DE LA PROVINCIA '.$_POST['nombreProvincia'].'<br>';
            include_once __DIR__ .'/../../app/plantillas/verTiendasProvincia.php';
        }

      }

    }//fin metodo

    public function verTiendasProvinciaUsuario(){
      if($_SERVER['REQUEST_METHOD']=='POST'){
        if(empty($_POST['provinciasTiendas']) && isset($_POST['provinciasTiendas'])){
          $error = 'El nombre de la provincia está vacio';
        }else{
            include_once __DIR__ .'/../Repositorio/tiendaRepositorio.inc';
            $tiendasProvincia = (new TiendaRepositorio())->verTiendasPorProvincia($_POST['provinciasTiendas']);
            $error = 'TIENDAS DE LA PROVINCIA DE '.$_POST['provinciasTiendas'].'<br>';
            include_once __DIR__ .'/../../app/plantillas/verTiendasProvinciaUsuario.php';
        }

      }
    }//fin metodo

    public function verTiendasProvinciaAdministrador(){
      if($_SERVER['REQUEST_METHOD']=='POST'){
        if(empty($_POST['provinciasTiendas']) && isset($_POST['provinciasTiendas'])){
          $error = 'El nombre de la provincia está vacio';
        }else{
            include_once __DIR__ .'/../Repositorio/tiendaRepositorio.inc';
            $tiendasProvincia = (new TiendaRepositorio())->verTiendasPorProvincia($_POST['provinciasTiendas']);
            $error = 'TIENDAS DE LA PROVINCIA DE '.$_POST['provinciasTiendas'].'<br>';
            include_once __DIR__ .'/../../app/plantillas/verTiendasProvinciaAdministrador.php';
        }

      }
    }//fin metodo

    public function verArticulosPorTienda(){
      if($_SERVER['REQUEST_METHOD']=='POST'){
        if(empty($_POST['nombreTienda']) && isset($_POST['nombreTienda'])){
          $error = 'El nombre de la tienda está vacio';
          include_once __DIR__ .'/../../app/plantillas/verTiendasCadena.php';
        }else{
            include_once __DIR__ .'/../Repositorio/tiendaRepositorio.inc';
            $articuloTienda = (new TiendaRepositorio())->verArticulosPorTienda($_POST['nombreTienda']);
            $error = 'ARTICULOS DISPONIBLES EN LA TIENDA ' .$_POST['nombreTienda'].'<br>';
            include_once __DIR__ .'/../../app/plantillas/verArticulosPorTienda.php';
        }

      }
    }//fin metodo

    public function verArticulosPorTiendaAdministrador(){
      if($_SERVER['REQUEST_METHOD']=='POST'){
        if(empty($_POST['nombreTienda']) && isset($_POST['nombreTienda'])){
          $error = 'El nombre de la tienda está vacio';
          include_once __DIR__ .'/../../app/plantillas/verTiendasCadena.php';
        }else{
            include_once __DIR__ .'/../Repositorio/tiendaRepositorio.inc';
            $tiendaNombre = $_POST['nombreTienda'];
            $articuloTienda = (new TiendaRepositorio())->verArticulosPorTienda($_POST['nombreTienda']);
            $error = 'ARTICULOS DISPONIBLES EN LA TIENDA ' .$_POST['nombreTienda'].'<br>';
            include_once __DIR__ .'/../../app/plantillas/verArticulosPorTiendaAdministrador.php';
        }

      }
    }//fin metodo

    public function borrarArticuloTienda(){
      if($_SERVER['REQUEST_METHOD']=='POST'){
        if(empty($_POST['idArticulo']) && isset($_POST['idArticulo'])){
          $error = 'El id articulo esta vacio';
          include_once __DIR__ .'/../../app/plantillas/verArticulosPorTiendaAdministrador.php';
        }else{
            include_once __DIR__ .'/../Repositorio/tiendaRepositorio.inc';
            $articuloTienda = (new TiendaRepositorio())->verArticulosPorTienda($_POST['tiendaNombre']);
            $ID = (int)$_POST['idArticulo'];
            $bo = (new TiendaRepositorio())->borrarrArticulosPorTienda($ID);
            if($bo){
                $error = 'El ARTICULO HA SIDO BORRADO. ARTICULOS DISPONIBLES EN LA TIENDA ' .$_POST['tiendaNombre'].'<br>';
            }else{
                $error = 'El ARTICULO NO HA SIDO BORRADO. ARTICULOS DISPONIBLES EN LA TIENDA ' .$_POST['tiendaNombre'].'<br>';
            }

            include_once __DIR__ .'/../../app/plantillas/verArticulosPorTiendaAdministrador.php';
        }

      }
    }


    public function insertarTienda(){
      include_once __DIR__ .'/../../app/plantillas/insertarTienda.php';

      }

    public function verTiendaModificada(){
      include_once __DIR__ .'/../Repositorio/tiendaRepositorio.inc';
      $tiendas = (new TiendaRepositorio())->devolverProvinciasDistintas();
      if($_SERVER['REQUEST_METHOD']=='POST'){

        if(empty($_POST['nombreTienda']) && isset($_POST['nombreTienda'])){
          $error = 'El nombre de la tienda está vacio';include_once __DIR__ .'/../../app/plantillas/buscarTiendasProvinciaAdministrador.php';
        }elseif(empty($_POST['nombreProvincia']) && isset($_POST['nombreProvincia'])){
          $error = 'El nombre de la provincia está vacio';include_once __DIR__ .'/../../app/plantillas/buscarTiendasProvinciaAdministrador.php';
        }elseif(empty($_POST['nombreCiudad']) && isset($_POST['nombreCiudad'])){
          $error = 'El nombre de la ciudad está vacio';include_once __DIR__ .'/../../app/plantillas/buscarTiendasProvinciaAdministrador.php';
        }elseif(empty($_POST['telefonoTienda']) && isset($_POST['telefonoTienda'])){
          $error = 'El campo del teléfono está vacio';include_once __DIR__ .'/../../app/plantillas/buscarTiendasProvinciaAdministrador.php';
        }else{
              $boolIn = (new TiendaRepositorio())->modificarTienda($_POST['nombreTienda'],$_POST['nombreProvincia'],$_POST['nombreCiudad'],$_POST['telefonoTienda']);
              if($boolIn){
                  $idtienda = (new TiendaRepositorio())->sacarIdTienda($_POST['nombreTienda']);
                  $arrayTienda = (new TiendaRepositorio())->verTiendaPorId($idtienda);

                  $error = 'HA SIDO INSERTADA LA TIENDA ' .$_POST['nombreTienda'].'<br>';
                  include_once __DIR__ .'/../../app/plantillas/verTiendaModificada.php';
              }else{
                  $error = 'NO HA SIDO INSERTADA LA TIENDA<br>';
                  include_once __DIR__ .'/../../app/plantillas/buscarTiendasProvinciaAdministrador.php';
              }

        }

      }
    }

    public function verTiendaInsertada(){
      if($_SERVER['REQUEST_METHOD']=='POST'){
        if(empty($_POST['nombreTienda']) && isset($_POST['nombreTienda'])){
          $error = 'El nombre de la tienda está vacio';include_once __DIR__ .'/../../app/plantillas/insertarTienda.php';
        }elseif(empty($_POST['nombreProvincia']) && isset($_POST['nombreProvincia'])){
          $error = 'El nombre de la provincia está vacio';include_once __DIR__ .'/../../app/plantillas/insertarTienda.php';
        }elseif(empty($_POST['nombreCiudad']) && isset($_POST['nombreCiudad'])){
          $error = 'El nombre de la ciudad está vacio';include_once __DIR__ .'/../../app/plantillas/insertarTienda.php';
        }elseif(empty($_POST['telefonoTienda']) && isset($_POST['telefonoTienda'])){
          $error = 'El campo del teléfono está vacio';include_once __DIR__ .'/../../app/plantillas/insertarTienda.php';
        }else{
            include_once __DIR__ .'/../Repositorio/tiendaRepositorio.inc';
            $boolExiste =(new TiendaRepositorio())->comprobarTiendaExiste($_POST['nombreTienda'],$_POST['nombreCiudad']);
            if($boolExiste){
              $boolIn = (new TiendaRepositorio())->insertarTienda($_POST['nombreTienda'],$_POST['nombreProvincia'],$_POST['nombreCiudad'],$_POST['telefonoTienda']);
              if($boolIn){
                  $idtienda = (new TiendaRepositorio())->sacarIdTienda($_POST['nombreTienda']);
                  $arrayTienda = (new TiendaRepositorio())->verTiendaPorId($idtienda);

                  $error = 'HA SIDO INSERTADA LA TIENDA ' .$_POST['nombreTienda'].'<br>';
              }else{
                  $error = 'NO HA SIDO INSERTADA LA TIENDA<br>';
              }
            }else{
              $error = "La tienda ya existe";
              include_once __DIR__ .'/../../app/plantillas/insertarTienda.php';
            }


            include_once __DIR__ .'/../../app/plantillas/verTiendaInsertada.php';
        }

      }
    }//fin m etodo

  }//fin clase
?>
