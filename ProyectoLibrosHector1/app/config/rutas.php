<?php

$mapeoRutas = array(
    //VISITANTE
    'inicio' =>
    array('controller' => 'usuarioController', 'action' => 'inicio'),
    'inicio' =>
    array('controller' => 'librosController', 'action' => 'librosPaginaPrincipal'),
    'inicioUsuarioComprobar' =>
    array('controller' => 'usuarioController', 'action' => 'inicioUsuarioComprobar'),
    'verLibrosIndividual' =>
    array('controller' => 'librosController', 'action' => 'verLibrosIndividual'),
    'librosPorCategoria' =>
    array('controller' => 'CategoriasController', 'action' => 'librosPorCategoria'),
    'verSubcategorias_de_Categorias' =>
    array('controller' => 'subCategoriasController', 'action' => 'verSubcategorias_de_Categorias'),
    'verLibrosPorSubCategoria' =>
    array('controller' => 'librosController', 'action' => 'verLibrosPorSubCategoria'),
    'formularioInscripcion' =>
    array('controller' => 'usuarioController', 'action' => 'formularioInscripcion'),
    'tiendas' =>
    array('controller' => 'tiendasController', 'action' => 'tiendas'),
    'verTiendasIndividual' =>
    array('controller' => 'tiendasController', 'action' => 'verTiendasIndividual'),
    'contacto' =>
    array('controller' => 'usuarioController', 'action' => 'contacto'),
    'inscribirUsuarioNuevo' =>
    array('controller' => 'usuarioController', 'action' => 'inscribirUsuarioNuevo'),
    //USUARIO
    'inicioUsuario' =>
    array('controller' => 'usuarioController', 'action' => 'inicioUsuario'),
    'inicioUsuario' =>
    array('controller' => 'librosController', 'action' => 'librosPaginaPrincipalUsuario'),
    'cerrarSesion' =>
    array('controller' => 'usuarioController', 'action' => 'cerrarSesion'),
    'verLibrosIndividualUsuario' =>
    array('controller' => 'librosController', 'action' => 'verLibrosIndividualUsuario'),
    'librosPorCategoriaUsuario' =>
    array('controller' => 'CategoriasController', 'action' => 'librosPorCategoriaUsuario'),
    'verLibrosPorSubCategoriaUsuario' =>
    array('controller' => 'librosController', 'action' => 'verLibrosPorSubCategoriaUsuario'),
    'verSubcategorias_de_CategoriasUsuario' =>
    array('controller' => 'subCategoriasController', 'action' => 'verSubcategorias_de_CategoriasUsuario'),
    'busqueda' =>
    array('controller' => 'librosController', 'action' => 'busqueda'),
    'resultadosBusqueda' =>
    array('controller' => 'librosController', 'action' => 'resultadosBusqueda'),
    'comprarLibroUsuarioReserva' =>
    array('controller' => 'reservaController', 'action' => 'comprarLibroUsuarioReserva'),
    //ADMINISTRADORES
    'inicioAdministrador' =>
    array('controller' => 'usuarioController', 'action' => 'inicioAdministrador'),
    'inicioAdministrador' =>
    array('controller' => 'librosController', 'action' => 'librosPaginaPrincipalAdministrador'),
    'administrarUsuarios' =>
    array('controller' => 'usuarioController', 'action' => 'administrarUsuarios'),
    'verLibrosIndividualAdministrador' =>
    array('controller' => 'librosController', 'action' => 'verLibrosIndividualAdministrador'),
    'verLibrosPorSubCategoriaAdministrador' =>
    array('controller' => 'librosController', 'action' => 'verLibrosPorSubCategoriaAdministrador'),
    'verSubcategorias_de_CategoriasAdministrador' =>
    array('controller' => 'subCategoriasController', 'action' => 'verSubcategorias_de_CategoriasAdministrador'),
    'borrarUsuarios' =>
    array('controller' => 'usuarioController', 'action' => 'borrarUsuarios'),
    'modificarUsuario' =>
    array('controller' => 'usuarioController', 'action' => 'modificarUsuario'),
    'enviarDatosModificacionUsuario' =>
    array('controller' => 'usuarioController', 'action' => 'enviarDatosModificacionUsuario'),
    'verCategoriasAdministrador' =>
    array('controller' => 'CategoriasController', 'action' => 'verCategoriasAdministrador'),
    'borrarCategoriaAdministrador' =>
    array('controller' => 'CategoriasController', 'action' => 'borrarCategoriaAdministrador'),
    'modificarCategoriaAdministrador' =>
    array('controller' => 'CategoriasController', 'action' => 'modificarCategoriaAdministrador'),
    'enviarDatosModificacionCategoria' =>
    array('controller' => 'CategoriasController', 'action' => 'enviarDatosModificacionCategoria'),
    'verSubCategoriasAdministrador' =>
    array('controller' => 'SubCategoriasController', 'action' => 'verSubCategoriasAdministrador'),
    'borrarSubCategoriaAdministrador' =>
    array('controller' => 'SubCategoriasController', 'action' => 'borrarSubCategoriaAdministrador'),
    'modificarSubCategoriaAdministrador' =>
    array('controller' => 'SubCategoriasController', 'action' => 'modificarSubCategoriaAdministrador'),
    'enviarDatosModificacionSubCategoria' =>
    array('controller' => 'SubCategoriasController', 'action' => 'enviarDatosModificacionSubCategoria'),
    'administrarTiendas' =>
    array('controller' => 'tiendasController', 'action' => 'administrarTiendas'),
    'borrarTiendaAdministradores' =>
    array('controller' => 'tiendasController', 'action' => 'borrarTiendaAdministradores'),
    'verTiendasIndividualAdministrador' =>
    array('controller' => 'tiendasController', 'action' => 'verTiendasIndividualAdministrador'),
    'modificarTiendaAdministrador' =>
    array('controller' => 'tiendasController', 'action' => 'modificarTiendaAdministrador'),
    'enviarDatosModificacionTienda' =>
    array('controller' => 'tiendasController', 'action' => 'enviarDatosModificacionTienda'),
    'insertarNuevaTiendaAdministrador' =>
    array('controller' => 'tiendasController', 'action' => 'insertarNuevaTiendaAdministrador'),
    'enviarDatosInsercionTienda' =>
    array('controller' => 'tiendasController', 'action' => 'enviarDatosInsercionTienda'),
    'administrarLibros' =>
    array('controller' => 'librosController', 'action' => 'administrarLibros'),
    'verUsuarioIndividual' =>
    array('controller' => 'usuarioController', 'action' => 'verUsuarioIndividual'),
    'administrarAlmacen' =>
    array('controller' => 'almacenController', 'action' => 'administrarAlmacen'),
    'enviarDatosAlmacen' =>
    array('controller' => 'almacenController', 'action' => 'enviarDatosAlmacen'),
);


 ?>
