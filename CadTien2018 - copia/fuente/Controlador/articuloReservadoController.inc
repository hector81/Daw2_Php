<?php

class articuloReservadoController{
  public function anadirCompraCarritoArticuloReservado(){
      include_once __DIR__ . "/../Repositorio/articuloReservadoRepositorio.inc";
      include_once __DIR__ . "/../Repositorio/tiendaRepositorio.inc";
      if($_SERVER['REQUEST_METHOD']=='POST'){
          $idUsuario = $_SESSION['userNombre'];//es el nombre de nick //idUsuario NVARCHAR(100) NOT NULL,
          $grupo = $_SESSION['grupoUser'];
          $idArticulo = (int)$_POST['idArticuloIndividual'];
          $pc = (float)$_POST['pc'];
          $numeroArticulos = (int)$_POST['numeroArticulos'];
          $idTienda = (int)$_POST['idTienda'];
          ////comprobamos que haya suficiente stock en esa tienda de ese articulo
          //$boolComprobarSuficienteStock = (new TiendaRepositorio())->comprobarStockArticuloTienda($idArticulo,$idTienda,$numeroArticulos);
          //echo '-------';var_dump($boolComprobarSuficienteStock);echo '-------';

                ///comprobamos que en la reserva no se pueda introducir un articulo repetido
                $boolArticulosReservadosDuplicados = (new articuloReservadoRepositorio())->comprobarArticulosReservadosDuplicados($idUsuario,$idArticulo);
                if(!$boolArticulosReservadosDuplicados){
                    $error = 'No puedes reservar dos veces el mismo articulo';
                    include_once __DIR__ . "/../../app/plantillas/verArticulosComprarUsuario.php";
                }else{
                    //si no esta repetido luego insertamos el articulo reservado
                    $boolConfirmacionArtiReserva = (new articuloReservadoRepositorio())->insertarArticuloReservado($idUsuario,$idArticulo,$numeroArticulos,$pc,$idTienda) ;
                    if(!$boolConfirmacionArtiReserva){//si ha insertado la venta
                        $carrito = (new articuloReservadoRepositorio)->verCarrito($_SESSION['userNombre']);
                        $error = 'El artículo ha sido reservado y está insertado en reservas';
                    }else{
                        $error = 'El artículo no ha sido reservado por algun problema';
                    }
                }
                /////////////////////
    
              //$carrito = (new articuloReservadoRepositorio)->verCarrito($_SESSION['userNombre']);
            //  $error = 'No hay suficiente stock de este artículo en esta tienda';


          include_once __DIR__ . "/../../app/plantillas/verCarrito.php";
      }

  }//fin metodo

  public function verCarrito(){
      include_once __DIR__ . "/../Repositorio/articuloReservadoRepositorio.inc";
      $carrito = (new articuloReservadoRepositorio)->verCarrito($_SESSION['userNombre']);
      include_once __DIR__ . "/../../app/plantillas/verCarrito.php";
  }//fin metodo

  public function borrarArticuloDelCarrito(){
      include_once __DIR__ . "/../Repositorio/articuloReservadoRepositorio.inc";
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
          if(empty($_POST['idUsuario']) && isset($_POST['idUsuario'])){
            $error = "El id de USUARIO debe ser enviado";
          }if(empty($_POST['idArticulo']) && isset($_POST['idArticulo'])){
            $error = "El id de articulo debe ser enviado";
          }else{
              $idUsuario = $_POST['idUsuario'];
              $idArticulo = (int)$_POST['idArticulo'];
              $boolConfirmacion = (new ArticuloReservadoRepositorio)->borrarArticuloReservado($idUsuario,$idArticulo);
              if($boolConfirmacion){
                $error = "Este pedido ha sido borrado del total del carrito";
              }else{
                $error = "Este pedido no ha sido borrado del total del carrito";
              }
          }
      }
      $carrito=null;
      $carrito = (new articuloReservadoRepositorio)->verCarrito($_SESSION['userNombre']);
      include_once __DIR__ . "/../../app/plantillas/verCarrito.php";
  }//fin metodo

}//fin clase

?>
