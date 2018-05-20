<?php

class TiendasController
{
  public function tiendas(){
      include_once __DIR__ . "/../Repositorio/tiendasRepositorio.inc";
      $tiendaInicial = (new TiendasRepositorio())->devolverTiendaInicial();
      $tiendaTotal = (new TiendasRepositorio())->devolverTiendasTotales();
      include_once __DIR__ .'/../../app/plantillas/visitante/tiendas.php';
  }//fin metodo

  public function verTiendasIndividual(){
      include_once __DIR__ . "/../Repositorio/tiendasRepositorio.inc";
      $tiendaTotal = (new TiendasRepositorio())->devolverTiendasTotales();
      if($_SERVER['REQUEST_METHOD']=='GET'){
          if(empty($_GET['idTienda']) && isset($_GET['idTienda'])){
              $tiendaInicial = (new TiendasRepositorio())->devolverTiendaInicial();
              $error = 'Hay algún problema con la base de datos';
          }else{
              $tiendaInicial = (new TiendasRepositorio())->devolverTiendaIndividual($_GET['idTienda']);
          }
      }
      include_once __DIR__ .'/../../app/plantillas/visitante/tiendas.php';
  }//fin metodo

  public function verTiendasIndividualAdministrador(){
      include_once __DIR__ . "/../Repositorio/tiendasRepositorio.inc";
      if($_SERVER['REQUEST_METHOD']=='GET'){
          if(empty($_GET['idTienda']) && isset($_GET['idTienda'])){
              $tiendaInicial = (new TiendasRepositorio())->devolverTiendaInicial();
              $error = 'Hay algún problema con la base de datos';
          }else{
              $tiendaInicial = (new TiendasRepositorio())->devolverTiendaIndividual($_GET['idTienda']);
          }
      }
      include_once __DIR__ .'/../../app/plantillas/administrador/verTiendasIndividualAdministrador.php';
  }//fin metodo

  public function administrarTiendas(){
    include_once __DIR__ . "/../Repositorio/tiendasRepositorio.inc";
    $tiendaTotal = (new TiendasRepositorio())->devolverTiendasTotales();
    include_once __DIR__ .'/../../app/plantillas/administrador/administrarTiendas.php';
  }//fin metodo

  public function borrarTiendaAdministradores(){
    include_once __DIR__ . "/../Repositorio/tiendasRepositorio.inc";
    if($_SERVER['REQUEST_METHOD']=='GET'){
        if(empty($_GET['idTienda']) && isset($_GET['idTienda'])){
            $error = 'Hay algún problema con la base de datos y no ha podido ser borrada';
        }else{
            $idTienda = (int)$_GET['idTienda'];
            $borrarTiendaBool = (new TiendasRepositorio())->borrarTienda($idTienda);
            if($borrarTiendaBool){
                $error = 'La tienda ha sido eliminada';
            }else{
                $error = 'Hay algún problema con la base de datos y no ha podido ser borrada';
            }
        }
    }
    $tiendaTotal = (new TiendasRepositorio())->devolverTiendasTotales();
    include_once __DIR__ .'/../../app/plantillas/administrador/administrarTiendas.php';
  }//fin metodo

  public function modificarTiendaAdministrador(){
    include_once __DIR__ . "/../Repositorio/tiendasRepositorio.inc";
    if(empty($_GET['idTienda']) && isset($_GET['idTienda'])){
        $error = 'Hay algún problema con la base de datos y no pueden mostrarse los datos';
    }else{
        $tienda = (new TiendasRepositorio())->devolverTiendaIndividual($_GET['idTienda']);
    }
    //$tiendaTotal = (new TiendasRepositorio())->devolverTiendasTotales();tienda

    include_once __DIR__ .'/../../app/plantillas/administrador/modificarTiendaAdministrador.php';
  }//fin metodo

