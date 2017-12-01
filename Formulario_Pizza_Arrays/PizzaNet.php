<?php
session_start();//empezamos sesion
?><html>
  <head>
    <title>Pizza Net</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="estilos.css">
  </head>
<body>
      <h1>PIZZA NET PEDIDOS</h1>
      <!-- HEADER  -->
        <header>
          <div id="parteCentralIzquierda"><img src="imagenes/pizza.jpg"></div>
          <?php
            $fecha = date('d/m/Y');
            $hora = date('H:i:s');
            echo '<div id="parteCentralDerecha">FECHA: <input type="text" value="'.$fecha.'"><br>HORA<input type="text" value="'.$hora.'"></div>';
          ?><div class="aclarar"></div>
        </header>
        <!-- SECTION 1-->
          <section id="contenedor">
          		<!-- SECTION 2-->
          		<section id="principal">
          		<h2>PRECIOS</h2>
              <!--  <fieldset><legend>Datos personales</legend></fieldset> -->
          			<!-- ARTICLE -->
          		    <article>
          					<h1><span class="tituloPrecio" style="color:red;">TIPOS PIZZAS PRECIO</span></h1>
          					<div class="columna1">
          							<h3><span class="negro">Margarita :</span> 4 euros</h3>
          							<img src="imagenes/pizza-margarita.jpg">
                    </div>
                    <div class="columna2">
          							<h3><span class="negro">Barbacoa :</span> 4.5 euros</h3>
          							<img src="imagenes/pizza-barbacoa.jpg">
                    </div>
                    <div class="columna3">
          							<h3><span class="negro">4 estaciones :</span> 5 euros</h3>
          							<img src="imagenes/pizza-4-estaciones.jpg">
                    </div>
                    <div class="columna1">
          							<h3><span class="negro">4 quesos :</span> 3.75 euros</h3>
          							<p><img src="imagenes/pizza-4-quesos.jpg">
                    </div>
                    <div class="columna2">
          							<h3><span class="negro">Carboranara :</span> 4 euros</h3>
          							<img src="imagenes/pizza-carbonara.jpg">
                    </div>
                    <div class="columna3">
          							<h3><span class="negro">Romana :</span> 5 euros</h3>
          							<img src="imagenes/pizza-romana.jpg">
                    </div>
                    <div class="columna1">
          							<h3><span class="negro">Mediterráneo :</span> 4.25 euros</h3>
          							<img src="imagenes/pizza-mediterranea.jpg">
                    </div>
                    <div class="aclarar"></div>
          					<h1><span class="tituloPrecio" style="color:red;">TAMAÑOS PIZZA PRECIO</span></h1>
                    <div class="columna1">
          							<h3><span class="negro">Normal :</span> 4 euros</h3>
          							<img src="imagenes/pizza-tamano-normal.jpg">
                    </div>
                    <div class="columna2">
          							<h3><span class="negro">Grande :</span> 5 euros</h3>
          							<img src="imagenes/pizza-tamano-grande.jpg">
                    </div>
                    <div class="columna3">
          							<h3><span class="negro">Familiar :</span> 6.5 euros</h3>
          							<img src="imagenes/pizza-tamano-familiar.jpg">
                    </div>
                    <div class="aclarar"></div>
          					<h1><span class="tituloPrecio" style="color:red;">MASA PIZZA PRECIO</span></h1>
                    </div>
                    <div class="columna1">
           							<h3><span class="negro">Fina :</span> 2 euros</h3>
           							<img src="imagenes/pizza-masa-fina.jpg">
                    </div>
                    <div class="columna2">
           							<h3><span class="negro">Normal :</span> 2.5 euros</h3>
           							<img src="imagenes/pizza-masa-normal.jpg">
                    </div>
                    <div class="aclarar"></div>
          					<h1><span class="tituloPrecio" style="color:red;">EXTRAS PIZZA PRECIO</span></h1>
                    </div>
                    <div class="columna1">
           							<h3><span class="negro">Queso :</span> 1 euro</h3>
           							<img src="imagenes/queso.jpg">
                    </div>
                    <div class="columna2">
           							<h3><span class="negro">Pimiento :</span> 1 euro</h3>
           							<img src="imagenes/pimiento.jpg">
                    </div>
                    <div class="columna3">
           							<h3><span class="negro">Cebolla :</span> 1 euro</h3>
           							<img src="imagenes/cebolla.jpg">
                    </div>
                    <div class="columna1">
           							<h3><span class="negro">Jamón :</span> 1 euro</h3>
           							<img src="imagenes/jamon.jpg">
                    </div>
                    <div class="columna2">
           							<h3><span class="negro">Pollo :</span> 1 euro</h3>
           							<img src="imagenes/pollo.jpg">
                    </div>
          		    </article>
          		</section>
              <!-- ASIDE -->
          		<aside>
            			<h1>PIZZA NET PEDIDOS</h1>
            			<form name="formularioPizza" action="procesamientoCliente.php" method="POST">
                      <table>
                          <tr>
                              <td class="precioTitulo">Nombre cliente: </td>
                              <td class="precioTd"><input type="text" value="" name="nombre" required="required"></td>
                          </tr>
                          <tr>
                              <td class="precioTitulo">Direccion cliente: </td>
                              <td class="precioTd"><input type="text" value="" name="direccion" required="required"></td>
                          </tr>
                          <tr>
                              <td class="precioTitulo">Telefono cliente: </td>
                              <td class="precioTd"><input type="text" value="" name="telefono" required="required"></td>
                          </tr>
                          <tr>
                              <td class="precioTitulo">Email cliente: </td>
                              <td class="precioTd"><input type="text" value="" name="email" required="required"></td>
                          </tr>
                      </table>

                			<input type="submit" value="Enviar datos cliente" name="EnviarCliente" class="centroBoton" colspan="2">
        			     </form>
          		</aside>
          </section>

          <!-- FOOTER -->
          <footer>
      				<h1>www.pizzanet.com</h1>
          </footer>

</body>
</html>
