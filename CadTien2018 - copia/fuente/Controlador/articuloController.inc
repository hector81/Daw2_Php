<?php

class ArticuloController {

  public function showArticulos(){
      include_once __DIR__ . "/../Repositorio/articuloRepositorio.inc";
      $articulos = (new articuloRepositorio)->cargarArticulos();
      include_once __DIR__ . "/../../app/plantillas/showArticulos.php";
  }//fin metodo

  public function verArticulosAdministrador(){
      include_once __DIR__ . "/../Repositorio/articuloRepositorio.inc";
      $articulos = (new articuloRepositorio)->cargarArticulos();
      include_once __DIR__ . "/../../app/plantillas/verArticulosAdministrador.php";
  }

  public function verArticulosPorCategoria(){
    if($_SERVER['REQUEST_METHOD']=='POST'){
          include_once __DIR__ . "/../Repositorio/articuloRepositorio.inc";
          $articulosPorFamilia = (new articuloRepositorio)->verArticulosPorCategoria($_POST['articulosCategoriaId']);
          $error = 'ARTÍCULOS DE LA CATEGORÍA '.$_POST['nombreCategoria'].'<br>' ;
          include_once __DIR__ . "/../../app/plantillas/verArticulosPorCategoria.php";
    }
  }//fin metodo

  public function verArticuloIndividual(){
    if($_SERVER['REQUEST_METHOD']=='POST'){
          include_once __DIR__ . "/../Repositorio/articuloRepositorio.inc";
          $articuloIndividual = (new articuloRepositorio)->verArticuloIndividual($_POST['idArticuloIndividual']);
          include_once __DIR__ . "/../../app/plantillas/verArticuloIndividual.php";
    }
  }

  //para buscar
  public function buscar()
    {
      $params = array('mensaje' => 'Bienvenido a la Cadena de Tiendas Media',
                        'fecha' => date('d-m-Y'),);
      $listaFamiliaComprobar = false;
      $listaArticuloComprobar = false;
      $listaTiendaComprobar = false;
      $error = '';$errorA = '';$errorT = '';$errorF = '';
      $listaFamilia = null;
      $listaArticulo = null;
      $listaTienda = null;
        if($_SERVER['REQUEST_METHOD']=='POST')
        if(empty($_POST['nombreBuscar']) && isset($_POST['nombreBuscar'])){
          $error = 'NOMBRE BUSQUEDA VACIA';
          $errorF = 'NO HAY RESULTADOS EN CATEGORIAS';
          $errorA = 'NO HAY RESULTADOS EN ARTÍCULOS';
          $errorT = 'NO HAY RESULTADOS EN TIENDAS';
        }else{
            $error = 'NOMBRE BUSQUEDA = '.$_POST['nombreBuscar'];
            include_once __DIR__ . "/../Repositorio/articuloRepositorio.inc";
            $listaFamiliaComprobar = (new ArticuloRepositorio)->encontrarFamiliaPalabraComprobar($_POST['nombreBuscar']);
            $listaArticuloComprobar = (new ArticuloRepositorio)->encontrarArticuloPalabraComprobar($_POST['nombreBuscar']);
            $listaTiendaComprobar = (new ArticuloRepositorio)->encontrarTiendaPalabraComprobar($_POST['nombreBuscar']);
            if($listaFamiliaComprobar == true){
                $errorF = 'HAY RESULTADOS EN CATEGORIAS';
                $listaFamilia = (new ArticuloRepositorio)->encontrarFamiliaPalabra($_POST['nombreBuscar']);
            }else{
                $errorF = 'NO HAY RESULTADOS EN CATEGORIAS';
            }
            if($listaArticuloComprobar == true){
                $listaArticulo = (new ArticuloRepositorio)->encontrarArticuloPalabra($_POST['nombreBuscar']);
                $errorA = 'HAY RESULTADOS EN ARTÍCULOS';
            }else{
                $errorA = 'NO HAY RESULTADOS EN ARTÍCULOS';
            }
            if($listaTiendaComprobar == true){
                $listaTienda = (new ArticuloRepositorio)->encontrarTiendaPalabra($_POST['nombreBuscar']);
                $errorT = 'HAY RESULTADOS EN TIENDAS';
            }else{
                $errorT = 'NO HAY RESULTADOS EN TIENDAS';
            }

        }
        include_once __DIR__ . '/../../app/plantillas/buscar.php';//siempre nos devolvera a buscar
    }//fin metodo

