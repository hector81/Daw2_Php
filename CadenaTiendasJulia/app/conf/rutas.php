<?php
$mapeoRutas =
  array('home' =>
          array('controller' =>'defaultController', 'action' =>'home'),
        'actualizaImagenes' =>
          array('controller' =>'articuloController', 'action' =>'actualizaImagenes'),
        'artByCategory' =>
          array('controller' => 'articuloController', 'action' => 'artByCategory'),
        'searchArticle' =>
          array('controller' =>'articuloController', 'action' =>'searchArticle'),
        'showArticle' =>
          array('controller' => 'articuloController', 'action' => 'showArticle'),
        'nuevaFoto' =>
          array('controller' => 'articuloController', 'action' => 'nuevaFoto'),
        'showCategories' =>
          array('controller' =>'categoriaController', 'action' =>'showCategories'),
        'login' =>
          array('controller' =>'usuarioController', 'action' =>'login'),
        'userProfile' =>
          array('controller' =>'usuarioController', 'action' =>'userProfile'),
        'signIn' =>
          array('controller' =>'usuarioController', 'action' =>'signIn'),
        'logOut' =>
          array('controller' =>'usuarioController', 'action' =>'logOut'),
        'addToCart' =>
          array('controller' =>'carritoController', 'action' =>'addToCart'),
        'showCart' =>
          array('controller' =>'carritoController', 'action' =>'showCart'),
        'clearCart' =>
          array('controller' =>'carritoController', 'action' =>'clearCart'),
        'verifyPurchase' =>
          array('controller' =>'carritoController', 'action' =>'verifyPurchase'),
        'finalizePurchase' =>
          array('controller' =>'carritoController', 'action' =>'finalizePurchase'),
        );
?>
