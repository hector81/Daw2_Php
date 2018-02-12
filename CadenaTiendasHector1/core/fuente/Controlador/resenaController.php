<?php
class ResenaController
{
  public function verResenas()
    {
      if($_SERVER['REQUEST_METHOD']=='POST')
      if($_POST['idResena']==""){
        $error = 'ID VACIO';

      }else{
        $id = $_POST['idResena'];
        require __DIR__ . '/../Repositorio/resenaRepositorio.php';
        $comprobarResena = (new ResenaRepositorio)-> comprobarResenaExiste($id);

        if($comprobarResena == false){
            $error ="No hay reseñas para este producto";
        }else{
            $listaResenas = (new ResenaRepositorio)->verResenas($id);
            require __DIR__ . '/../../app/plantillas/verResenas.php';
        }

      }

      require __DIR__ . '/../../app/plantillas/buscarResenas.php';
    }

    public function escribirResenas()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        if($_POST['nombreArticulo']=="" || $_POST['email']=="" || $_POST['puntuacion']=="" || $_POST['comentarios']==""){
            $error = 'Falta algún campo';
        }else{
          if($_POST['puntuacion'] > 10 || $_POST['puntuacion'] < 0){
              $error = 'La puntuación debe ser de  0 a 10';
          }else{
              require __DIR__ . '/../Repositorio/ResenaRepositorio.php';
              $comprobarEmail = (new ResenaRepositorio)-> validarEmail($_POST['email']);
              if($comprobarEmail == true){
                require __DIR__ . '/../Repositorio/articuloRepositorio.php';
                $comprobarArticulo = (new ArticuloRepositorio)-> comprobarArticuloExiste($_POST['nombreArticulo']);
                if($comprobarArticulo == true){
                  $fecha_actual = date('Y-m-d');
                  //insertar
                  $idArticulo = (new ArticuloRepositorio)-> findIdArticuloByNombre($_POST['nombreArticulo']);
                  $nombreArticulo = $_POST['nombreArticulo'];
                  $fechaResenia = $fecha_actual;
                  $emailResenia = $_POST['email'];
                  $puntuacion = $_POST['puntuacion'];
                  $comentarios = $_POST['comentarios'];
                  $modifiedDate = $fecha_actual;
                  $comprobarInsercionResena = (new ResenaRepositorio)-> insertarResena($idArticulo, $nombreArticulo,
                  $fechaResenia, $emailResenia, $puntuacion, $comentarios, $modifiedDate);
                  if($comprobarInsercionResena == true){
                      $error ="RESENA DADA DE ALTA";
                  }else{
                      $error ="Ha habido algún error y no se ha podido insertar la resena";
                  }
                }else{
                    $error ="No hay articulos con ese nombre";
                }
              }else{
                $error ="CORREO NO VALIDO";
              }

          }
        }
        require __DIR__ . '/../../app/plantillas/escribirResenas.php';
    }

    public function vertodasResenas(){
      require __DIR__ . '/../Repositorio/resenaRepositorio.php';
      $listaResultados = (new ResenaRepositorio)-> visualizarTodasResenas();
      require __DIR__ . '/../../app/plantillas/vertodasResenas.php';
    }
}

?>
