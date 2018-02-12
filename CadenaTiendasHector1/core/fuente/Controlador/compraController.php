<?php

class CompraController
{
  //para ver carrito
  public function verCarrito()
  {

    require __DIR__ . '/../Repositorio/compraRepositorio.php';
    $carrito = (new CompraRepositorio)->verCarrito($_SESSION['usuario']);
    $total = (new CompraRepositorio)->sumarCarrito($_SESSION['usuario']);
    $resultado = $total;
      //ESTA PARTE ES PARA BORRAR DEL CARRITO
      if($_SERVER['REQUEST_METHOD']=='POST'){
        if($_POST['idCompra'] != ""){

            $idCompra = (int)$_POST['idCompra'];
            $comprobarId = (new CompraRepositorio)->comprobarCompraExiste($idCompra);
            if($comprobarId == true){
              $comprobarBorrado = (new CompraRepositorio)->borrarCompraCarritoId($idCompra);
              if($comprobarBorrado== true){
                  $carrito = (new CompraRepositorio)->verCarrito($_SESSION['usuario']);
                  $error = 'COMPRA BORRADA';
              }else{
                  $error = 'COMPRA NO BORRADA';
              }
            }else{
              $error = 'ID COMPRA NO EXISTE';
            }
        }else{
          $error = 'ID VACIO';
        }
      }
    require __DIR__ . '/../../app/plantillas/verCarrito.php';
  }



  public function comprarProductoCarrito()
  {
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if($_POST['nombreProducto'] != ""){
          require __DIR__ . '/../Repositorio/articuloRepositorio.php';
          require __DIR__ . '/../Repositorio/compraRepositorio.php';
          $comprobarNombre = (new ArticuloRepositorio)->comprobarArticuloNombreExiste($_POST['nombreProducto']);
          if($comprobarNombre== true){
            $ID = (new ArticuloRepositorio)->findIdArticuloByNombre($_POST['nombreProducto']);
            $resultado = (new ArticuloRepositorio)->comprarProductoUsuario($ID);
            require __DIR__ . '/../../app/plantillas/comprarProductoUsuario.php';
          }else{
              $error = 'PRODUCTO NO EXISTE';
          }

      }else{
        $error = 'NOMBRE VACIO';
      }

    }
    require __DIR__ . '/../../app/plantillas/comprarProductoCarrito.php';
  }

}
?>
