<?php

class SubCategoriasController
{
  public function verSubcategorias_de_Categorias(){
    include_once __DIR__ . "/../Repositorio/subCategoriasRepositorio.inc";
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if(!empty($_POST['IdCategoria']) && isset($_POST['IdCategoria'])){
            $subCategorias = (new SubCategoriasRepositorio)->devolverSubCategorias($_POST['IdCategoria']);//devuelve un array
      }
    }
    if($_SERVER['REQUEST_METHOD']=='GET'){
      if(!empty($_GET['IdCategoria']) && isset($_GET['IdCategoria'])){
            $subCategorias = (new SubCategoriasRepositorio)->devolverSubCategorias($_GET['IdCategoria']);//devuelve un array
      }
    }
    include_once __DIR__ .'/../../app/plantillas/visitante/verSubcategorias_de_Categorias.php';
  }//fin metodo

  //USUARIO
  public function verSubcategorias_de_CategoriasUsuario(){
    include_once __DIR__ . "/../Repositorio/subCategoriasRepositorio.inc";
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if(!empty($_POST['IdCategoria']) && isset($_POST['IdCategoria'])){
            $subCategorias = (new SubCategoriasRepositorio)->devolverSubCategorias($_POST['IdCategoria']);//devuelve un array
      }
    }
    if($_SERVER['REQUEST_METHOD']=='GET'){
      if(!empty($_GET['IdCategoria']) && isset($_GET['IdCategoria'])){
            $subCategorias = (new SubCategoriasRepositorio)->devolverSubCategorias($_GET['IdCategoria']);//devuelve un array
      }
    }
    include_once __DIR__ .'/../../app/plantillas/usuario/verSubcategorias_de_CategoriasUsuario.php';
  }//fin metodo

  /////////////////ADMINISTRADOR
  public function verSubcategorias_de_CategoriasAdministrador(){
    include_once __DIR__ . "/../Repositorio/subCategoriasRepositorio.inc";
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if(!empty($_POST['IdCategoria']) && isset($_POST['IdCategoria'])){
            $subCategorias = (new SubCategoriasRepositorio)->devolverSubCategorias($_POST['IdCategoria']);//devuelve un array
      }
    }
    if($_SERVER['REQUEST_METHOD']=='GET'){
      if(!empty($_GET['IdCategoria']) && isset($_GET['IdCategoria'])){
            $subCategorias = (new SubCategoriasRepositorio)->devolverSubCategorias($_GET['IdCategoria']);//devuelve un array
      }
    }
    include_once __DIR__ .'/../../app/plantillas/administrador/verSubcategorias_de_CategoriasAdministrador.php';
  }//fin metodo

  public function verSubCategoriasAdministrador(){
    include_once __DIR__ . "/../Repositorio/subCategoriasRepositorio.inc";
    $subCategorias = (new SubCategoriasRepositorio)->verSubCategoriasAdministrador();//devuelve un array
    include_once __DIR__ .'/../../app/plantillas/administrador/verSubCategoriasAdministrador.php';
  }//fin metodo

  public function borrarSubCategoriaAdministrador(){
    include_once __DIR__ . "/../Repositorio/subCategoriasRepositorio.inc";
    $borra = (new SubCategoriasRepositorio)->borrarSubCategoriaAdministrador($_GET['idSubCategoria']);
    $subCategorias = (new SubCategoriasRepositorio)->verSubCategoriasAdministrador();//devuelve un array
    include_once __DIR__ .'/../../app/plantillas/administrador/verSubCategoriasAdministrador.php';
  }//fin metodo

  public function modificarSubCategoriaAdministrador(){
    include_once __DIR__ . "/../Repositorio/subCategoriasRepositorio.inc";
    $idSubCategoria = $_GET['idSubCategoria'];
    $subCategorias = (new SubCategoriasRepositorio)->devolverSubCategoriasPorId($idSubCategoria);
    include_once __DIR__ .'/../../app/plantillas/administrador/modificarSubCategoriaAdministrador.php';
  }//fin metodo

  public function enviarDatosModificacionSubCategoria(){
    include_once __DIR__ . "/../Repositorio/subCategoriasRepositorio.inc";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(empty($_POST['nombreSubCategoria']) && isset($_POST['nombreSubCategoria'])){
            $error = 'El campo nombre de subcategoria está vacio';
        }elseif(empty($_POST['descripcion']) && isset($_POST['descripcion'])){
            $error = 'El campo descripción está vacio';
        }else{
          $idSubCategoria = $_POST['idSubCategoria'];
          $nombreSubCategoria = $_POST['nombreSubCategoria'];
          $descripcion = $_POST['descripcion'];
          $boolSubCategoria = (new SubCategoriasRepositorio)->modificarSubCategoriaAdministradorId($idSubCategoria,$nombreSubCategoria,$descripcion);
          if($boolSubCategoria){
              $error = 'La subcategoria ha sido modificada correctamente';
          }else{
              $error = 'Ha habido algún problema y la subcategoria no ha sido modifcada';
          }
        }
    }
    $subCategorias = (new SubCategoriasRepositorio)->verSubCategoriasAdministrador();//devuelve un array
    include_once __DIR__ .'/../../app/plantillas/administrador/verSubCategoriasAdministrador.php';
  }//fin metodo

}//fin clase
