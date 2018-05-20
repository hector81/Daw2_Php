<?php

class ReservaController
{
  public function comprarLibroUsuarioReserva(){
   include_once __DIR__ . "/../Repositorio/reservaRepositorio.inc";
   include_once __DIR__ . "/../Repositorio/alamacenRepositorio.inc";
   if($_SERVER['REQUEST_METHOD']=='POST'){
       if(!empty($_POST['selectIdTienda']) && isset($_POST['selectIdTienda'])){
           $error = 'Debes seleccionar una tienda';
       }else{
           //capturamos variables
           $idLibro = (int)$_POST['idLibro'];
           $idEjemplar = (int)$_POST['IdEjemplar'];
           $idTienda = (int)$_POST['selectIdTienda'];
           $usuario = $_SESSION['userNombre'];//es el nombre de nick //
           $cantidad = 3;
           //comprobamos que haya existencias
           $boolHayExistencias = (new AlmacenRepositorio())->comprobarStockExistencias($idTienda,$idEjemplar);
           if(!$boolHayExistencias){
               $error = 'En esta tienda no hay stock para este libro';
           }else{
               //Si hay existencias comprobamos que este usuario tenga reservas
               $tieneClientesMasRerservas = (new ReservaRepositorio())->comprobarClienteNumeroReserva($usuario);

               if($boolComprobarReservaInsertada){
                   //$error = $usuario.'Tu reserva ha sido realizada';
                   ////////////////
                   //$boolComprobarReservaInsertada = (new ReservaRepositorio())->insertarReserva($usuario);
                   //insertamos lineas de reserva
                   //$idReserva = (new ReservaRepositorio())->sacarIdReserva($usuario);
               }else{
                   $error = 'No se ha podido realizar la reserva por algún problema';
               }
           }
       }
   }else{
       $error = 'Se ha producido algún error';
   }
   include_once __DIR__ . "/../Repositorio/librosRepositorio.inc";
   $libroIndividual = (new LibrosRepositorio)->verLibrosIndividual($_GET['idLibro']);
   include_once __DIR__ . "/../../app/plantillas/visitante/verLibrosIndividualUsuario.php";
}//fin metodo

}//fin clase

?>
