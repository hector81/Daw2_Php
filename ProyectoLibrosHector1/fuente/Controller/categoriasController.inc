<?php

class CategoriasController
{

  public function librosPorCategoria(){
    include_once __DIR__ . "/../Repositorio/categoriasRepositorio.inc";
    $categorias = (new CategoriasRepositorio)->devolverCategorias();//devuelve un array
    include_once __DIR__ .'/../../app/plantillas/visitante/librosPorCategoria.php';
  }//fin metodo

  public function librosPorCategoriaUsuario(){
    include_once __DIR__ . "/../Repositorio/categoriasRepositorio.inc";
    $categorias = (new CategoriasRepositorio)->devolverCategorias();//devuelve un array
    include_once __DIR__ .'/../../app/plantillas/usuario/librosPorCategoriaUsuario.php';
  }//fin metodo



  public function verCategoriasAdministrador(){
    include_once __DIR__ . "/../Repositorio/categoriasRepositorio.inc";
    $categorias = (new CategoriasRepositorio)->verCategoriasAdministrador();//devuelve un array
    include_once __DIR__ .'/../../app/plantillas/administrador/verCategoriasAdministrador.php';
  }//fin metodo

  public function borrarCategoriaAdministrador(){
    include_once __DIR__ . "/../Repositorio/categoriasRepositorio.inc";
    $borra = (new CategoriasRepositorio)->borrarCategoriaAdministrador($_GET['idCategoria']);
    $categorias = (new CategoriasRepositorio)->verCategoriasAdministrador();//devuelve un array
    include_once __DIR__ .'/../../app/plantillas/administrador/verCategoriasAdministrador.php';
  }//fin metodo

  public function modificarCategoriaAdministrador(){
    include_once __DIR__ . "/../Repositorio/categoriasRepositorio.inc";
    $idCategoria = $_GET['idCategoria'];
    $categoria = (new CategoriasRepositorio)->devolverCategoriasPorId($idCategoria);
    include_once __DIR__ .'/../../app/plantillas/administrador/modificarCategoriaAdministrador.php';
  }//fin metodo

  public function enviarDatosModificacionCategoria(){
    include_once __DIR__ . "/../Repositorio/categoriasRepositorio.inc";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(empty($_POST['nombreCategoria']) && isset($_POST['nombreCategoria'])){
            $error = 'El campo nombre de categoria está vacio';
        }elseif(empty($_POST['descripcion']) && isset($_POST['descripcion'])){
            $error = 'El campo descripción está vacio';
        }else{
          $idCategoria = $_POST['idCategoria'];
          $nombreCategoria = $_POST['nombreCategoria'];
          $descripcion = $_POST['descripcion'];
          $boolCategoria = (new CategoriasRepositorio)->modificarCategoriaAdministradorId($idCategoria,$nombreCategoria,$descripcion);
          if($boolCategoria){
              $error = 'La categoria ha sido modificada correctamente';
          }else{
              $error = 'Ha habido algún problema y la categoria no ha sido modifcada';
          }
        }
    }
    $categorias = (new CategoriasRepositorio)->verCategoriasAdministrador();//devuelve un array
    include_once __DIR__ .'/../../app/plantillas/administrador/verCategoriasAdministrador.php';
  }//fin metodo

}//fin clase
