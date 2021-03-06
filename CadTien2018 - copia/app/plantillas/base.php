<!DOCTYPE html>
<html>
  <head>
    <title>Cadena Tiendas</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href='web/css/estilos.css' />
  </head>
  <body>
    <header>
        <div class="tituloHeaderIzquierdo">
            <h1>Bienvenidos a </h1><br>
            <div><span class="avisoError" ><?= isset($error)?$error: null; ?></span></div>
        </div>
        <div class="tituloHeaderDerecho">
            <img class="imagenI" src="web/Imagenes/mediamarkt_logo.png">
        </div>
        <div class="tituloHeaderDerechoMAS">
            <form id="inputCabecera1" class="inputCabecera" action="index.php?ctl=buscar" method="POST">
                    <input type="text" value="" name="nombreBuscar">
                    <input type="submit" value="buscar" name="buscar">
            </form>
            <form id="inputCabecera2" class="inputCabecera" action="index.php?ctl=inicioUsuario" method="POST">
                   USER<input type="text" class="userNombre" value="" name="userNombre">
                   PASSWORD<input type="password"  class="contraseniaUser" value="" name="contraseniaUser"><br>
                   Usuario <input type="radio"  class="grupoUser" value="Usuario" name="grupoUser"><br>
                   Administrador<input type="radio"  class="grupoUser" value="Administrador" name="grupoUser">
                  <input type="submit" value="Enviar usuario" name="enviarUsuario">
            </form>
        </div>
    </header>
    <nav>
       <ul class="menu">
            <li><a href="index.php?ctl=inicio">Inicio</a></li>
            <li><a href="index.php?ctl=showCategorias">Categorias</a></li>
            <li><a href="index.php?ctl=showArticulos">Artículo</a></li>
            <!--<a href="index.php?ctl=actualizarFoto">Actualizar Foto</a>-->
            <li><a href="index.php?ctl=verTiendasCadena">Tiendas</a></li>
            <li><a href="index.php?ctl=buscarTiendasProvincia">Tiendas por Provincia</a></li>
            <li><a href="index.php?ctl=introducirUsuarioNuevo">Introducir Usuario Nuevo</a></li>
        </ul>
    </nav>
    <!-- SECTION 1-->
   <section id="contenedor">

       <!-- SECTION 2-->
       <section id="principal">

           <!-- ARTICLE -->
           <article>
             <div id="contenido">
               <?= $contenido ?>
             </div>
           </article>

       </section>
       <!-- ASIDE -->
       <aside>
           <h2>MENU VISITANTE</h2>
           <ul class="lateral">
               <li><a href="index.php?ctl=inicio">Inicio</a></li>
               <li><a href="index.php?ctl=showCategorias">Categorias</a></li>
               <li><a href="index.php?ctl=showArticulos">Artículo</a></li>
               <!--<a href="index.php?ctl=actualizarFoto">Actualizar Foto</a>-->
               <li><a href="index.php?ctl=verTiendasCadena">Tiendas</a></li>
               <li><a href="index.php?ctl=buscarTiendasProvincia">Tiendas por Provincia</a></li>
               <li><a href="index.php?ctl=introducirUsuarioNuevo">Introducir Usuario Nuevo</a></li>
            </ul>
       </aside>
   </section>

    <footer>
      <!-- <hr>
      <p align="center">CADENA TIENDAS MEDIA</p> -->
      <img class="imagenI" src="web/Imagenes/mediamarkt_logo.png">
    </footer>
  </body>
</html>
