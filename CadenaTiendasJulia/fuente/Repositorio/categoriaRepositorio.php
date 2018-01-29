<?php
  class CategoriaRepositorio{
    public function showCategories(){
      $sql="SELECT id, nombre, descripcion
              FROM familia";
      include __DIR__ . '/../../core/conexionBd.php';

      $con = (new ConexionBd())->getConexion();
      $cursor = $con->prepare($sql);
      $cursor->execute();

      $categorias = array();
      while($fila = $cursor->fetch(PDO::FETCH_ASSOC)){
        $categorias[] = new Categoria($fila);
      }
      return $categorias;
    }
  }
 ?>
