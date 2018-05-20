<?php

class LibrosController
{
    public function librosPaginaPrincipal(){
        include_once __DIR__ . "/../Repositorio/librosRepositorio.inc";
        $librosPaginaPrincipal = (new LibrosRepositorio)->mostrarlibrosPaginaPrincipal();//es un multarray de 2
        $params = [
            'mensaje' => 'Bienvenido a la página de la gestión de libros',
            'dia' => date('Y-m-d'),
            'hora' => date('H:i:s')
        ];
        include_once __DIR__ .'/../../app/plantillas/visitante/inicio.php';
    }//fin metodo

    public function librosPaginaPrincipalUsuario(){
        include_once __DIR__ . "/../Repositorio/librosRepositorio.inc";
        $librosPaginaPrincipal = (new LibrosRepositorio)->mostrarlibrosPaginaPrincipal();//es un multarray de 2
        $params = [
            'mensaje' => 'Bienvenido a la página de la gestión de libros',
            'dia' => date('Y-m-d'),
            'hora' => date('H:i:s')
        ];
        include_once __DIR__ .'/../../app/plantillas/usuario/inicioUsuario.php';
    }//fin metodo

    public function librosPaginaPrincipalAdministrador(){
        include_once __DIR__ . "/../Repositorio/librosRepositorio.inc";
        $librosPaginaPrincipal = (new LibrosRepositorio)->mostrarlibrosPaginaPrincipal();//es un multarray de 2
        $params = [
            'mensaje' => 'Bienvenido a la página de la gestión de libros',
            'dia' => date('Y-m-d'),
            'hora' => date('H:i:s')
        ];
        include_once __DIR__ .'/../../app/plantillas/administrador/inicioAdministrador.php';
    }//fin metodo

    public function verLibrosIndividual(){
    if($_SERVER['REQUEST_METHOD']=='POST'){
          include_once __DIR__ . "/../Repositorio/librosRepositorio.inc";
          $nombreCategoria = $_POST['nombreCategoria'];
          $idCategoria = (new LibrosRepositorio)->devolverIdCategoria($nombreCategoria);
          $libroIndividual = (new LibrosRepositorio)->verLibrosIndividual($_POST['idLibro']);
          include_once __DIR__ . "/../../app/plantillas/visitante/verLibrosIndividual.php";
    }
    if($_SERVER['REQUEST_METHOD']=='GET'){
          include_once __DIR__ . "/../Repositorio/librosRepositorio.inc";
          $nombreCategoria = $_GET['nombreCategoria'];
          $idCategoria = (new LibrosRepositorio)->devolverIdCategoria($nombreCategoria);
          $libroIndividual = (new LibrosRepositorio)->verLibrosIndividual($_GET['idLibro']);
          include_once __DIR__ . "/../../app/plantillas/visitante/verLibrosIndividual.php";
    }
  }//fin metodo