    //para buscar
    public function busquedaUsuario()
      {
        $params = array('mensaje' => 'Bienvenido a la Cadena de Tiendas Media',
                          'fecha' => date('d-m-Y'),);
        $listaFamiliaComprobar = false;
        $listaArticuloComprobar = false;
        $listaTiendaComprobar = false;
        $error = '';$errorA = '';$errorT = '';$errorF = '';
        $listaFamilia = null;
        $listaArticulo = null;
        $listaTienda = null;
          if($_SERVER['REQUEST_METHOD']=='POST')
          if(empty($_POST['nombreBuscar']) && isset($_POST['nombreBuscar'])){
            $error = 'NOMBRE BUSQUEDA VACIA';
            $errorF = 'NO HAY RESULTADOS EN CATEGORIAS';
            $errorA = 'NO HAY RESULTADOS EN ARTÍCULOS';
            $errorT = 'NO HAY RESULTADOS EN TIENDAS';
          }else{
              $error = 'NOMBRE BUSQUEDA = '.$_POST['nombreBuscar'];
              include_once __DIR__ . "/../Repositorio/articuloRepositorio.inc";
              $listaFamiliaComprobar = (new ArticuloRepositorio)->encontrarFamiliaPalabraComprobar($_POST['nombreBuscar']);
              $listaArticuloComprobar = (new ArticuloRepositorio)->encontrarArticuloPalabraComprobar($_POST['nombreBuscar']);
              $listaTiendaComprobar = (new ArticuloRepositorio)->encontrarTiendaPalabraComprobar($_POST['nombreBuscar']);
              if($listaFamiliaComprobar == true){
                  $errorF = 'HAY RESULTADOS EN CATEGORIAS';
                  $listaFamilia = (new ArticuloRepositorio)->encontrarFamiliaPalabra($_POST['nombreBuscar']);
              }else{
                  $errorF = 'NO HAY RESULTADOS EN CATEGORIAS';
              }
              if($listaArticuloComprobar == true){
                  $listaArticulo = (new ArticuloRepositorio)->encontrarArticuloPalabra($_POST['nombreBuscar']);
                  $errorA = 'HAY RESULTADOS EN ARTÍCULOS';
              }else{
                  $errorA = 'NO HAY RESULTADOS EN ARTÍCULOS';
              }
              if($listaTiendaComprobar == true){
                  $listaTienda = (new ArticuloRepositorio)->encontrarTiendaPalabra($_POST['nombreBuscar']);
                  $errorT = 'HAY RESULTADOS EN TIENDAS';
              }else{
                  $errorT = 'NO HAY RESULTADOS EN TIENDAS';
              }

          }
          include_once __DIR__ . '/../../app/plantillas/busquedaUsuario.php';//siempre nos devolvera a buscar
      }//fin metodo

      //para buscar
      public function busquedaAdministrador()
        {
          $params = array('mensaje' => 'Bienvenido a la Cadena de Tiendas Media',
                            'fecha' => date('d-m-Y'),);
          $listaFamiliaComprobar = false;
          $listaArticuloComprobar = false;
          $listaTiendaComprobar = false;
          $error = '';$errorA = '';$errorT = '';$errorF = '';
          $listaFamilia = null;
          $listaArticulo = null;
          $listaTienda = null;
            if($_SERVER['REQUEST_METHOD']=='POST')
            if(empty($_POST['nombreBuscar']) && isset($_POST['nombreBuscar'])){
              $error = 'NOMBRE BUSQUEDA VACIA';
              $errorF = 'NO HAY RESULTADOS EN CATEGORIAS';
              $errorA = 'NO HAY RESULTADOS EN ARTÍCULOS';
              $errorT = 'NO HAY RESULTADOS EN TIENDAS';
            }else{
                $error = 'NOMBRE BUSQUEDA = '.$_POST['nombreBuscar'];
                include_once __DIR__ . "/../Repositorio/articuloRepositorio.inc";
                $listaFamiliaComprobar = (new ArticuloRepositorio)->encontrarFamiliaPalabraComprobar($_POST['nombreBuscar']);
                $listaArticuloComprobar = (new ArticuloRepositorio)->encontrarArticuloPalabraComprobar($_POST['nombreBuscar']);
                $listaTiendaComprobar = (new ArticuloRepositorio)->encontrarTiendaPalabraComprobar($_POST['nombreBuscar']);
                if($listaFamiliaComprobar == true){
                    $errorF = 'HAY RESULTADOS EN CATEGORIAS';
                    $listaFamilia = (new ArticuloRepositorio)->encontrarFamiliaPalabra($_POST['nombreBuscar']);
                }else{
                    $errorF = 'NO HAY RESULTADOS EN CATEGORIAS';
                }
                if($listaArticuloComprobar == true){
                    $listaArticulo = (new ArticuloRepositorio)->encontrarArticuloPalabra($_POST['nombreBuscar']);
                    $errorA = 'HAY RESULTADOS EN ARTÍCULOS';
                }else{
                    $errorA = 'NO HAY RESULTADOS EN ARTÍCULOS';
                }
                if($listaTiendaComprobar == true){
                    $listaTienda = (new ArticuloRepositorio)->encontrarTiendaPalabra($_POST['nombreBuscar']);
                    $errorT = 'HAY RESULTADOS EN TIENDAS';
                }else{
                    $errorT = 'NO HAY RESULTADOS EN TIENDAS';
                }

            }
            include_once __DIR__ . '/../../app/plantillas/busquedaAdministrador.php';//siempre nos devolvera a buscar
        }//fin metodo

