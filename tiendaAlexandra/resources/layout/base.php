<!DOCTYPE html>
<html>
  <head>
    <title>Cadena Tiendas</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../web/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../web/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../web/css/bootstrap-theme.css" />
    <link rel="stylesheet" type="text/css" href="../web/css/estilos.css" />
    <!-- Latest compiled and minified JavaScript -->

    <script src="../web/js/jquery-3.2.1.min.js"></script>
    <script src="../web/js/bootstrap.js"></script>

  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand red" href="index.php?ctl=inicio">Cadena Tienda Media</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
               <li><a href="index.php?ctl=inicio">Inicio</a></li>
               <!--<li><a href="index.php?ctl=buscarArticulo">Buscar Articulo</a></li>-->
               <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Departamentos <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <?php foreach($params['familias'] as $familia):?>
                      <li>
                        <a href='index.php?ctl=articulosPorFamilias&idFamilia=<?=$familia->getId()?>'><?=ucfirst($familia->getNombre())?></a>
                      </li>
                 <?php endforeach; ?>
                </ul>
              </li>
            </ul>
            <div class="col-md-3 col-sm-3">
              <form class="navbar-form" action="index.php" method="get">
              <div class="input-group">
                  <input type="hidden" name="ctl" value="buscarArticulo" >
                  <input type="text" class="form-control" name="nombre" value="<?php echo isset($params['nombre'])? $params['nombre']:null;  ?>" placeholder="Buscar articulo">
                  <div class="input-group-btn">
                      <button class="btn btn-default" type="submit"><i class="fa fa-search fa-2" aria-hidden="true"></i></button>
                  </div>
              </div>
              </form>
            </div>
            <ul class="nav navbar-nav navbar-right">
              <?php if($_SESSION['grupo']=='visitante'){?>
               <li><a href="index.php?ctl=iniciaSesion">Iniciar Sesión</a></li>
               <li><a href="index.php?ctl=registrarUsuario">Registrarme</a></li>
               <?php } ?>
              <?php if(isset($_SESSION['grupo']) && $_SESSION['grupo']!='visitante'){ ?>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-user"></i>Hola <?=$_SESSION['usuario']?> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                 <li><a href="index.php?ctl=miCuenta">Mi cuenta</a></li>
                 <?php if(isset($_SESSION['grupo']) && $_SESSION['grupo']=='clientes'){ ?>
                 <li><a href="index.php?ctl=misPedidos">Mis pedidos</a></li><?php } ?>
                 <?php if(isset($_SESSION['grupo']) && $_SESSION['grupo']=='admins'){ ?>
                 <li><a href="index.php?ctl=registrarUsuario">Registrar Administrador</a></li><?php } ?>
                 <li><a href="index.php?ctl=cerrarSesion">Cerrar Sesión</a></li>
                  </ul>
                </li>
                <?php } ?>
              <li><a href="index.php?ctl=carrito"><?php if(isset($_SESSION['carrito'])){?><div class="numCarrito"><?= count($_SESSION['carrito']);?></div><?php }?><i class="carrito fa fa-shopping-cart fa-2" aria-hidden="true"></i></a></li>
            </ul>
        </div>
      </div>
    </nav>
    <div id="contenido" class="container">
      <?= $contenido?>
    </div>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h5 class="red">Departamentos</h5>
            <ul class="list-inline">
              <?php foreach($params['familias'] as $familia):?>
                  <li><a href='index.php?ctl=articulosPorFamilias&idFamilia=<?=$familia->getId()?>'><?=ucfirst($familia->getNombre())?></a></li>
             <?php endforeach; ?>
            </ul>
          </div>
          <?php if(isset($_SESSION['grupo']) && $_SESSION['grupo'] !='visitante'): ?>
          <div class="col-md-2">
            <h5 class="red">Mi sesión:</h5>
            <li><a href="index.php?ctl=miCuenta">Mi cuenta</a></li>
             <?php if(isset($_SESSION['grupo']) && $_SESSION['grupo']=='clientes'){ ?>
               <li><a href="index.php?ctl=misPedidos">Mis pedidos</a></li><?php } ?>
            <?php if(isset($_SESSION['grupo']) && $_SESSION['grupo']=='admins'){ ?>
            <li><a href="index.php?ctl=registrarUsuario">Registrar Administrador</a></li><?php } ?>
            <li><a href="index.php?ctl=cerrarSesion">Cerrar Sesión</a></li>
          </div>
        <?php endif; ?>
          <div class="col-md-2">
            <h5 class="red">Siguenos en:</h5>
            <ul class="list-inline">
                <li class="webSociales"><i class="fa fa-fw fa-lg fa-twitter"></i></li>
                <li class="webSociales"><i class="fa fa-fw fa-lg fa-facebook"></i></li>
                <li class="webSociales"><i class="fa fa-fw fa-lg fa-instagram"></i></li>
                <li class="webSociales"><i class="fa fa-fw fa-lg fa-google"></i></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
