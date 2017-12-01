<?php
session_start();
$actual = 'Hoy es el día '.date('d/m/Y').' son las ' .date('H:i:s').'<br>';
echo $actual;
echo 'session_id = ',session_id(),'<br>';

include 'Cliente.php';
include 'Pizza.php';
include 'ListaPedidos.php';
include 'Funciones.php';
$listaPedidos = new ListaPedidos();
$_SESSION['listaPedidos'] = serialize($listaPedidos);

?>
<html>
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

        <!-- ASIDE -->
        <aside>
        <?php
              if(isset($_POST['EnviarCliente'])){
                  if(empty($_POST['nombre']) && isset($_POST['nombre'])){
                      echo 'El campo nombre del cliente no puede estar vacio.<br>';generarErrorVuelta();
                  }elseif(empty($_POST['direccion']) && isset($_POST['direccion'])){
                      echo 'El campo dirección del cliente no puede estar vacio.<br>';generarErrorVuelta();
                  }elseif(empty($_POST['telefono']) && isset($_POST['telefono'])){
                      echo 'El campo teléfono del cliente no puede estar vacio.<br>';generarErrorVuelta();
                  }elseif(empty($_POST['email']) && isset($_POST['email'])){
                      echo 'El email debe ponerse.<br>';generarErrorVuelta();
                  }else{
                    $nombre = strval($_POST['nombre']);
                    $direccion = strval($_POST['direccion']);
                    $telefono = strval($_POST['telefono']);
                    $email = strval($_POST['email']);
                    //crear cliente con los datos pasados por post
                    $cliente = new Cliente($nombre,$direccion,$telefono,$email);
                    ////hacemos el try catch para la excepcion
                    try{
                        echo $cliente->comprobarTelefono($telefono);
                        echo $cliente->validarEmail($email);
                        //comprobamos que los datos de correo y telefono sean correctos
                        if(!$cliente->comprobarTelefonoSinException($_POST['telefono'])){
                            echo 'El campo teléfono debe tener nueve número y no contener letras.<br>';generarErrorVuelta();
                        }elseif(!$cliente->validarEmailSinException($_POST['email'])){
                            echo 'El email debe ser correcto .<br>';generarErrorVuelta();
                        }else{
                              //primero enseñamos el cliente y luego generamos formulario
                              $cliente->recorrerCliente();
                              generarFormularioPedido();
                        }
                        //enviamos el cliente por sesion
                        $_SESSION['cliente'] = serialize($cliente);
                     }catch(Exception $e){
                       echo $e->getMessage();
                     }finally{
                       echo 'Los datos han sido tratados.<br>';
                       generarErrorVuelta();
                     }///fin del try catch
                  }//fin else
              }//fin if isset
              //por si recarga la pagina
              else{
                echo 'HAS RECARGADO LA PÁGINA O ACTUALIZADO';
                if($cliente == false){
                    generarErrorVuelta();
                }else{
                  $cliente->recorrerCliente();
                  generarFormularioPedido();
                  $_SESSION['cliente'] = serialize($cliente);
                }

              }
         ?>

        </aside>
    </section>
    <!-- FOOTER -->
    <footer>
    <h1>www.pizzanet.com</h1>
    </footer>

</body>
</html>