    //para actualizar foto
    public function actualizarFoto(){
        $boolFoto = false;
        if($_SERVER['REQUEST_METHOD']=='POST'){
            include_once __DIR__ . "/../Repositorio/articuloRepositorio.inc";
            $numero = (int)$_POST['idArticulo'];
            if(empty($_FILES['archivo']['name']) && isset($_FILES['archivo']['name']) &&
                empty($_FILES['archivo']['type']) && isset($_FILES['archivo']['type']) ){
                $error = "No has elegido ninguna foto";
            }else{
                $foto = $_FILES['archivo']['name'];
                $tipo = $_FILES['archivo']['type'];
                $elementos = array('id' => $numero,'imagen' => $foto, 'tipo' => $tipo);
                //ejecutamos el metodo
                $boolFoto = (new ArticuloRepositorio)->actualizarFoto($elementos);
                if($foto==null){
                    $boolFoto = false;
                }
            }

            include_once __DIR__ . "/../../app/plantillas/actualizarFoto.php";
        }
    }//fin metodo

    public function darAltaProducto(){
      include_once __DIR__ . "/../Repositorio/articuloRepositorio.inc";
      include_once __DIR__ . "/../Repositorio/almacenRepositorio.inc";
      $familias = (new ArticuloRepositorio)->devolverFamiliasPorArticulos();
      include_once __DIR__ .'/../Repositorio/tiendaRepositorio.inc';
      $tiendas = (new TiendaRepositorio())->verTiendasCadena();
      $error = "NO PUEDES REPETIR EL NOMBRE O NOMBRE CORTO DEL ARTICULO";
      if($_SERVER['REQUEST_METHOD']=='POST'){
          if(empty($_POST['nombreCorto']) && isset($_POST['nombreCorto'])){
              $error = "Debes poner un nombre corto";
          }elseif(empty($_POST['nombre']) && isset($_POST['nombre'])){
              $error = "Debes poner un nombre";
          }elseif(empty($_POST['descripcion']) && isset($_POST['descripcion'])){
              $error = "Debes poner una descripción";
          }elseif(empty($_POST['PVP']) && isset($_POST['PVP'])){
              $error = "Debes poner un precio";
          }elseif(empty($_POST['nombreFamilia']) && isset($_POST['nombreFamilia'])){
              $error = "Debes poner una categoria";
          }elseif(empty($_POST['nombreTienda']) && isset($_POST['nombreTienda'])){
              $error = "Debes poner el nombre tienda";
          }elseif(empty($_POST['numeroArticulos']) && isset($_POST['numeroArticulos'])){
              $error = "Debes poner un numero de articulos";
          }elseif(empty($_POST['archivo']) && isset($_POST['archivo'])){
              $error = "Debes elegir una foto";
          }else{
                $nombreCorto = $_POST['nombreCorto'];
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                //pvp lo convertimos en float
                $PVP = (float)$_POST['PVP'];//ES UN STRING
                ///sacamos el id de familia
                $nombreFamilia = $_POST['nombreFamilia'];
                $idFamilia =  (new ArticuloRepositorio)->sacarIdFamilia($nombreFamilia);
                //$imagen = $_POST['imagen'];
                $foto = $_FILES['imagen']['name'];
                $tipo = $_FILES['imagen']['type'];
                $elementos = array('imagen' => $foto, 'tipo' => $tipo);
                ////convertimos a bit o bool los dos agotado y pocas undiades
                $agotado = true;
                //numeroArticulos
                $numeroArticulos = (int)$_POST['numeroArticulos'];
                //nombreTienda
                $idTienda = $_POST['nombreTienda'];//es un int
                if($_POST['agotado'] == 'false'){
                  $agotado = false;
                }
                $pocasUnidades = true;
                if($_POST['pocasUnidades'] == 'false'){
                  $agotado = false;
                }


                $boolExiste = (new ArticuloRepositorio)->comprobarArticuloExiste($_POST['nombreCorto'],$_POST['nombre']);
                if($boolExiste){
                    $boolConfirmacion =  (new ArticuloRepositorio)->altaProducto($nombreCorto,$nombre,$descripcion,$PVP,$idFamilia
                    ,$elementos,$agotado,$pocasUnidades);
                    if($boolConfirmacion){
                      $artId =  (new ArticuloRepositorio)->devolverIdArticulo($nombreCorto,$nombre);
                      $boolAlmacen = (new AlmacenRepositorio)->introducirStockTienda($artId,$idTienda,$numeroArticulos);
                      if($boolAlmacen){
                        $error = "El artículo o producto ha sido insertado";
                      }else{
                            $error = "El artículo o producto no ha sido insertado";
                      }
                    }else{
                      $error = "El artículo o producto no ha sido insertado";
                    }
                }else{
                      $error = "El nombre o nombre corto del articulo ya existen";
                }
          }
      }
      include_once __DIR__ . "/../../app/plantillas/darAltaProducto.php";
    }//fin metodo

