<?php

class reservaController{
  public function anadirReserva(){
      include_once __DIR__ . "/../Repositorio/reservaRepositorio.inc";
      include_once __DIR__ . "/../Repositorio/articuloReservadoRepositorio.inc";
      include_once __DIR__ . "/../Repositorio/articuloRepositorio.inc";
      include_once __DIR__ . "/../Repositorio/almacenRepositorio.inc";
      if($_SERVER['REQUEST_METHOD']=='POST'){
          if(empty($_POST['numeroArticulos']) && isset($_POST['numeroArticulos'])){
              $articulos = (new articuloRepositorio)->cargarArticulos();
              $error = 'Debes poner el número de artículos que deseas adquirir';
              include_once __DIR__ . "/../../app/plantillas/verArticulosComprarUsuario.php";
          }else{
              $numeroArticulos = $_POST['numeroArticulos'];//cantidad INT NOT NULL,
              $idTienda = (int)$_POST['idTienda'];///idTienda INT NOT NULL,
              $idArticulo = (int)$_POST['idArticulo'];//idArticulo INT NOT NULL,
              $idUsuario = $_SESSION['userNombre'];//es el nombre de nick //idUsuario NVARCHAR(100) NOT NULL,
              $grupo = $_SESSION['grupoUser'];
              //esto es para mostrar el articulo reservado
              $articulo = (new ArticuloRepositorio())->devolverArticulo($idArticulo);
              $hayExistencias = (new AlmacenRepositorio())->comprobarStockExistencias($idTienda,$idArticulo);
              if($hayExistencias){//si hay existencias en el almacen
                    $pc = (new ArticuloRepositorio())->devolverPrecioArticulo($idArticulo);//pReserva MONEY NOT NULL,
                    //comprobamos que este cliente no tenga más reservas
                    $boolComprobarClienteReserva = (new ReservaRepositorio())->comprobarClienteReserva($idUsuario,$grupo);
                    if($boolComprobarClienteReserva){
                        //primero insertamos la reserva en caso de que esta no exista, si existe no es necesario
                        $boolComprobarReservaInsertada = (new ReservaRepositorio())->insertarReserva($grupo,$idUsuario);
                        $boolArticulosReservadosDuplicados = (new articuloReservadoRepositorio())->comprobarArticulosReservadosDuplicados($idUsuario,$idArticulo);
                        if(!$boolArticulosReservadosDuplicados){
                            $error = 'No puedes reservar dos veces el mismo articulo';
                        }
                    }
              }else{
                  $error = 'No hay existencias de este artículo en esta tienda';
              }

          }

          include_once __DIR__ . "/../../app/plantillas/anadirCompraCarrito.php";
      }

  }//fin metodo

}//fin clase

?>
