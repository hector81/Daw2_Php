<?php

// Vector multidimensional con rutas a controlador y método que debe
// atender cada enlace
/* formato:
    Primera dimensaión: nombre del enlace pasado mediante variable GET 'ctl'
     'nombreEnlace' => array() segunda dimesion con información del controlador
                       que atiende esa petición, clave 'controller', y del
                       método concreto que está especializado en su tratamiento,
                       clave 'action'
  Se debe agregar una ruta por cada valor diferente que tome la variable 'ctl'.
  La clave 'inicio' referencia la página home de la aplicación y especifica
    el controlador que debe decidir cuál es la vista que se debe mostrar
*/
$mapeoRutas =
  array('inicio' =>//valor ctl
          array('controller' =>'usuarioController', 'action' =>'inicio'),
        'showCategorias' =>
          array('controller' =>'familiaController', 'action' =>'showCategorias'),
        'showArticulos' =>
          array('controller' =>'articuloController', 'action' => 'showArticulos'),
        'verArticulosPorCategoria' =>
          array('controller' =>'articuloController', 'action' => 'verArticulosPorCategoria'),
        'verTiendasCadena' =>
          array('controller' => 'tiendaController', 'action' => 'verTiendasCadena'),
        'buscarTiendasProvincia' =>
          array('controller' => 'tiendaController', 'action' => 'buscarTiendasProvincia'),
        'verTiendasProvincia' =>
          array('controller' => 'tiendaController', 'action' => 'verTiendasProvincia'),
        'verArticulosDisponiblesPorTienda' =>
          array('controller' => 'almacenController', 'action' => 'verArticulosDisponiblesPorTienda'),
        'actualizarFoto' =>
          array('controller' =>'articuloController', 'action' => 'actualizarFoto'),
        'introducirUsuarioNuevo' =>
            array('controller' =>'usuarioController', 'action' => 'introducirUsuarioNuevo'),
        'verUsuarioNuevoIntroducido' =>
            array('controller' =>'usuarioController', 'action' => 'verUsuarioNuevoIntroducido'),
        'inicioUsuario' =>
          array('controller' =>'usuarioController', 'action' => 'inicioUsuario'),
        'inicioAdministrador' =>
            array('controller' =>'usuarioController', 'action' => 'inicioAdministrador'),
        'inicioUsuarioUsuario' =>
            array('controller' =>'usuarioController', 'action' => 'inicioUsuarioUsuario'),
        'buscar' =>
            array('controller' =>'articuloController', 'action' => 'buscar'),
        'busquedaAdministrador' =>
            array('controller' =>'articuloController', 'action' => 'busquedaAdministrador'),
        'busquedaUsuario' =>
            array('controller' =>'articuloController', 'action' => 'busquedaUsuario'),
        'verArticulosAdministrador' =>
            array('controller' =>'articuloController', 'action' => 'verArticulosAdministrador'),
        'cerrarSesion' =>
            array('controller' =>'usuarioController', 'action' => 'cerrarSesion'),
        'borrarUsuario' =>
            array('controller' =>'usuarioController', 'action' => 'borrarUsuario'),
        'verExistencias' =>
            array('controller' =>'almacenController', 'action' => 'verExistencias'),
        'administrarUsuarios' =>
            array('controller' => 'usuarioController', 'action' => 'administrarUsuarios' ),
        'introducirUsuarioAdministrador' =>
            array('controller' => 'usuarioController', 'action' => 'introducirUsuarioAdministrador' ),
        'verUserIntroducidoByAdministrador' =>
            array('controller' => 'usuarioController', 'action' => 'verUserIntroducidoByAdministrador' ),
        'verTiendasProvinciaUsuario' =>
            array('controller' => 'tiendaController', 'action' => 'verTiendasProvinciaUsuario' ),
        'buscarTiendasProvinciaUsuario' =>
            array('controller' => 'tiendaController', 'action' => 'buscarTiendasProvinciaUsuario' ),
        'verTiendasProvinciaAdministrador' =>
            array('controller' => 'tiendaController', 'action' => 'verTiendasProvinciaAdministrador' ),
        'buscarTiendasProvinciaAdministrador' =>
            array('controller' => 'tiendaController', 'action' => 'buscarTiendasProvinciaAdministrador' ),
        'verModificarExistencias' =>
            array('controller' =>'almacenController', 'action' => 'verModificarExistencias'),
        'actualizarStock' =>
            array('controller' =>'almacenController', 'action' => 'actualizarStock'),
        'verArticuloIndividual' =>
            array('controller' =>'articuloController', 'action' => 'verArticuloIndividual'),
        'darAltaCategoria' =>
            array('controller' =>'familiaController', 'action' => 'darAltaCategoria'),
        'darAltaProducto' =>
            array('controller' =>'articuloController', 'action' => 'darAltaProducto'),
        'borrarArticulo' =>
            array('controller' =>'articuloController', 'action' => 'borrarArticulo'),
        'buscarArticulosPorCategoria' =>
            array('controller' =>'familiaController', 'action' => 'buscarArticulosPorCategoria'),
        'verArticulosPorTienda' =>
            array('controller' =>'tiendaController', 'action' => 'verArticulosPorTienda'),
        'mostrarUusuariosBorrado' =>
            array('controller' =>'usuarioController', 'action' => 'mostrarUusuariosBorrado'),
        'elegirProductoCategoria' =>
            array('controller' =>'familiaController', 'action' => 'elegirProductoCategoria'),
        'verArticulosPorTiendaAdministrador' =>
            array('controller' =>'tiendaController', 'action' => 'verArticulosPorTiendaAdministrador'),
        'borrarArticuloTienda' =>
            array('controller' =>'tiendaController', 'action' => 'borrarArticuloTienda'),
        'insertarTienda' =>
            array('controller' =>'tiendaController', 'action' => 'insertarTienda'),
        'verTiendaInsertada' =>
            array('controller' =>'tiendaController', 'action' => 'verTiendaInsertada'),
        'modificarUsuario' =>
            array('controller' =>'usuarioController', 'action' => 'modificarUsuario'),
        'verUsuarioModificado' =>
            array('controller' =>'usuarioController', 'action' => 'verUsuarioModificado'),
        'modificarTienda' =>
            array('controller' =>'tiendaController', 'action' => 'modificarTienda'),
        'verTiendaModificada' =>
            array('controller' =>'tiendaController', 'action' => 'verTiendaModificada'),
        'borrarTienda' =>
            array('controller' =>'tiendaController', 'action' => 'borrarTienda'),
        'verModificarCategorias' =>
            array('controller' =>'familiaController', 'action' => 'verModificarCategorias'),
        'modificarCategoria' =>
            array('controller' =>'familiaController', 'action' => 'modificarCategoria'),
        'verCategoriaModificada' =>
            array('controller' =>'familiaController', 'action' => 'verCategoriaModificada'),
        'borrarCategoria' =>
            array('controller' =>'familiaController', 'action' => 'borrarCategoria'),
        'verArticulosCategoriaAdministrador' =>
            array('controller' =>'familiaController', 'action' => 'verArticulosCategoriaAdministrador'),
        'verArticulosPorCategoriaAdministrador' =>
            array('controller' =>'familiaController', 'action' => 'verArticulosPorCategoriaAdministrador'),
        'actualizarFotoArticuloCategoria' =>
            array('controller' =>'familiaController', 'action' => 'actualizarFotoArticuloCategoria'),
        'borrarArticuloCategoria' =>
            array('controller' =>'familiaController', 'action' => 'borrarArticuloCategoria'),
        'verModificarProductosAdministrador' =>
            array('controller' =>'articuloController', 'action' => 'verModificarProductosAdministrador'),
        'articuloModificadoAdministrador' =>
            array('controller' =>'articuloController', 'action' => 'articuloModificadoAdministrador'),
        'anadirReserva' =>
            array('controller' => 'reservaController', 'action' => 'anadirReserva' ),
        'verArticulosComprarUsuario' =>
            array('controller' => 'ventaController', 'action' => 'verArticulosComprarUsuario' ),
        'borrarArticuloDelCarrito' =>
            array('controller' =>'articuloReservadoController', 'action' => 'borrarArticuloDelCarrito'),
        'confirmarVenta' =>
            array('controller' =>'ventaController', 'action' => 'confirmarVenta'),
        'anadirCompraCarritoArticuloReservado' =>
            array('controller' =>'articuloReservadoController', 'action' => 'anadirCompraCarritoArticuloReservado'),
        'verCarrito' =>
            array('controller' => 'articuloReservadoController', 'action' => 'verCarrito' ),
        'verMisCompras' =>
            array('controller' => 'LineaVentaController', 'action' => 'verMisCompras' )
       );
