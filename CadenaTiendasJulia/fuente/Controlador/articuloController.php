<?php
class ArticuloController{
  public function actualizaImagenes(){
    $params = array('nombre'=>'', 'art'=>array());
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $params['nombre'] = $_POST['nombre'];
      require __DIR__ . '/../Repositorio/articuloRepositorio.php';
      $params['art'] = (new ArticuloRepositorio)->findArticuloByNombre(array($_POST['nombre']));
    }
    require __DIR__ . '/../../app/plantillas/showProducts.php';
  }

  public function searchArticle(){
      $params = array('art'=>array());
      if($_SERVER['REQUEST_METHOD']=='POST'){
        $params['busqueda'] = $_POST['busqueda'];
        require __DIR__ . '/../Repositorio/articuloRepositorio.php';
        $params['art'] = (new ArticuloRepositorio)->findArticuloByNombre(array($_POST['busqueda']));
      }
      require __DIR__ . '/../../app/plantillas/showProducts.php';
  }

  public function showArticle(){
    $id = $_GET['id'];
    require __DIR__ . '/../Repositorio/articuloRepositorio.php';
    $articulo = (new ArticuloRepositorio)->findArticuloById(array($id));
    require __DIR__ . '/../../app/plantillas/showArticle.php';
  }

  public function artByCategory(){
    $id=$_GET['id'];
    $params= array('art' => array());
    require __DIR__ . '/../Repositorio/articuloRepositorio.php';
    $params['art'] = (new ArticuloRepositorio)->findArtByCat(array($id));
    require __DIR__ . '/../../app/plantillas/showProducts.php';
  }

  public function nuevaFoto(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $params = array('id' => $_POST['id'],
                      'foto' => fopen($_FILES['file']['tmp_name'], "r"));
      require __DIR__ . '/../Repositorio/articuloRepositorio.php';
      (new ArticuloRepositorio)->actualizaFoto($params);
      header('Location: /cadenatiendas/index.php?ctl=actualizaImagenes');
    }else {
      $id = $_GET['id'];
      $nombre = $_GET['nombre'];
      require __DIR__ . '/../../app/plantillas/nuevaFoto.php';
    }
  }
}
 ?>
