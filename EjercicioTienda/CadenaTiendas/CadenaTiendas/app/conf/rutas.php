<?php

// enrutamiento
$mapeoRutas =
  array('inicio' =>
          array('controller' =>'defaultController', 'action' =>'inicio'),
        'actualizaImagenes' =>
          array('controller' =>'articuloController', 'action' =>'actualizaImagenes'),
        'verArticulo' =>
          array('controller' => 'articuloController', 'action' => 'verArticulo'),
        'nuevaFoto' =>
          array('controller' => 'articuloController', 'action' => 'nuevaFoto'),
        );
