<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Pagina Inicio visitante Gestión Libros </title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="web/css/estilos.css" media="screen" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link href="web/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="web/css/font-awesome.min.css">
      <link href="web/css/custom.css" rel="stylesheet">
      <link rel="stylesheet" href="web/carousel/src/responsive-carousel.slide.css" media="screen">
      <link rel="stylesheet" href="web/carousel/assets/custom-responsive-carousel.css">
      <script src="web/js/bootstrap.min.js"></script>
      <script src="web/carousel/src/responsive-carousel.js"></script>
      <script src="web/carousel/src/responsive-carousel.touch.js"></script>
      <script src="web/carousel/src/responsive-carousel.drag.js"></script>
      <script src="web/carousel/src/responsive-carousel.dynamic-containers.js"></script>
      <script src="web/carousel/src/responsive-carousel.autoinit.js"></script>
      <script src="web/carousel/src/responsive-carousel.autoplay.js"></script>
      <script src="web/carousel/src/globalenhance.js"></script>
   </head>
   <body>
      <nav class="navbar navbar-inverse">
         <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="imagenI" src="Imagenes/logo.png" style="width:160px;height:61px;"></a>
            <div class="collapse navbar-collapse" id="myNavbar">
               <ul class="nav navbar-nav">
                  <li class="active"><a href="index.php?ctl=inicio">Home</a></li>
                  <li><a href="index.php?ctl=librosPorCategoria">Libros por materia</a></li>
                  <li><a href="index.php?ctl=tiendas">Tiendas</a></li>
                  <li><a href="index.php?ctl=contacto">Contacto</a></li>
                  <li><a href="index.php?ctl=formularioInscripcion">Apuntate</a></li>
               </ul>
               <form class="navbar-form navbar-right" role="search">
                  <div class="form-group input-group">
                     <input type="text" class="form-control" placeholder="Search..">
                     <span class="input-group-btn">
                     <button class="btn btn-default" type="button">
                     <span class="glyphicon glyphicon-search"></span>
                     </button>
                     </span>
                  </div>
               </form>
               <ul class="nav navbar-nav navbar-right">
                  <li>
                     <div class="container">
                        <!-- Trigger the modal with a button -->
                        <button type="button"  data-toggle="modal" data-target="#myModal">
                        <a href="#" class="glyphicon glyphicon-user">Logueate</a></button>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                           <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Iniciar sesion</h4>
                                 </div>
                                 <div class="modal-body">
                                    <form name="accederUsuarios" class="formAccederUsuarios" method="POST" action="index.php?ctl=inicioUsuarioComprobar">
                                       <h2>Formulario</h2>
                                       <label for="email">Email:</label>
                                       <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                                       <label for="pwd">Contraseña:</label>
                                       <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">
                                       <button type="submit" class="btn btn-default">Submit</button>
                                       <div class="checkbox">
                                          <label><input type="checkbox"> Remember me</label>
                                       </div>
                                    </form>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <div class="container text-center">
         <!-- LATERAL -->
         <?php include_once __DIR__ . "/../../../fuente/Repositorio/librosRepositorio.inc"; ?>
         <?php $librosCategoriasLateral = (new LibrosRepositorio)->librosCategoriasLateral();//es un multarray de 2 ?>
         <?php $librosSubCategoriasLateral = (new LibrosRepositorio)->librosSubCategoriasLateral();//es un multarray de 2 ?>
         <div class="col-sm-3 well">
           Bienvenido <?php echo $_SESSION['userNombre'].' perteneciente al grupo de: '.$_SESSION['grupoUser'] ;?><br>
           <?php
            $params = [
                'mensaje' => 'Bienvenido a la página de la gestión de libros',
                'dia' => date('Y-m-d'),
                'hora' => date('H:i:s')
            ];
         echo $params['mensaje']; ?>, son las <?php echo $params['dia']; ?> del <?php echo $params['hora']; ?>
            <div class="baseLibrosLateral">
               <?php
                  $numeroC =0;
                  foreach ($librosCategoriasLateral as $key1 => $categoria) {
                      foreach ($categoria as $key2 => $propiedadCategoria) {
                        if($key2 == 'NombreCategoria'){
                            $nombreCategoria = $propiedadCategoria;
                        }
                        if($key2 == 'numero'){
                            $cantidadCategoria = $propiedadCategoria;
                        }
                        if($key2 == 'IdCategoria'){
                            $idCategoria = $propiedadCategoria;
                        }
                      }
                      $numeroC++;
                      echo '<form name="verSubcategoriasCat" class="formSubcategorias" method="GET"
                       action="index.php?ctl=verSubcategorias_de_Categorias&IdCategoria='.$idCategoria.'">';
                          echo '<p style="color:red;">';
                          echo '<button type="button" data-toggle="collapse" data-target="#demo'.$numeroC.'" style="border:none;background:none;">';
                              echo '<i class="fa fa-book" style="font-size:24px"></i> '.$nombreCategoria.'  '.$cantidadCategoria.'';
                          echo '</button>';
                          echo '</p>';
                       echo '</form>';

                      //echo '<p style="color:red;"><a href="index.php?ctl=verSubcategorias_de_Categorias&IdCategoria='.$idCategoria.'"
                      //style="color:red;"><i class="fa fa-book" style="font-size:24px"></i> '.$nombreCategoria.'</a>  '.$cantidadCategoria.'</p>';
                      echo '<div id="demo'.$numeroC.'" class="collapse">';
                      foreach ($librosSubCategoriasLateral as $key3 => $subCategoria) {
                          foreach ($subCategoria as $key4 => $propiedadSubCategoria) {
                              if($key4 == 'IdCategoria'){
                                  $bool =false;
                                  if($propiedadSubCategoria == $idCategoria){
                                      $bool=true;
                                  }
                                  if($bool){
                                        echo '<p style="color:blue;"><a href="index.php?ctl=verLibrosPorSubCategoria&IdSubCategoria='.$subCategoria['IdSubCategoria'].'" >&nbsp;&nbsp;&nbsp;<i class="fa fa-book" style="font-size:12px"></i> '.$subCategoria['NombreSubCategoria'].'</a>  '.$subCategoria['numero'].'</p>';
                                  }
                                  $bool =false;
                              }
                          }
                      }
                      echo '</div>';
                  }
                  ?>
               <p><a href="#">Link</a></p>
               <p><a href="#">Link</a></p>
            </div>
         </div>
         <!-- FIN LATERAL -->
         <div class="col-sm-12 col-md-9 col-lg-9 content-padding">
            <div><span ><?= isset($error)?$error: null; ?></span></div>

            <?= $contenido ?>
            <a href="index.php?ctl=inicio">Inicio</a>
         </div>
         <div class="col-sm-2 well">
            <form name="accederUsuarios" class="formAccederUsuarios" method="POST" action="index.php?ctl=inicioUsuarioComprobar">
               <div class="container2">
                  <h2>Formulario</h2>
            <form>
            <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
            </div>
            <div class="form-group">
            <label for="pwd">Contraseña:</label>
            <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
            </form>
            </div>
            </form>
         </div>
      </div>
      </div>
      <footer class="footer-basic-centered">
         <p class="footer-links">
            <a href="index.php?ctl=inicio">Inicio</a>
            <a href="index.php?ctl=librosPorCategoria">Libros por materia</a>
            <a href="index.php?ctl=tiendas">Tiendas</a>
            <a href="index.php?ctl=contacto">Contacto</a>
			<a href="index.php?ctl=formularioInscripcion">Apuntate</a>
         </p>
         <p class="footer-company-name">Tienda © 2016</p>
         <img class="imagenFooter" src="Imagenes/logo.png" style="width:160px;height:61px;">
      </footer>
   </body>
</html>
