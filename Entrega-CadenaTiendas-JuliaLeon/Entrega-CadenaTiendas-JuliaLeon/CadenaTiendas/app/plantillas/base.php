<!DOCTYPE html>
<html>
  <head>
    <title>Cadena Tiendas</title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href='web/css/estilos.css' />
  </head>
  <body>
    <div class="wrapper-fullwidth">
        <header>
          <div>
            <section class="logo">
              <h1>Tiendas Media</h1>
            </section>
            <section class="nav-right">
              <form class="search" action="index.php?ctl=searchArticle" method="post">
                <input type="text" name="busqueda" >
                <input type="submit" value="Buscar">
              </form>
            </section>
          </div>
          <hr>
          <nav>
            <div>
              <ul>
                <li><a href="index.php?ctl=home">Inicio</a></li>
                <li><a href="index.php?ctl=showCategories"> Categorías</a></li>
                <?php if(isset($_SESSION['grupo']) && $_SESSION['grupo'] === 'admin') { ?>
                  <li><a href="index.php?ctl=actualizaImagenes">Actualizar imágenes</a></li>
                  <li><a href="index.php?ctl=logOut">Cerrar sesión</a></li>
                <?php }else if(isset($_SESSION['grupo']) && $_SESSION['grupo'] === 'cliente') {?>
                  <li><a href="index.php?ctl=logOut">Cerrar sesión</a></li>
                <?php }else{?>
                  <li><a href="index.php?ctl=login">Iniciar sesión</a></li>
                  <li><a href="index.php?ctl=signIn">Registrarse</a></li>
                <?php }?>
              </ul>
            </div>
            <div class="nav-right">
              <section class="user-hi">
                <?php if(isset($_SESSION['grupo']) && $_SESSION['grupo'] === 'admin') { ?>
                <a class="user-intro" href="#">Bienvenido Administrador</a>
                <?php }else if(isset($_SESSION['grupo']) && $_SESSION['grupo'] === 'cliente') {?>
                <a class="user-intro" href="index.php?ctl=userProfile">Hola <?= $_SESSION['usuario'] ?></a>
                <?php }else{?>
                <a class="user-intro" href="index.php?ctl=login">Bienvenido invitado</a>
                <?php }?>
              </section>
              <section class="cart">
                    <a href="index.php?ctl=showCart">
                      <i class="material-icons">shopping_cart</i>
                      <span class="counter"><?= count($_SESSION['carrito']);?></span>
                    </a>
              </section>
            </div>
          </nav>
        </header>
    </div>
    <div id="contenido" class="wrapper-content">
      <?= $contenido ?>
    </div>
    <div class="wrapper-fullwidth-footer">
      <footer>
        <hr>
        <br>
        <p class="pie">- Pie de página -</p>
      </footer>
    </div>
  </body>
</html>