  public function enviarDatosModificacionTienda(){
      include_once __DIR__ . "/../Repositorio/tiendasRepositorio.inc";
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(empty($_POST['nombreTienda']) && isset($_POST['nombreTienda'])){
                $error = "Debes poner un municipio";
            }elseif(empty($_POST['municipio']) && isset($_POST['municipio'])){
                $error = "Debes poner un nombre";
            }elseif(empty($_POST['telefonoTienda']) && isset($_POST['telefonoTienda'])){
                $error = "Debes poner un teléfono";
            }elseif(empty($_POST['direccionTienda']) && isset($_POST['direccionTienda'])){
                $error = "Debes poner una dirección";
            }elseif(empty($_FILES['imagenTienda']['name']) && isset($_FILES['imagenTienda']['name'])){
                $error = "Debes poner una imagen de tienda. No puedes dejarla vacia";
            }elseif(empty($_POST['srcIframe']) && isset($_POST['srcIframe'])){
                $error = "Debes poner un src de iframe de google maps";
            }else{
                //estos datos son de la imagen
                $subirFoto = null;
                $name = $_FILES['imagenTienda']['name'];//array(5) { ["name"]=> string(0) "" ["type"]=> string(0) "" ["tmp_name"]=> string(0) "" ["error"]=> int(4) ["size"]=> int(0) }
                $type= $_FILES['imagenTienda']['type'];
                $tmp_name = $_FILES['imagenTienda']['tmp_name'];
                $error = $_FILES['imagenTienda']['error'];
                $size = $_FILES['imagenTienda']['size'];
                //estos son el resto de Datos
                $nombreTienda = $_POST['nombreTienda'];
                $municipio = (int)$_POST['municipio'];
                $telefonoTienda = $_POST['telefonoTienda'];
                $direccionTienda = $_POST['direccionTienda'];
                $srcIframe = $_POST['srcIframe'];
                $idTienda = (int)$_POST['idTienda'];
                // if($_FILES['imagenTienda'] != null){
                //     $subirFoto = (new TiendasRepositorio())->insertarImagenYsacarRutaImagen($name,$type,$tmp_name,$error,$size);//envia un array
                //      //var_dump($subirFoto);//devuelve este array $elementos = array('imagen' => $final_image, 'tipo' => $type);
                // }else{
                //   $subirFoto = null;var_dump($subirFoto);
                // }
                //subimos la foto
                $subirFoto = (new TiendasRepositorio())->insertarImagenYsacarRutaImagen($name,$type,$tmp_name,$error,$size);//envia un array
                //insertamos la tiendas
                $boolInsertarTienda = (new TiendasRepositorio())->insertarTiendaModificada($subirFoto,$nombreTienda,$municipio,$telefonoTienda
                ,$direccionTienda,$srcIframe,$idTienda);//devuelve un boolval
                if($boolInsertarTienda){
                    $error = "Tienda insertada correctamente";
                }else{
                    $error = "Ha habido un error y la tienda no ha sido insertada correctamente";
                }
            }
      }
    $idTienda = (int)$_POST['idTienda'];
    $tienda = (new TiendasRepositorio())->devolverTiendaIndividual($idTienda);
    include_once __DIR__ .'/../../app/plantillas/administrador/modificarTiendaAdministrador.php';
  }//fin metodo

  public function insertarNuevaTiendaAdministrador(){
      include_once __DIR__ .'/../../app/plantillas/administrador/insertarNuevaTiendaAdministrador.php';
  }

  public function enviarDatosInsercionTienda(){
        include_once __DIR__ . "/../Repositorio/tiendasRepositorio.inc";
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
              if(empty($_POST['nombreTienda']) && isset($_POST['nombreTienda'])){
                  $error = "Debes poner un municipio";
              }elseif(empty($_POST['municipio']) && isset($_POST['municipio'])){
                  $error = "Debes poner un nombre";
              }elseif(empty($_POST['telefonoTienda']) && isset($_POST['telefonoTienda'])){
                  $error = "Debes poner un teléfono";
              }elseif(empty($_POST['direccionTienda']) && isset($_POST['direccionTienda'])){
                  $error = "Debes poner una dirección";
              }elseif(empty($_FILES['imagenTienda']['name']) && isset($_FILES['imagenTienda']['name'])){
                  $error = "Debes poner una imagen de tienda. No puedes dejarla vacia";
              }elseif(empty($_POST['srcIframe']) && isset($_POST['srcIframe'])){
                  $error = "Debes poner un src de iframe de google maps";
              }else{
                  //estos datos son de la imagen
                  $subirFoto = null;
                  $name = $_FILES['imagenTienda']['name'];//array(5) { ["name"]=> string(0) "" ["type"]=> string(0) "" ["tmp_name"]=> string(0) "" ["error"]=> int(4) ["size"]=> int(0) }
                  $type= $_FILES['imagenTienda']['type'];
                  $tmp_name = $_FILES['imagenTienda']['tmp_name'];
                  $error = $_FILES['imagenTienda']['error'];
                  $size = $_FILES['imagenTienda']['size'];
                  //estos son el resto de Datos
                  $nombreTienda = $_POST['nombreTienda'];
                  $municipio = (int)$_POST['municipio'];
                  $telefonoTienda = $_POST['telefonoTienda'];
                  $direccionTienda = $_POST['direccionTienda'];
                  $srcIframe = $_POST['srcIframe'];
                  // if($_FILES['imagenTienda'] != null){
                  //     $subirFoto = (new TiendasRepositorio())->insertarImagenYsacarRutaImagen($name,$type,$tmp_name,$error,$size);//envia un array
                  //      //var_dump($subirFoto);//devuelve este array $elementos = array('imagen' => $final_image, 'tipo' => $type);
                  // }else{
                  //   $subirFoto = null;var_dump($subirFoto);
                  // }
                  //subimos la foto
                  $subirFoto = (new TiendasRepositorio())->insertarImagenYsacarRutaImagen($name,$type,$tmp_name,$error,$size);//envia un array
                  //insertamos la tiendas
                  $boolInsertarTienda = (new TiendasRepositorio())->insertarTienda($subirFoto,$nombreTienda,$municipio,$telefonoTienda
                  ,$direccionTienda,$srcIframe);//devuelve un boolval
                  if($boolInsertarTienda){
                      $error = "Tienda insertada correctamente";
                  }else{
                      $error = "Ha habido un error y la tienda no ha sido insertada correctamente";
                  }
              }
        }
        $tiendaTotal = (new TiendasRepositorio())->devolverTiendasTotales();
        include_once __DIR__ .'/../../app/plantillas/administrador/administrarTiendas.php';
  }//fin metodo


}//fin clase
