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
      if($_SERVER['REQUEST_METHOD']=='POST')
      if($_POST['nombre']==""){
        $error = 'Nombre vacio';

      }else{
          require __DIR__ . '/../Repositorio/articuloRepositorio.php';
          $comprobar=false;
          $comprobar = (new ArticuloRepositorio)->comprobarArticuloExiste($_POST['nombre']);
          if($comprobar == true){
            $articulos = (new ArticuloRepositorio)->visualizarArticulo($_POST['nombre']);
            require __DIR__ . '/../../app/plantillas/mostrarArticulos.php';
          }else{
            $error = 'NO HAY ARTICULOS EN LA BUSQUEDA';
          }

      }

      require __DIR__ . '/../../app/plantillas/verArticulo.php';
  }


  //altaProducto
  public function altaProducto()
  {
    if($_SERVER['REQUEST_METHOD']=='POST')
    if($_POST['nombre']=="" || $_POST['nombreCorto']=="" || $_POST['descripcion']==""
     || $_POST['PVP']=="" || $_POST['categoria']=="" || $_POST['file']==""){
      $error = 'Tienes que rellenar todas las casillas';
    }else{
      require __DIR__ . '/../Repositorio/categoriaRepositorio.php';
      $comprobarCategoria = (new CategoriaRepositorio)->comprobarCategoriaExiste($_POST['categoria']);
      //sacar id categroria
      $idCategoria = (new CategoriaRepositorio)->sacarIdCategoria($_POST['categoria']);
      if($comprobarCategoria == false){
        $booleano = false;
        require __DIR__ . '/../Repositorio/articuloRepositorio.php';
        $booleano = (new ArticuloRepositorio)->insertarProducto($_POST['nombre'],$_POST['nombreCorto'],$_POST['descripcion'],
        $_POST['PVP'],$idCategoria,$_POST['file']);
        if($booleano == false){
          $error = 'Producto no dado de alta';
        }else{
          $error = 'Producto dado de alta';
        }
      }else{
        $error = 'Categoria no existe';
      }

    }
    require __DIR__ . '/../../app/plantillas/altaProducto.php';
  }

  //borrarProducto
  public function borrarProducto()
  {
    if($_SERVER['REQUEST_METHOD']=='POST')
    if($_POST['nombre']==""){
      $error = 'Tienes que poner el nombre';
    }else{
      require __DIR__ . '/../Repositorio/articuloRepositorio.php';
      $booleano = false;
      $booleano = (new ArticuloRepositorio)->borrarCategoriaPorProducto($_POST['nombre']);
      if($booleano == false){
        $error = 'Producto no dado de baja';
      }else{
        $error = 'Producto dada de baja';
      }

    }
    require __DIR__ . '/../../app/plantillas/borrarProducto.php';
  }

  public function nuevaFoto()
  { if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $params = array('id' => $_POST['id'],
                      'foto' => fopen($_FILES['file']['tmp_name'], "r"),
                     );
      require __DIR__ . '/../Repositorio/articuloRepositorio.php';
      (new ArticuloRepositorio)->actualizaFoto($params);
      require __DIR__ . '/../../app/plantillas/nuevaFoto.php';
    }else {
      $id = $_GET['id'];
      $nombre = $_GET['nombre'];
      require __DIR__ . '/../../app/plantillas/nuevaFoto.php';

    }
    /*
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if($_POST['nombreArticulo'] != ''){
          $booleano = false;
          require __DIR__ . '/../Repositorio/articuloRepositorio.php';
          //buscamos el id del producto 145
          $id = (new ArticuloRepositorio)->findIdArticuloByNombre($_POST['nombreArticulo']);
          $archivo = fopen($_FILES['file']['tmp_name'], "r");
          $booleano = (new ArticuloRepositorio)->actualizaFoto($id, $archivo);
          if($booleano == true){
              $error = 'Operación realizada';
          }else{
              $error = 'Operación no realizada';
          }

      }else{
          $error = 'Debes poner el nombre del producto';
      }
    }
    require __DIR__ . '/../../app/plantillas/nuevaFoto.php';
    */
  }


  //para buscar
  public function buscar()
    {
      $listaFamiliaComprobar = false;
      $listaArticuloComprobar = false;
      $listaTiendaComprobar = false;
        if($_SERVER['REQUEST_METHOD']=='POST')
        if($_POST['nombreBuscar']==""){
          $error = 'NOMBRE BUSQUEDA VACIA';

        }else{
            require __DIR__ . '/../Repositorio/articuloRepositorio.php';
            $listaFamiliaComprobar = (new ArticuloRepositorio)->findFamiliaByPalabraComprobar($_POST['nombreBuscar']);
            $listaArticuloComprobar = (new ArticuloRepositorio)->findArticuloByPalabraComprobar($_POST['nombreBuscar']);
            $listaTiendaComprobar = (new ArticuloRepositorio)->findTiendaByPalabraComprobar($_POST['nombreBuscar']);

            if($listaFamiliaComprobar == true && $listaArticuloComprobar == false &&  $listaTiendaComprobar == false){
                $listaFamilia = (new ArticuloRepositorio)->findFamiliaByPalabra($_POST['nombreBuscar']);
                $errorA = 'NO HAY RESULTADOS';
                $errorT = 'NO HAY RESULTADOS';
            }else{
                $errorF = 'NO HAY RESULTADOS';
            }

            if($listaArticuloComprobar == true){
                $listaArticulo = (new ArticuloRepositorio)->findArticuloByPalabra($_POST['nombreBuscar']);
            }else{
                $errorA = 'NO HAY RESULTADOS';
            }

            if($listaTiendaComprobar == true){
                $listaTienda = (new ArticuloRepositorio)->findTiendaByPalabra($_POST['nombreBuscar']);
            }else{
                $errorT = 'NO HAY RESULTADOS';
            }
            require __DIR__ . '/../../app/plantillas/mostrarBusqueda.php';
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
    $resultado = (new ArticuloRepositorio)->comprarProductoUsuario($_POST['idProducto']);
    $id = $_POST['idProducto'];
    require __DIR__ . '/../../app/plantillas/comprarProductoUsuario.php';
  }

  public function confirmacionComprarProducto()
  {
    if($_SERVER['REQUEST_METHOD']=='POST')
    $nombreCliente = $_POST['nombreCliente'];
    $ciudad = $_POST['ciudad'];
    $id = $_POST['idProducto'];
    $cantidad = $_POST['cantidad'];

    if($nombreCliente != '' || $ciudad != '' || $id != '' || $cantidad != ''){
      require __DIR__ . '/../Repositorio/almacenRepositorio.php';
      require __DIR__ . '/../Repositorio/tiendaRepositorio.php';
      require __DIR__ . '/../Repositorio/articuloRepositorio.php';
      //vamos a repositorio tienda para sacar el id de la ciudad
      $idTienda = (new TiendaRepositorio)->buscarIdTiendaPorNombre($ciudad);
      //comprobamos existencias
      $booleanoExistencias = (new AlmacenRepositorio)->comprobarStockExistencias($idTienda,$id);
      if($booleanoExistencias == true){//si hay existencias
          //quitamos la cantidad
          $quitarProducto = (new AlmacenRepositorio)->quitarCantidadAlmacen($cantidad,$idTienda,$id);
          if($quitarProducto == true){
              //CONFIRMAMOS QUE SE HA INSERTADO
              $confirmacion = (new ArticuloRepositorio)->confirmacionComprarProducto($id,$nombreCliente,$idTienda,$cantidad);
              if($confirmacion == true){
                  $error = 'OPERACIÓN REALIZADA';
              }else{
                  $error = 'OPERACIÓN NO REALIZADA';
              }
          }else{
              $error = 'NO SE HA PODIDO QUITAR DEL ALMACEN';
          }
      }else{
          $error = 'NO HAY EXISTENCIAS';
      }


    }else{
        $error = 'NO PUEDE HABER CAMPOS VACIOS';
    }

    require __DIR__ . '/../../app/plantillas/confirmacionComprarProducto.php';

  }

}
?>
