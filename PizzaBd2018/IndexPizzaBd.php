<?php
session_start();
include 'Funciones.php';
include_once 'Conexion.php';
 ?>
<html>

<head>
	<title>BIENVENIDOS A PIZZA NET</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>
	<h1 class="tituloPresentacion">BIENVENIDOS A PIZZA NET</h1>

	<!-- HEADER  -->
    <header>
      <div id="parteCentralIzquierda"><img src="imagenes/pizza.jpg"></div>
      <div id="parteCentralCentral"><h4>Cambia tu idea de la pizza</h4></div>
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
						  <!-- ARTICLE -->
							<article>
								<?php
                    ensenarDatosPreciosPizzas();
                 ?>
							</article>

					</section>
					<!-- ASIDE -->
					<aside class="izquierdaAside">
							<h1 class="tituloDatosDerecha">PIZZA NET PEDIDOS</h1><!--  required="required"  -->
							<form name="formularioPizza" action="procesamientoCliente.php" method="POST">
									<table>
											<tr>
													<td class="precioTitulo">Nombre cliente: </td>
													<td class="precioTd"><input type="text" value="" name="nombre"></td>
											</tr>
											<tr>
													<td class="precioTitulo">Direccion cliente: </td>
													<td class="precioTd"><input type="text" value="" name="direccion" ></td>
											</tr>
											<tr>
													<td class="precioTitulo">Telefono cliente: </td>
													<td class="precioTd"><input type="text" value="" name="telefono"></td>
											</tr>
											<tr>
													<td class="precioTitulo">Email cliente: </td>
													<td class="precioTd"><input type="text" value="" name="email"></td>
											</tr>
									</table>

									<input type="submit" value="Enviar datos cliente" name="EnviarCliente" class="centroBoton" colspan="2">
                  <img src="imagenes/pizzanet.jpg">
							 </form>
					</aside>
			</section>



	<!-- FOOTER -->
    <footer>
				<h1>www.pizzanet.com</h1>
    </footer>
</body>
</html>
