<?php

class ventaController {

    public function verArticulosComprarUsuario(){
      include_once __DIR__ . "/../Repositorio/articuloRepositorio.inc";
      include_once __DIR__ . "/../Repositorio/tiendaRepositorio.inc";
      $tiendas = (new tiendaRepositorio)->verTodasTiendasCiudad();
      $articulos = (new articuloRepositorio)->cargarArticulos();
      include_once __DIR__ . "/../../app/plantillas/verArticulosComprarUsuario.php";
    }//fin metodo

    public function confirmarVenta(){
      include_once __DIR__ . "/../Repositorio/ventaRepositorio.inc";
      include_once __DIR__ . "/../Repositorio/articuloReservadoRepositorio.inc";
      include_once __DIR__ . "/../Repositorio/lineaVentaRepositorio.inc";
      include_once __DIR__ . "/../Repositorio/reservaRepositorio.inc";
      include_once __DIR__ . "/../Repositorio/AlmacenRepositorio.inc";
      if($_SERVER['REQUEST_METHOD']=='POST'){
          //$idReserva = (int)$_POST['idReserva'];
          $userNombre = $_SESSION['userNombre'];
          $precioTotal = $_POST['precioTotal'];
          $envio = true;
          $carrito = (new articuloReservadoRepositorio)->verCarrito($_SESSION['userNombre']);
          if($carrito == null){
              $error = "El carrito está vacio";
          }else{
            //primero insertamos la venta
            $boolConfVenta = (new VentaRepositorio)->insertarVenta($userNombre,$precioTotal);
            if($boolConfVenta){
              ////////////////////////////
                //sacamos LOS DATOS NEcesarios
                $idVenta = (new VentaRepositorio)->sacarIdVenta($userNombre);
                //luego insertamos la linea venta, necesitamos el carrito
                $boolLinea = (new LineaVentaRepositorio)->insertarLineaVenta($idVenta,$carrito);
                /////////////////////////////////

                if($boolLinea){
                    $error ="La venta y sus lineas han sido ingresadas";
                    //habra que borrar la reserva y luego esa mis accion borrara los articulos reservado
                    $boolborrarReservaUsuario = (new ReservaRepositorio)->borrarReservaUsuario($userNombre);
                    if($boolborrarReservaUsuario){
                        $error ="La venta y sus lineas han sido ingresadas y la reserva ha sido anulada";
                        //habra que borrarlo del almacen
                        $boolborrarModificarAlmacen = (new AlmacenRepositorio)->modificarAlmacenCarrito($carrito);
                        if($boolborrarModificarAlmacen){
                          $error ="La venta y sus lineas han sido ingresadas y la reserva ha sido anulada. Del almacen se ha quitado stock";
                        }
                    }

                }else{
                    $error ="La venta y sus lineas no han sido ingresadas";
                }

                //////////////////////////
            }else{
                $error ="La venta no ha sido ingresada";
            }
            ////////////////////////////
          }

      }
      include_once __DIR__ . "/../../app/plantillas/verCarrito.php";
    }//fin metodo



}//fin clase

?>
