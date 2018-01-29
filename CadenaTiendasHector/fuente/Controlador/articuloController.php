<?php

class ArticuloController
{ public function actualizaImagenes()
  { $params = array('nombre'=>'',
                    'art'=>array(),
                  );
    if($_SERVER['REQUEST_METHOD']=='POST')
    { $params['nombre'] = $_POST['nombre'];
      require __DIR__ . '/../Repositorio/articuloRepositorio.php';
      $params['art'] = (new ArticuloRepositorio)->findArticuloByNombre(array($_POST['nombre']));
    }
    require __DIR__ . '/../../app/plantillas/queArticulo.php';

  }

  public function verArticulo()
  {
      $articulos[]=array();
      if($_SERVER['REQUEST_METHOD']=='POST')
      if($_POST['nombre']==""){
        $error = 'nombre VACIO';

      }else{
          require __DIR__ . '/../Repositorio/articuloRepositorio.php';
          $articulos = (new ArticuloRepositorio)->visualizarArticulo($_POST['nombre']);
          require __DIR__ . '/../../app/plantillas/mostrarArticulos.php';
      }

      require __DIR__ . '/../../app/plantillas/verArticulo.php';
  }

  //para buscar categoria
  public function categorias()
    { $categorias[]=array();
      if($_SERVER['REQUEST_METHOD']=='POST')
      if($_POST['nombreCategoria']==""){
        $error = 'NOMBRE CATEGORIA VACIO';

      }else{
          require __DIR__ . '/../Repositorio/articuloRepositorio.php';
          $categorias = (new ArticuloRepositorio)->findCategoriaPorNombre($_POST['nombreCategoria']);
          require __DIR__ . '/../../app/plantillas/mostrarCategorias.php';
      }

      require __DIR__ . '/../../app/plantillas/categorias.php';
    }

  public function nuevaFoto()
  { if($_SERVER['REQUEST_METHOD'] == 'POST')
    { $params = array('id' => $_POST['id'],
                      'foto' => fopen($_FILES['file']['tmp_name'], "r"),
                     );
      require __DIR__ . '/../Repositorio/articuloRepositorio.php';
      (new ArticuloRepositorio)->actualizaFoto($params);
      header('Location: /cadenatiendas/index.php?ctl=actualizaImagenes');
    }else {
      $id = $_GET['id'];
      $nombre = $_GET['nombre'];
      require __DIR__ . '/../../app/plantillas/nuevaFoto.php';

    }
  }


  //para buscar
  public function buscar()
    {
      $listaBusqueda[]=array();
        if($_SERVER['REQUEST_METHOD']=='POST')
        if($_POST['nombreBuscar']==""){
          $error = 'NOMBRE BUSQUEDA VACIA';

        }else{
            require __DIR__ . '/../Repositorio/articuloRepositorio.php';
            $listaBusqueda = (new ArticuloRepositorio)->findBusqueda($_POST['nombreBuscar']);
            if($listaBusqueda == null){
              echo "NO HAY RESULTADOS EN LA BUSQUEDA";
            }else{
              require __DIR__ . '/../../app/plantillas/mostrarBusqueda.php';
            }

        }

        require __DIR__ . '/../../app/plantillas/buscar.php';
    }

  //para todos los productos
  public function todosLosProductos()
    {
          require __DIR__ . '/../Repositorio/articuloRepositorio.php';
          $listaProductos = (new ArticuloRepositorio)->visualizarProductos();
          require __DIR__ . '/../../app/plantillas/todosLosProductos.php';
    }

  //para todos los categorias visualizar
  public function categoriasPresentacion()
    {
          require __DIR__ . '/../Repositorio/articuloRepositorio.php';
          $listacategorias = (new ArticuloRepositorio)->categoriasInicio();
          require __DIR__ . '/../../app/plantillas/categorias.php';
    }

  public function verResenas()
    {


      if($_SERVER['REQUEST_METHOD']=='POST')
      if($_POST['id']==""){
        $error = 'ID VACIO';

      }else{
        $id = $_POST['id'];
        require __DIR__ . '/../Repositorio/articuloRepositorio.php';
        $listaResenas = (new ArticuloRepositorio)->verResenas($id);
        require __DIR__ . '/../../app/plantillas/verResenas.php';
      }

      require __DIR__ . '/../../app/plantillas/verResenas.php';
    }


  public function getFoto()
    {
      require __DIR__ . '/../Repositorio/articuloRepositorio.php';
      $listaProductos = (new ArticuloRepositorio)->getFoto($id);
      require __DIR__ . '/../../app/plantillas/nuevaFoto.php';
    }

  public function comprarProductoUsuario()
  {
    if($_SERVER['REQUEST_METHOD']=='POST')
    require __DIR__ . '/../Repositorio/articuloRepositorio.php';
    $idPrueba = (new ArticuloRepositorio)->comprarProductoUsuario($_POST['idProducto']);
    require __DIR__ . '/../../app/plantillas/comprarProductoUsuario.php';
  }

}
