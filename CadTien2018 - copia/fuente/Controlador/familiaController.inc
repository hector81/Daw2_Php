<?php

class familiaController {

  public function buscarArticulosPorCategoria(){
    //solo nos lleva a la página
    include_once __DIR__ . "/../Repositorio/familiaRepositorio.inc";
    $familias = (new familiaRepositorio)->cargarFamilias();
    include_once __DIR__ . "/../../app/plantillas/buscarArticulosPorCategoria.php";
  }

  public function showCategorias(){
      include_once __DIR__ . "/../Repositorio/familiaRepositorio.inc";
      $familias = (new familiaRepositorio)->cargarFamilias();
      include_once __DIR__ . "/../../app/plantillas/showCategorias.php";
  }//fin metodo


  public function verArticulosCategoriaAdministrador(){
      include_once __DIR__ . "/../Repositorio/familiaRepositorio.inc";
      $familias = (new familiaRepositorio)->cargarFamilias();
      include_once __DIR__ . "/../../app/plantillas/verArticulosCategoriaAdministrador.php";
  }//fin metodo

  public function verArticulosPorCategoriaAdministrador(){
    include_once __DIR__ . "/../Repositorio/familiaRepositorio.inc";
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $articulosCategoriaId = (int)$_POST['articulosCategoriaId'];
      $articuloFamilias = (new familiaRepositorio)->verArticulosPorIdFamilia($articulosCategoriaId);

    }

