<?php

// enrutamiento
$mapeoRutas =
  array('inicio' =>
          array('controller' =>'defaultController', 'action' =>'inicio'),
        'actualizaImagenes' =>
          array('controller' =>'articuloController', 'action' =>'actualizaImagenes'),
        'inicioSesion' =>
          array('controller' =>'ingresoController', 'action' =>'inicioSesion'),
        'inicioSesionUsuario' =>
          array('controller' =>'ingresoController', 'action' =>'inicioSesionUsuario'),
        'verArticulo' =>
          array('controller' => 'articuloController', 'action' => 'verArticulo'),
        'nuevaFoto' =>
          array('controller' => 'articuloController', 'action' => 'nuevaFoto'),
        'altaUsuario' =>
          array('controller' => 'ingresoController', 'action' => 'altaUsuario'),
        'todosLosProductos' =>
          array('controller' => 'articuloController', 'action' => 'todosLosProductos'),
        'nuestrasTiendas' =>
          array('controller' => 'tiendaController', 'action' => 'nuestrasTiendas'),
        'buscar' =>
          array('controller' => 'articuloController', 'action' => 'buscar'),
        'categorias' =>
          array('controller' => 'articuloController', 'action' => 'categorias'),
        'verArticulo' =>
          array('controller' => 'articuloController', 'action' => 'verArticulo'),
        'cerrarSesion' =>
          array('controller' => 'ingresoController', 'action' => 'cerrarSesion'),
        'visualizarCategorias' =>
          array('controller' => 'articuloController', 'action' => 'visualizarCategorias'),
        'verResenas' =>
          array('controller' => 'articuloController', 'action' => 'verResenas'),
        'categoriasPresentacion' =>
          array('controller' => 'articuloController', 'action' => 'categoriasPresentacion'),
        'comprarProductoUsuario' =>
          array('controller' => 'articuloController', 'action' => 'comprarProductoUsuario'),
        );