  public function verLibrosPorSubCategoria(){
    include_once __DIR__ . "/../Repositorio/librosRepositorio.inc";
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if(!empty($_POST['IdSubCategoria']) && isset($_POST['IdSubCategoria'])){
            $libros = (new LibrosRepositorio)->verLibrosPorSubCategoria($_POST['IdSubCategoria']);//devuelve un array
      }
    }
    if($_SERVER['REQUEST_METHOD']=='GET'){
      if(!empty($_GET['IdSubCategoria']) && isset($_GET['IdSubCategoria'])){
            $libros = (new LibrosRepositorio)->verLibrosPorSubCategoria($_GET['IdSubCategoria']);//devuelve un array
      }
    }
    include_once __DIR__ .'/../../app/plantillas/visitante/verLibrosPorSubCategoria.php';
  }//fin metodo


  //////////////////////USUARIO
  public function verLibrosIndividualUsuario(){
      if($_SERVER['REQUEST_METHOD']=='POST'){
            include_once __DIR__ . "/../Repositorio/librosRepositorio.inc";
            include_once __DIR__ . "/../Repositorio/tiendasRepositorio.inc";
            $tiendas = (new TiendasRepositorio)->devolverTiendasTotales();
            $nombreCategoria = $_POST['nombreCategoria'];
            $idCategoria = (new LibrosRepositorio)->devolverIdCategoria($nombreCategoria);
            $libroIndividual = (new LibrosRepositorio)->verLibrosIndividual($_POST['idLibro']);
            include_once __DIR__ . "/../../app/plantillas/usuario/verLibrosIndividualUsuario.php";
      }
      if($_SERVER['REQUEST_METHOD']=='GET'){
            include_once __DIR__ . "/../Repositorio/librosRepositorio.inc";
            include_once __DIR__ . "/../Repositorio/tiendasRepositorio.inc";
            $tiendas = (new TiendasRepositorio)->devolverTiendasTotales();
            $nombreCategoria = $_GET['nombreCategoria'];
            $idCategoria = (new LibrosRepositorio)->devolverIdCategoria($nombreCategoria);
            $libroIndividual = (new LibrosRepositorio)->verLibrosIndividual($_GET['idLibro']);
            include_once __DIR__ . "/../../app/plantillas/usuario/verLibrosIndividualUsuario.php";
      }
  }//fin metodo

  public function verLibrosPorSubCategoriaUsuario(){
    include_once __DIR__ . "/../Repositorio/librosRepositorio.inc";
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if(!empty($_POST['IdSubCategoria']) && isset($_POST['IdSubCategoria'])){
            $libros = (new LibrosRepositorio)->verLibrosPorSubCategoria($_POST['IdSubCategoria']);//devuelve un array
      }
    }
    if($_SERVER['REQUEST_METHOD']=='GET'){
      if(!empty($_GET['IdSubCategoria']) && isset($_GET['IdSubCategoria'])){
            $libros = (new LibrosRepositorio)->verLibrosPorSubCategoria($_GET['IdSubCategoria']);//devuelve un array
      }
    }
    include_once __DIR__ .'/../../app/plantillas/usuario/verLibrosPorSubCategoriaUsuario.php';
  }//fin metodo

  /////////////////ADMINISTRADOR
  public function verLibrosIndividualAdministrador(){
      if($_SERVER['REQUEST_METHOD']=='POST'){
            include_once __DIR__ . "/../Repositorio/librosRepositorio.inc";
            $nombreCategoria = $_POST['nombreCategoria'];
            $idCategoria = (new LibrosRepositorio)->devolverIdCategoria($nombreCategoria);
            $libroIndividual = (new LibrosRepositorio)->verLibrosIndividual($_POST['idLibro']);
            include_once __DIR__ . "/../../app/plantillas/administrador/verLibrosIndividualAdministrador.php";
      }
      if($_SERVER['REQUEST_METHOD']=='GET'){
            include_once __DIR__ . "/../Repositorio/librosRepositorio.inc";
            $nombreCategoria = $_GET['nombreCategoria'];
            $idCategoria = (new LibrosRepositorio)->devolverIdCategoria($nombreCategoria);
            $libroIndividual = (new LibrosRepositorio)->verLibrosIndividual($_GET['idLibro']);
            include_once __DIR__ . "/../../app/plantillas/administrador/verLibrosIndividualAdministrador.php";
      }
  }//fin metodo

  public function verLibrosPorSubCategoriaAdministrador(){
    include_once __DIR__ . "/../Repositorio/librosRepositorio.inc";
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if(!empty($_POST['IdSubCategoria']) && isset($_POST['IdSubCategoria'])){
            $libros = (new LibrosRepositorio)->verLibrosPorSubCategoria($_POST['IdSubCategoria']);//devuelve un array
      }
    }
    if($_SERVER['REQUEST_METHOD']=='GET'){
      if(!empty($_GET['IdSubCategoria']) && isset($_GET['IdSubCategoria'])){
            $libros = (new LibrosRepositorio)->verLibrosPorSubCategoria($_GET['IdSubCategoria']);//devuelve un array
      }
    }
    include_once __DIR__ .'/../../app/plantillas/administrador/verLibrosPorSubCategoriaAdministrador.php';
  }//fin metodo

  //para busquedas
  public function busqueda(){
      include_once __DIR__ . "/../Repositorio/librosRepositorio.inc";
      include_once __DIR__ . "/../Repositorio/autoresRepositorio.inc";
      include_once __DIR__ . "/../Repositorio/editorialesRepositorio.inc";
      include_once __DIR__ . "/../Repositorio/tiendasRepositorio.inc";
      $autores = (new AutoresRepositorio)->devolverAutoresTotales();
      $tiendas = (new TiendasRepositorio)->devolverTiendasTotales();
      $editoriales = (new EditorialesRepositorio)->devolverEditorialesTotales();
      $year = (new LibrosRepositorio)->devolverYearLibros();
      include_once __DIR__ .'/../../app/plantillas/usuario/busqueda.php';
  }//fin metodo

  public function administrarLibros(){
    include_once __DIR__ . "/../Repositorio/librosRepositorio.inc";
    $librosCategoriasLateral = (new LibrosRepositorio)->librosCategoriasLateral();//es un multarray de 2
    $librosSubCategoriasLateral = (new LibrosRepositorio)->librosSubCategoriasLateral();//es un multarray de 2
    include_once __DIR__ .'/../../app/plantillas/administrador/administrarLibros.php';
  }//fin metodo

  //para enseñar los resultados de la busqueda
  public function resultadosBusqueda(){
    include_once __DIR__ . "/../Repositorio/librosRepositorio.inc";
    include_once __DIR__ . "/../Repositorio/librosRepositorio.inc";
    include_once __DIR__ . "/../Repositorio/autoresRepositorio.inc";
    include_once __DIR__ . "/../Repositorio/editorialesRepositorio.inc";
    include_once __DIR__ . "/../Repositorio/tiendasRepositorio.inc";
    $autores = (new AutoresRepositorio)->devolverAutoresTotales();
    $tiendas = (new TiendasRepositorio)->devolverTiendasTotales();
    $editoriales = (new EditorialesRepositorio)->devolverEditorialesTotales();
    $year = (new LibrosRepositorio)->devolverYearLibros();
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if( (empty($_POST['autoresId']) && isset($_POST['autoresId'])) &&
      (empty($_POST['editorialId']) && isset($_POST['editorialId'])) &&
      (empty($_POST['tiendasId']) && isset($_POST['tiendasId'])) &&
      (empty($_POST['yearPublicacion']) && isset($_POST['yearPublicacion'])) ) {
            $error = 'No hay resultados en la busqueda';include_once __DIR__ .'/../../app/plantillas/usuario/busqueda.php';
      }else{
          $autoresId = $_POST['autoresId'];
          $editorialId = $_POST['editorialId'];
          $tiendasId = $_POST['tiendasId'];
          $yearPublicacion = $_POST['yearPublicacion'];
          $error = ' Parametros de busqueda<br>AUTOR  : '.$autoresId. '<br>EDITORIAL  : '.$editorialId
          .'<br>TIENDA  : '.$tiendasId.'<br>AÑO  : '.$yearPublicacion;
          include_once __DIR__ .'/../../app/plantillas/usuario/busqueda.php';
      }
    }

    //include_once __DIR__ .'/../../app/plantillas/usuario/resultadosBusqueda.php';
  }//fin metodo


}//fin clase
