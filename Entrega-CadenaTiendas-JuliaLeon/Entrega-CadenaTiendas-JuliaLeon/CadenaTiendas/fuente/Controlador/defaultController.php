<?php
class DefaultController{
  public function home(){
    $params = array('mensaje' => 'Bienvenido a la Cadena de Tiendas Media',
                    'fecha' => date('d-m-Y'),);
    require __DIR__ . '/../../app/plantillas/home.php';
  }
}
