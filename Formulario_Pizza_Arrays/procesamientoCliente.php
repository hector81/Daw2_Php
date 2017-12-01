<?php
session_start();//empezamos sesion
$arrayPedidos = array();//creamos un array que luego enviamos por sesion
$_SESSION['arrayPedidos'] = $arrayPedidos;
//echo 'session_id = ',session_id(),'<br>';
$booleano = false;
$_SESSION['actualizar'] = $booleano;
include 'Funciones.php';//llamamos a las funciones
?>
<html>
  <head>
    <title>Pizza Net</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="estilos.css">
  </head>
<body>
  <h1>BIENVENIDOS A PIZZA NET</h1>

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
                if(empty(trim($_POST['nombre']))){
                    echo 'El campo nombre del cliente no puede estar vacio.<br>';generarErrorVuelta();
                }elseif(empty(trim($_POST['direccion']))){
                    echo 'El campo dirección del cliente no puede estar vacio.<br>';generarErrorVuelta();
                }elseif(empty(trim($_POST['telefono']))){
                    echo 'El campo teléfono del cliente no puede estar vacio.<br>';generarErrorVuelta();
                }elseif(!comprobarTelefono(trim($_POST['telefono']))){
                    echo 'El campo teléfono bebe tener nueve número y no contener letras.<br>';generarErrorVuelta();
                }elseif(empty(trim($_POST['email']))){
                    echo 'El email debe ponerse.<br>';generarErrorVuelta();
                }elseif(!validarEmail(trim($_POST['email']))){
                    echo 'El email debe ser correcto .<br>';generarErrorVuelta();
                }else{//recibimos los datos y los enviamos por sesion
                    $nombre = trim($_POST['nombre']);
                    $direccion = trim($_POST['direccion']);
                    $telefono = trim($_POST['telefono']);
                    $email = trim($_POST['email']);
                    $_SESSION['nombre'] = trim($_POST['nombre']);
                    $_SESSION['direccion'] = trim($_POST['direccion']);
                    $_SESSION['telefono'] = trim($_POST['telefono']);
                    $_SESSION['email'] = trim($_POST['email']);

                    //creamos el cliente
                    $cliente = crearCliente($nombre,$direccion,$telefono,$email);
                    //lo enviamos por sesion
                    $_SESSION['cliente'] = $cliente;
                    echo '<h1>DATOS CLIENTE</h1>';
                    recorrerCliente($cliente);
                    generarFormularioPedido();
                    //redireccionamos al procesamiento del pedido
                    header('Location: procesamientoPedido.php');
                    exit();
                    }//fin else
                }//fin if isset
                else{//este else es por si al racargar no perdamos los datos
                    $cliente = $_SESSION['cliente'];//recibimos el cliente por sesion
                    echo '<h1>DATOS CLIENTE</h1>';
                    recorrerCliente($cliente);
                    generarFormularioPedido();
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
