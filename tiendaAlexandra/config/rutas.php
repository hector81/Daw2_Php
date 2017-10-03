<?php

// enrutamiento
return //página => array(controller=>Controlador, action=> método dentro del controlador)
  array(
        //Vistas
        'inicio' =>
          array('controller' =>'Amowhi\Cms\Controller\DefaultController', 'action' =>'inicio'),
        'iniciaSesion'=>
          array('controller' =>'Amowhi\Cms\Controller\UsuarioController', 'action' =>'inicioSesion'),
        'registrarUsuario' =>
          array('controller' =>'Amowhi\Cms\Controller\UsuarioController', 'action' =>'registrarUsuario'),
        'miCuenta'=>
          array('controller' =>'Amowhi\Cms\Controller\UsuarioController','action'=> 'perfil'),
        'miPedido' =>
          array('controller' =>'Amowhi\Cms\Controller\UsuarioController', 'action' =>'findPedidosUsuario'),
        'buscarArticulo' =>
          array('controller' =>'Amowhi\Cms\Controller\ArticuloController', 'action' =>'listarArticulos'),
        'articulosPorFamilias'=>
          array('controller' => 'Amowhi\Cms\Controller\ArticuloController', 'action' => 'listarArticulosPorFamilias'),
        'verArticulo' =>
          array('controller' => 'Amowhi\Cms\Controller\ArticuloController', 'action' => 'verArticulo'),
        'nuevaFoto' =>
          array('controller' => 'Amowhi\Cms\Controller\ArticuloController', 'action' => 'nuevaFoto'),
        'carrito' =>
          array('controller' => 'Amowhi\Cms\Controller\CarritoController', 'action' => 'verCarrito'),
        'confirmarDatosEnvio' =>
          array('controller' => 'Amowhi\Cms\Controller\CarritoController', 'action' => 'confirmarDatosEnvio'),
        'compraConfirmada' =>
          array('controller' => 'Amowhi\Cms\Controller\VentaController', 'action' => 'compraConfirmada'),
        'misPedidos' =>
          array('controller' => 'Amowhi\Cms\Controller\UsuarioController', 'action' => 'mostrarPedidosUsuario'),
        'vistaVentaDetalle'=>
          array('controller'=> 'Amowhi\Cms\Controller\UsuarioController', 'action' => 'mostrarDetallesPedido'),

        //Acciones
        'actualizarUsuario' =>
          array('controller' =>'Amowhi\Cms\Controller\UsuarioController', 'action' =>'actualizarUsuario'),
        'cerrarSesion' =>
          array('controller' =>'Amowhi\Cms\Controller\UsuarioController', 'action' =>'cerrarSesion'),
        'anadirCarrito' =>
          array('controller' => 'Amowhi\Cms\Controller\CarritoController', 'action' => 'anadirCarrito'),
        'modificarCantidad'=>
          array('controller' => 'Amowhi\Cms\Controller\CarritoController', 'action' => 'modificarCantidad'),
        'eliminarProducto'=>
          array('controller' => 'Amowhi\Cms\Controller\CarritoController', 'action' => 'eliminarProducto'),
        'confirmarCompra' =>
          array('controller' => 'Amowhi\Cms\Controller\VentaController', 'action' => 'confirmarCompra'),
          );
