<?php
  class CarritoController{
    public function addToCart(){
          if (isset($_POST['id']) && $_POST['uds']>0){
            $id = $_POST['id'];
            if(!isset($_SESSION['carrito'][$id])){
              $_SESSION['carrito'][$id] = array('articulo'=> null, 'uds'=>$_POST['uds']);
              $_SESSION['message'] = "Se han añadido " . $_POST['uds'] . " unidades de este producto a tu carrito";
            }else{
              $_SESSION['carrito'][$id]['uds'] += $_POST['uds'];
              $_SESSION['message'] = "Se han sumado " . $_POST['uds'] . " unidades de este producto a tu carrito";
            }
           }
           header('Location: /cadenatiendas/index.php?ctl=showArticle&id=' . $_POST['id']);
           require __DIR__ . '/../../app/plantillas/showArticle.php';
    }

    public function showCart(){
      require_once __DIR__ . '/../Repositorio/articuloRepositorio.php';
      foreach ($_SESSION['carrito'] as $idArticulo => $otros){
        $_SESSION['carrito'][$idArticulo]['articulo'] = (new ArticuloRepositorio)->findArticuloById(array($idArticulo));
      }
      require __DIR__ . '/../../app/plantillas/showCart.php';
    }

    public function clearCart(){
      $this->vaciarCarrito();
      require __DIR__ . '/../../app/plantillas/showCart.php';
    }

    private function vaciarCarrito(){
      unset($_SESSION['carrito']);
      $_SESSION['carrito']=[];
    }

    public function verifyPurchase(){
      require __DIR__ . '/../../app/plantillas/deliveryOptions.php';
    }

    public function finalizePurchase(){
      if($_SERVER['REQUEST_METHOD']=='POST' && $_SESSION['grupo'] === 'cliente' && count($_SESSION['carrito'])>0 && isset($_POST['envio']) && isset($_POST['pago'])){
          require_once __DIR__ . '/../Repositorio/carritoRepositorio.php';
          if ((new CarritoRepositorio)->finalizePurchase()) {
            $this->vaciarCarrito();
            $_SESSION['message']= "Su compra se ha realizado con éxito";
            header('Location: /cadenatiendas');
          }else{
            $_SESSION['message']= "Sentimos las molestias, ha habido un error durante la transacción y su compra no ha podido llevarse a cabo.";
            header('Location: /cadenatiendas');
          }
      }else{
          $_SESSION['message']= "Debe rellenar el formulario para confirmar la compra";
          require __DIR__ . '/../../app/plantillas/deliveryOptions.php';
        }
      }
    }

 ?>