    public function borrarArticulo(){
        include_once __DIR__ . "/../Repositorio/articuloRepositorio.inc";
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(empty($_POST['idArticulo']) && isset($_POST['idArticulo'])){
                $error = "ID ARTICULO NO HA SIDO ENVIADO";
            }else{
                $idArticulo = (int)$_POST['idArticulo'];
                //hay que borrarlo primero del almacen
                $boo = (new ArticuloRepositorio)->borrarArticuloAlmacen($idArticulo);
                $boolConfirmacion = (new ArticuloRepositorio)->borrarArticuloArticulo($idArticulo);

                if($boolConfirmacion){
                  $error = "El artículo o producto ha sido borrado";
                }else{
                  $error = "El artículo o producto no ha sido borrado";
                }
            }
        }
        $articulos = (new articuloRepositorio)->cargarArticulos();
        include_once __DIR__ . "/../../app/plantillas/verArticulosAdministrador.php";
    }//fin metodo


    public function verModificarProductosAdministrador(){
      include_once __DIR__ . "/../Repositorio/articuloRepositorio.inc";
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $idArticulo = $_POST['idArticulo'];
          $nombreArticulo = $_POST['nombreArticulo'];
          $nombreCortoArticulo = $_POST['nombreCortoArticulo'];
          $descripcionArticulo = $_POST['descripcionArticulo'];
          $idFamiliaArticulo = $_POST['idFamiliaArticulo'];
          $pvpArticulo = $_POST['pvpArticulo'];
          $imagenArticulo = $_POST['imagenArticulo'];
          $familias = (new ArticuloRepositorio)->devolverFamiliasPorArticulos();
          $error = "CAMBIA LOS DATOS QUE DESEES O DEJALOS COMO ESTAN. NO LOS DEJES EN BLANCO";
      }
      include_once __DIR__ . "/../../app/plantillas/verModificarProductosAdministrador.php";
    }//fin metodo

    public function articuloModificadoAdministrador(){
      include_once __DIR__ . "/../Repositorio/articuloRepositorio.inc";
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
          if(empty($_POST['nombreCorto']) && isset($_POST['nombreCorto'])){
              $error = "Debes poner un nombre corto";
          }elseif(empty($_POST['nombre']) && isset($_POST['nombre'])){
              $error = "Debes poner un nombre";
          }elseif(empty($_POST['descripcion']) && isset($_POST['descripcion'])){
              $error = "Debes poner una descripción";
          }elseif(empty($_POST['PVP']) && isset($_POST['PVP'])){
              $error = "Debes poner un precio";
          }elseif(empty($_POST['nombreFamilia']) && isset($_POST['nombreFamilia'])){
              $error = "Debes poner el nombre de familia";
          }elseif(empty($_POST['archivo']) && isset($_POST['archivo'])){
              $error = "Debes elegir una foto";
          }else{
              $idArticulo = (int)$_POST['idArticulo'];
              $nombreArticulo = $_POST['nombreArticulo'];
              $nombreCortoArticulo = $_POST['nombreCortoArticulo'];
              $descripcionArticulo = $_POST['descripcionArticulo'];
              $pvpArticulo = (float)$_POST['pvpArticulo'];
              $idFamilia = (new ArticuloRepositorio)->sacarIdFamilia($_POST['nombreFamilia']);
              $foto = $_FILES['archivo']['name'];
              $tipo = $_FILES['archivo']['type'];
              $elementos = array('imagen' => $foto, 'tipo' => $tipo);
              $boolConfirmacion = (new ArticuloRepositorio)->modificarProductoArticulo($idArticulo,$nombreArticulo,$nombreCortoArticulo
              ,$descripcionArticulo,$pvpArticulo,$idFamilia,$elementos);
              if($boolConfirmacion){
                  $articuloIndividual = (new articuloRepositorio)->verArticuloIndividual($idArticulo);
                  $error = "ARTICULO MODIFICADO";

              }else{
                  $error = "ARTICULO NO MODIFICADO";
                  $articuloIndividual = (new articuloRepositorio)->verArticuloIndividual($idArticulo);
              }
          }


      }
      include_once __DIR__ . "/../../app/plantillas/articuloModificadoAdministrador.php";
    }//fin metodo

}//fin clase
 ?>
