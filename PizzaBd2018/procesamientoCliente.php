<?php
session_start();
include 'Cliente.php';
include 'Conexion.php';
include 'Funciones.php';

//PARA ENVIAR POR SESION VACIOS
$arrayTOTALdatosPEDIDOS = [];//ESTE CONTENDRA TODOS :
$_SESSION['arrayTOTALdatosPEDIDOS'] = serialize($arrayTOTALdatosPEDIDOS);
$arrayTOTALNECESARIOINSERCIONES = [];//ESTE CONTENDRA TODOS LOS DATOS NECESARIOS PARA INSERTAR EN LA BASE DE DATOS
$_SESSION['arrayTOTALNECESARIOINSERCIONES'] = serialize($arrayTOTALNECESARIOINSERCIONES);
$arrayImportes = [];//ESTE CONTENDRA TODOS los importes
$_SESSION['arrayImportes'] = serialize($arrayImportes);
$totalFacturaPedidos = 0;//el total de todos los pedidos
$_SESSION['totalFacturaPedidos'] = serialize($totalFacturaPedidos);

?>
<html>
  <head>
    <title>Pizza Net</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="estilos.css">
  </head>
<body>
        <h1 class="tituloPresentacion">PIZZA NET PEDIDOS</h1>
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

        <!-- ASIDE -->
        <aside class="izquierdaAside">
        <?php
              if(isset($_POST['EnviarCliente'])){
                  if(empty($_POST['nombre']) && isset($_POST['nombre'])){
                      echo '<div class="errorAviso">ERROR: El campo nombre del cliente no puede estar vacio.</div><br>';generarErrorVuelta();
                  }elseif(empty($_POST['direccion']) && isset($_POST['direccion'])){
                      echo '<div class="errorAviso">ERROR: El campo dirección del cliente no puede estar vacio.</div><br>';generarErrorVuelta();
                  }elseif(empty($_POST['telefono']) && isset($_POST['telefono'])){
                      echo '<div class="errorAviso">ERROR: El campo teléfono del cliente no puede estar vacio.</div><br>';generarErrorVuelta();
                  }elseif(empty($_POST['email']) && isset($_POST['email'])){
                      echo '<div class="errorAviso">ERROR: El email debe ponerse.</div><br>';generarErrorVuelta();
                  }else{
                  	$nombre = strval($_POST['nombre']);//NVARCHAR(100) NOT NULL
                  	$direccion = strval($_POST['direccion']);//NVARCHAR(100) NOT NULL
                  	$tlfno = strval($_POST['telefono']); //NCHAR(9) NOT NULL,
                  	$eCorreo = strval($_POST['email']);//NVARCHAR(100) NOT NULL

                    //crear cliente con los datos pasados por post
                    $cliente = new Cliente($nombre,$direccion,$tlfno,$eCorreo);
                    ////hacemos el try catch para la excepcion
                    try{
                        $cliente->comprobarTelefono($tlfno);
                        $cliente->validarEmail($eCorreo);
                        //comprobamos que los datos de correo y telefono sean correctos
                        if(!$cliente->comprobarTelefonoSinException($cliente->getTlfno())){
                            echo '<div class="errorAviso">ERROR: El campo teléfono debe tener nueve número y no contener letras.</div><br>';generarErrorVuelta();
                        }elseif(!$cliente->validarEmailSinException($cliente->getECorreo())){
                            echo '<div class="errorAviso">ERROR: El email debe ser correcto.</div><br>';generarErrorVuelta();
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
                       //echo 'Los datos han sido tratados.<br>';
                       generarErrorVuelta();
                     }///fin del try catch
                  }//fin else
              }//fin if isset
              //por si recarga la pagina
              else{
                echo 'HAS RECARGADO LA PÁGINA O ACTUALIZADO';
                 $cliente = unserialize($_SESSION['cliente']);
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
