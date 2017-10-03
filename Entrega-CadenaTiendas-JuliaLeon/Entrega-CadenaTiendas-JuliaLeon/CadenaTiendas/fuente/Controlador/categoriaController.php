<?php
class CategoriaController{
  public function showCategories(){
    $categorias = array('cat'=>array());
    require __DIR__ . '/../Repositorio/categoriaRepositorio.php';
    $categorias['cat']=(new CategoriaRepositorio)->showCategories();
    require __DIR__ . '/../../app/plantillas/showCategories.php';
  }
}
 ?>
