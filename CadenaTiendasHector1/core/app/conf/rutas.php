<?php

// enrutamiento
$mapeoRutas =
  array('inicio' =>
          array('controller' =>'ingresoController', 'action' =>'inicio'),
        'inicioSesion' =>
          array('controller' =>'ingresoController', 'action' =>'inicioSesion'),
        'altaUsuarioNoRegistrado' =>
          array('controller' =>'ingresoController', 'action' =>'altaUsuarioNoRegistrado'),
        'inicioSesionUsuario' =>
          array('controller' =>'ingresoController', 'action' =>'inicioSesionUsuario'),
        'altaUsuario' =>
          array('controller' => 'ingresoController', 'action' => 'altaUsuario'),
        'borrarUsuario' =>
          array('controller' => 'ingresoController', 'action' => 'borrarUsuario'),
        'cerrarSesion' =>
          array('controller' => 'ingresoController', 'action' => 'cerrarSesion'),
        'verTodosUsuarios' =>
          array('controller' => 'ingresoController', 'action' => 'verTodosUsuarios'),
        'nuestrasTiendas' =>
          array('controller' => 'tiendaController', 'action' => 'nuestrasTiendas'),
        'verTiendas' =>
          array('controller' => 'tiendaController', 'action' => 'verTiendas'),
        'verArticulo' =>
          array('controller' => 'articuloController', 'action' => 'verArticulo'),
        'actualizaImagenes' =>
          array('controller' => 'articuloController', 'action' =>'actualizaImagenes'),//
        'nuevaFoto' =>
          array('controller' => 'articuloController', 'action' => 'nuevaFoto'),//
        'todosLosProductos' =>
          array('controller' => 'articuloController', 'action' => 'todosLosProductos'),
        'buscar' =>
          array('controller' => 'articuloController', 'action' => 'buscar'),
        'verArticulo' =>
          array('controller' => 'articuloController', 'action' => 'verArticulo'),
        'comprarProductoUsuario' =>
          array('controller' => 'articuloController', 'action' => 'comprarProductoUsuario'),
        'confirmacionComprarProducto' =>
          array('controller' => 'articuloController', 'action' => 'confirmacionComprarProducto'),
        'mostrarTiendas' =>
          array('controller' => 'articuloController', 'action' => 'mostrarTiendas'),
        'altaProducto' =>
          array('controller' => 'articuloController', 'action' => 'altaProducto'),
        'borrarProducto' =>
          array('controller' => 'articuloController', 'action' => 'borrarProducto'),
        'categorias' =>
          array('controller' => 'categoriaController', 'action' => 'categorias'),
        'todasLasCategorias' =>
          array('controller' => 'categoriaController', 'action' => 'todasLasCategorias'),
        'altaCategoria' =>
          array('controller' => 'categoriaController', 'action' => 'altaCategoria'),
        'borrarCategoria' =>
          array('controller' => 'categoriaController', 'action' => 'borrarCategoria'),
        'verCarrito' =>
          array('controller' => 'compraController', 'action' => 'verCarrito'),
        'comprarProductoCarrito' =>
          array('controller' => 'compraController', 'action' => 'comprarProductoCarrito'),
        'sumarTotalCarrito' =>
          array('controller' => 'compraController', 'action' => 'sumarTotalCarrito'),
        'verResenas' =>
          array('controller' => 'resenaController', 'action' => 'verResenas'),
        'escribirResenas' =>
          array('controller' => 'resenaController', 'action' => 'escribirResenas'),
        'vertodasResenas' =>
          array('controller' => 'resenaController', 'action' => 'vertodasResenas'),
        'mostrarExistencias' =>
          array('controller' => 'almacenController', 'action' => 'mostrarExistencias'),
        );
