<?php

class CategoriaController
{
  //para buscar categoria
  public function categorias()
    {
      if($_SERVER['REQUEST_METHOD']=='POST')
      if($_POST['nombreCategoria']==""){
        $error = 'NOMBRE CATEGORIA VACIO';

      }else{
          require __DIR__ . '/../Repositorio/categoriaRepositorio.php';
          $comprobarNombreExiste = (new CategoriaRepositorio)->comprobarCategoriaExisteNombre($_POST['nombreCategoria']);
          if($comprobarNombreExiste == true){
            $categorias = (new CategoriaRepositorio)->findCategoriaPorNombre($_POST['nombreCategoria']);
            require __DIR__ . '/../../app/plantillas/mostrarCategorias.php';
          }else{
            $error = 'NOMBRE CATEGORIA NO EXISTE';
          }

      }

      require __DIR__ . '/../../app/plantillas/categorias.php';
    }

    //para todos los categorias visualizar
    public function todasLasCategorias()
      {
        require __DIR__ . '/../Repositorio/categoriaRepositorio.php';
        $listacategorias = (new CategoriaRepositorio)->categoriasInicio();
        require __DIR__ . '/../../app/plantillas/todasLasCategorias.php';
      }

    //altaCategoria
    public function altaCategoria()
      {
        if($_SERVER['REQUEST_METHOD']=='POST')
        if($_POST['nombre']=="" || $_POST['descripcion']==""){
          $error = 'Tienes que poner el nombre y la descripción';
        }else{
          require __DIR__ . '/../Repositorio/categoriaRepositorio.php';
          $booleano = false;
          $booleano = (new CategoriaRepositorio)->insertarCategoria($_POST['nombre'],$_POST['descripcion']);
          if($booleano == false){
            $error = 'Categoria no dada de alta';
          }else{
            $error = 'Categoria dada de alta';
          }

        }

        require __DIR__ . '/../../app/plantillas/altaCategoria.php';
      }

    //borrarCategoria
    public function borrarCategoria()
      {
        if($_SERVER['REQUEST_METHOD']=='POST')
        if($_POST['nombre']==""){
          $error = 'Tienes que poner el nombre';
        }else{
          require __DIR__ . '/../Repositorio/categoriaRepositorio.php';
          $booleano = false;
          $comprobarNombreExiste = (new CategoriaRepositorio)->comprobarCategoriaExisteNombre($_POST['nombre']);
          if($comprobarNombreExiste == true){
            $booleano = (new CategoriaRepositorio)->borrarCategoriaPorNombre($_POST['nombre']);
            if($booleano == false){
              $error = 'Categoria no dada de baja';
            }else{
              $error = 'Categoria dada de baja';
            }
          }else{
            $error = 'NOMBRE CATEGORIA NO EXISTE';
          }


        }

        require __DIR__ . '/../../app/plantillas/borrarCategoria.php';
      }

}
?>