    include_once __DIR__ . "/../../app/plantillas/verArticulosPorCategoriaAdministrador.php";
  }

  public function verModificarCategorias(){
    include_once __DIR__ . "/../Repositorio/familiaRepositorio.inc";
    $familias = (new familiaRepositorio)->cargarFamilias();
    include_once __DIR__ . "/../../app/plantillas/verModificarCategorias.php";
  }

  public function modificarCategoria(){
    include_once __DIR__ . "/../Repositorio/familiaRepositorio.inc";
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $nombreCategoria = $_POST['nombreCategoria'];
      $descripcionCategoria = $_POST['descripcionCategoria'];
      $articulosCategoriaId = $_POST['articulosCategoriaId'];
      $error ="REESCRIBE LOS DATOS QUE QUIERES CAMBIAR";
    }
    include_once __DIR__ . "/../../app/plantillas/modificarCategoria.php";
  }//fin metodo


  public function verCategoriaModificada(){
    include_once __DIR__ . "/../Repositorio/familiaRepositorio.inc";
    $familias = (new familiaRepositorio)->cargarFamilias();
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if(empty($_POST['nombreCategoria']) && isset($_POST['nombreCategoria'])){
          $error = "Debes poner un nombre de categoría";include_once __DIR__ . "/../../app/plantillas/verModificarCategorias.php";
      }elseif(empty($_POST['descripcionCategoria']) && isset($_POST['descripcionCategoria'])){
          $error = "Debes poner una descripción de categoría";include_once __DIR__ . "/../../app/plantillas/verModificarCategorias.php";
      }else{
          $nombreCategoria = $_POST['nombreCategoria'];
          $descripcionCategoria = $_POST['descripcionCategoria'];
          $articulosCategoriaId = (int)$_POST['articulosCategoriaId'];
          $boolInsert = (new familiaRepositorio)->modificarFamilia($nombreCategoria,$descripcionCategoria,$articulosCategoriaId);
          if($boolInsert){
            $error ="SE HA MODIFICADO LA CATEGORIA";
            $familias = (new familiaRepositorio)->cargarFamilias();
            include_once __DIR__ . "/../../app/plantillas/verModificarCategorias.php";
          }else{
              $error ="NO SE HA MODIFICADO LA CATEGORIA";
              include_once __DIR__ . "/../../app/plantillas/verModificarCategorias.php";
          }
      }


    }

  }//fin metodo

  public function borrarCategoria(){
    include_once __DIR__ . "/../Repositorio/familiaRepositorio.inc";
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $articulosCategoriaId = (int)$_POST['articulosCategoriaId'];
      $boolConfirmacion = (new familiaRepositorio)->borrarCategoria($articulosCategoriaId);
      if($boolConfirmacion){
          $error ="CATEGORIA BORRADA";
          $familias = (new familiaRepositorio)->cargarFamilias();
      }else{
          $error ="CATEGORIA NO BORRADA";
          $familias = (new familiaRepositorio)->cargarFamilias();
      }
    }
    include_once __DIR__ . "/../../app/plantillas/verModificarCategorias.php";
  }//fin metodo

  public function darAltaCategoria(){
    include_once __DIR__ . "/../Repositorio/familiaRepositorio.inc";
    $error = "DA DE ALTA CATEGORIA";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(empty($_POST['nombreCategoria']) && isset($_POST['nombreCategoria'])){
            $error = "Debes poner un nombre de categoría";
        }elseif(empty($_POST['descripcionCategoria']) && isset($_POST['descripcionCategoria'])){
            $error = "Debes poner una descripción de categoría";
        }else{
            $boolExiste = (new familiaRepositorio)->comprobarFamiliaExiste($_POST['nombreCategoria']);
            if($boolExiste){
                $boolConfirmacion =  (new familiaRepositorio)->darAltaCategoria($_POST['nombreCategoria'],$_POST['descripcionCategoria']);
                if($boolConfirmacion){
                    $error = "Categoría introducida";
                }else{
                    $error = "Categoría no introducida";
                }
            }else{
                $error = "El nombre de la categoria ya esta dado de alta";
            }

        }
    }
    include_once __DIR__ . "/../../app/plantillas/darAltaCategoria.php";
  }//fin metodo

  public function elegirProductoCategoria(){
    include_once __DIR__ . "/../Repositorio/familiaRepositorio.inc";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(empty($_POST['selectCategorias']) && isset($_POST['selectCategorias'])){
            $error = "Debes poner un nombre de categoría";
        }else{
          $articulosPorFamilia = (new FamiliaRepositorio)->verArticulosPorCategoria($_POST['selectCategorias']);
          include_once __DIR__ . "/../Repositorio/tiendaRepositorio.inc";
          $tiendas = (new tiendaRepositorio)->verTodasTiendasCiudad();
          $error = 'ARTÍCULOS DE LA CATEGORÍA '.$_POST['selectCategorias'].'<br>' ;
          include_once __DIR__ . "/../../app/plantillas/elegirProductoCategoria.php";
        }

    }
  }//fin metodo

  //para actualizar foto
  public function actualizarFotoArticuloCategoria(){
      $boolFoto = false;$numero = (int)$_POST['idArticulo'];
      include_once __DIR__ . "/../Repositorio/familiaRepositorio.inc";
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


      }
      $articuloFamilias = (new familiaRepositorio)->verArticulosPorIdFamilia($numero);
      include_once __DIR__ . "/../../app/plantillas/verArticulosPorCategoriaAdministrador.php";
  }//fin metodo


  public function borrarArticuloCategoria(){
      include_once __DIR__ . "/../Repositorio/articuloRepositorio.inc";
      include_once __DIR__ . "/../Repositorio/familiaRepositorio.inc";
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
          if(empty($_POST['idArticulo']) && isset($_POST['idArticulo'])){
              $error = "ID ARTICULO NO HA SIDO ENVIADO";
          }else{
              $numero = (int)$_POST['idArticulo'];
              //hay que borrarlo primero del almacen
              $boo = (new ArticuloRepositorio)->borrarArticuloAlmacen($numero);
              $boolConfirmacion = (new ArticuloRepositorio)->borrarArticuloArticulo($numero);

              if($boolConfirmacion){
                $error = "El artículo o producto ha sido borrado";
              }else{
                $error = "El artículo o producto no ha sido borrado";
              }
          }
      }
      $articuloFamilias = (new familiaRepositorio)->verArticulosPorIdFamilia($numero);
      include_once __DIR__ . "/../../app/plantillas/verArticulosPorCategoriaAdministrador.php";
  }//fin metodo

}//fin clase
 ?>
