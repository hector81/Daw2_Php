<?php
///creamos el clientes con los datos pasados por post
function crearCliente($nombre,$direccion,$telefono,$email){
  $cliente = array(
    '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Nombre del cliente </td>
    <td class='."pedidoTD".'>' => $nombre.'</td></tr>',
    '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Direccion del cliente </td>
    <td class='."pedidoTD".'>' => $direccion.'</td></tr>',
    '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Telefono del cliente </td>
    <td class='."pedidoTD".'>' => $telefono.'</td></tr>',
    '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Email del cliente </td>
    <td class='."pedidoTD".'>' => $email.'</td></tr>',
  );
  return $cliente;
}
//creamos funcion para calcular precio pedido
function calcularPrecioPedido($tipoPizza,$tamanoPizza,$masaPizza,$extrasPizza,$numeroPizzas){
  $precio = 0.0;
  //TIPO PIZZA
      switch ($tipoPizza) {
        case 'margarita':
          $precio = $precio + 4;
          break;
        case 'barbacoa':
          $precio = $precio + 4.5;
          break;
        case '4estaciones':
          $precio = $precio + 5;
          break;
        case '4quesos':
          $precio = $precio + 3.75;
          break;
        case 'carbonara':
          $precio = $precio + 4;
          break;
        case 'romana':
          $precio = $precio + 5;
          break;
        case 'mediterranea':
          $precio = $precio + 4.25;
          break;
      }
  //TAMAÑO PIZZA
      switch ($tamanoPizza) {
        case 'normal':
          $precio = $precio + 4;
          break;
        case 'grande':
          $precio = $precio + 5;
          break;
        case 'familiar':
          $precio = $precio + 6.5;
          break;
      }
  //MASA PIZZA
      switch ($masaPizza) {
        case 'fina':
          $precio = $precio + 2;
          break;
        case 'familiar':
          $precio = $precio + 2.5;
          break;
      }
  //EXTRAS PIZZA
  foreach ($extrasPizza as $key => $extras) {
      switch ($extras) {
        case 'queso':
          $precio += 1;
          break;
        case 'pimiento':
          $precio += 1;
          break;
        case 'cebolla':
          $precio += 1;
          break;
        case 'jamon':
          $precio += 1;
          break;
        case 'pollo':
          $precio += 1;
          break;
      }
  }
  $resultado = $precio*$numeroPizzas;
  return $resultado;
}


//imprimir cliente
function recorrerCliente($cliente){
  echo '<table class='."tabla".'>';
  foreach ($cliente as $key => $value) {
      echo $key.$value;
  }
  echo '</table>';
}

/////crear pedido en un array
function crearPedido($tipoPizza,$tamanoPizza,$masaPizza,$extrasPizza,$numeroPizzas,$precioPedido){
  $extras = '';
  foreach ($extrasPizza as $key => $value) {
      $extras .= $value.' <br>';
  }
  //creamos el pedido, extras es un array
  $pedido = array(
    '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>El tipo de pizza es </td><td class='."pedidoTD".'>' =>
    $tipoPizza.'</td></tr>',
    '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>El tamaño de pizza es </td><td class='."pedidoTD".'>' =>
    $tamanoPizza.'</td></tr>',
    '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>La masa de la pizza es </td><td class='."pedidoTD".'>' =>
    $masaPizza.'</td></tr>',
    '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Extras </td><td class='."pedidoTD".'>' =>
    $extras.'</td></tr>',
    '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>El número de pizzas de este tipo pedidos </td><td class='."pedidoTD".'>' =>
    $numeroPizzas.'</td></tr>',
    '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>El precio de este pedido es </td><td class='."pedidoTD".'>' =>
    $precioPedido.' euros</td></tr>'
  );
  return $pedido;
}

//recorrer pedido
function recorrerPedido($pedido){
  echo '<table class='."tabla".'>';
  foreach ($pedido as $key => $value) {
      if(is_array($value)){//para los extras
          echo $key;
          echo $value;

      }else{
        echo $key.$value;
      }
  }
  echo '</table>';
}

//recorremnos todos los pedidos que tenga el cliente en el array
function recorrerPedidosCliente($arrayPedidos){
    $contador=0;

    foreach ($arrayPedidos as $key => $value) {
      echo '<h1>PIZZAS PEDIDAS ' .($contador+1).'</h1>';
      echo '<table>';
      echo '<tr class='.'precioTr'.'>';
        foreach ($value as $key1 => $value1) {
           echo '<td class='."precioTituloTD".'>'.$key1.'</td><td class='."pedidoTD".'>'.$value1.'</td>';
        }

      echo '</tr>';
      echo '</table>';

      echo '<form name='."formularioCancelarPedido".$contador.' action='."procesamientoPedido.php".' method='."POST".' >';
      echo '<table>';
      echo '<tr>';
          echo '<td class="centroBoton">';
              echo "<input type='submit' value='Borrar pedido '.$contador.' name='Borrar' class='centroBoton'></td>";
              echo '<td><input type='."hidden".' name='."indice".' value='.$contador.'></td>';
          echo '</td>';
      echo '</tr>';
      echo '</table>';
      echo "</form>";

      $contador++;
    }
    $_SESSION['arrayPedidos'] = $arrayPedidos;

}

//para imprimirlos cuando demos a aceptar
function recorrerPedidosClienteFINAL($arrayPedidos){
    $contador=0;
    foreach ($arrayPedidos as $key => $value) {
      $contador++;
      echo '<h1>PIZZAS PEDIDAS ' .$contador.'</h1>';
      echo '<table class="tablaFINAL">';
        foreach ($value as $key1 => $value1) {
          echo $key1.$value1;
        }
      echo '</table>';
    }
}

//calculamos el total de los pedidos en el array
function calcularTotalPedidosClientes($arrayPedidos){
    $totalFacturaPizza = 0.0;
    foreach ($arrayPedidos as $key1 => $variable) {
        foreach ($variable as $key => $value) {
            if($key == '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>El precio de este pedido es </td><td class='."pedidoTD".'>'){
                $posicionCadena = ' euros</td></tr>';
                $indice = strpos($value,$posicionCadena);
                $nuevaCadena = substr($value,0,$indice);//esto lo hacemos para catpturar el importe
            }
        }
        $totalFacturaPizza += $nuevaCadena;
    }
    return $totalFacturaPizza;
}

//por si hay equivocacion
function generarErrorVuelta(){
  $mensaje= "<form id=".'formularioRegreso'." action=".'PizzaNet.php'."><table>
  <tr><td><input type=".'submit'." value=".'Inicio'. " name=".'Enviar'." class=".'centroBoton'.">
  </td></tr></table></form>";
  echo $mensaje;
}
//generar otra vez el formulario para pedidos
function generarFormularioPedido(){
  echo '<h1>RELIZAR PEDIDO</h1>';
  echo '<form name='."formularioPedido".' action='."procesamientoPedido.php".' method='."POST".' >';
    echo '<table>';
        echo '<tr>';
            echo '<td class="precioTitulo">Pizzas a elegir: </td>';
            echo '<td class="precioTd">';
                echo 'Margarita<input type="radio" value="margarita" name="tipoPizza">&nbsp;&nbsp';
                echo 'Barbacoa<input type="radio" value="barbacoa" name="tipoPizza">&nbsp;&nbsp';
                echo '4 estaciones<input type="radio" value="4estaciones" name="tipoPizza">&nbsp;&nbsp';
                echo '4 quesos<input type="radio" value="4quesos" name="tipoPizza">&nbsp;&nbsp';
                echo 'Carbonara<input type="radio" value="carbonara" name="tipoPizza">&nbsp;&nbsp';
                echo 'Romana<input type="radio" value="romana" name="tipoPizza">&nbsp;&nbsp';
                echo 'Mediterránea<input type="radio" value="mediterranea" name="tipoPizza">&nbsp;&nbsp';
            echo '</td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td class="precioTitulo">Pizzas tamaños elegir: </td>';
            echo '<td class="precioTd">';
                echo 'Normal<input type="radio" value="normal" name="tamanoPizza">&nbsp;&nbsp';
                echo 'Grande<input type="radio" value="grande" name="tamanoPizza">&nbsp;&nbsp';
                echo 'Familiar<input type="radio" value="familiar" name="tamanoPizza">&nbsp;&nbsp';
            echo '</td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td class="precioTitulo">Pizzas masa elegir: </td>';
            echo '<td class="precioTd">';
                echo 'Fina<input type="radio" value="fina" name="masaPizza">&nbsp;&nbsp';
                echo 'Normal<input type="radio" value="normal" name="masaPizza">&nbsp;&nbsp';
            echo '</td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td class="precioTitulo">Extras pizza elegir: </td>';
            echo '<td class="precioTd">';
                echo 'Queso<input type="checkbox" value="queso" name="extrasPizza[]">&nbsp;&nbsp';
                echo 'Pimiento<input type="checkbox" value="pimiento" name="extrasPizza[]">&nbsp;&nbsp';
                echo 'Cebolla<input type="checkbox" value="cebolla" name="extrasPizza[]">&nbsp;&nbsp';
                echo 'Jamón<input type="checkbox" value="jamon" name="extrasPizza[]">&nbsp;&nbsp';
                echo 'Pollo<input type="checkbox" value="pollo" name="extrasPizza[]">&nbsp;&nbsp';
            echo '</td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td class="precioTitulo">Número pizzas: </td>';
            echo '<td class="precioTd">';
                echo '<input type="number" value="fina" name="numeroPizzas">&nbsp;&nbsp';
            echo '</td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td class="centroBoton">';
                echo '<input type="submit" value="Agregar pedido" name="Enviar" class='."centroBoton".'></td>';
                //Para volver a poner el cliente
                echo '<td><input type='."hidden".' name='."nombre".' value='.$_SESSION['nombre'].'></td>';
                echo '<td><input type='."hidden".' name='."direccion".' value='.$_SESSION['direccion'].'></td>';
                echo '<td><input type='."hidden".' name='."telefono".' value='.$_SESSION['telefono'].'></td>';
                echo '<td><input type='."hidden".' name='."email".' value='.$_SESSION['email'].'></td>';

            echo '</td>';
        echo '</tr>';
    echo '</table>';
    echo '</form>';

}


//añadimos un pedido al array
function anadirPedidoArray($pedido,$arrayPedidos){
  array_push($arrayPedidos, $pedido);
  return $arrayPedidos;
}

//funcion para borrar pedido por posicion
function borrarPedidoArrayPosicion($posicionBorrar,$arrayPedidos){
    $pos = intval($posicionBorrar);
    for ($i=0; $i < count($arrayPedidos); $i++) {
        if($pos == $i){
          unset($arrayPedidos[$pos]);
        }
    }
    if($pos == 0){
        unset($arrayPedidos[0]);
    }
    return $arrayPedidos;
}

//funcion para mostrar todos los datos del cliente, la factura y el total de los pedidos
function mostrarDatosFacturaCliente($precioTotal,$cliente,$arrayPedidos){
  echo '<div id="parteIzquierdaTercera">';
  echo '<h1>DATOS CLIENTE Y TOTAL FACTURA</h1>';
      $precioTotal = 0.0;
      //imprimimos cliente
      recorrerCliente($cliente);
      $precioTotal  = calcularTotalPedidosClientes($arrayPedidos);
      //Enviamos la factura total por sesion
      $_SESSION['facturaTotal'] = $precioTotal;

      echo '<table>';
      echo '<tr><td class="precioTituloTotal">TOTAL FACTURA</td><td class="precioTdTotal">
      '.$precioTotal.'
      </td></tr>';
      echo '</table>';
      echo '<form name='."formularioCancelar".' action='."CancelarConfirmar.php".' method='."POST".' >';
          echo '<table>';
          echo '<td><input type='."submit".' value='."Cancelar pedido".' name='."Cancelar".' class='."centroBoton".'></td>';
          echo '<td><input type='."submit".' value='."Confirmar pedidos".' name='."Confirmar".' class='."centroBoton".'></td>';
      echo '</table>';
      echo '</form>';
  echo '</div>';
}
//para empezar sesion
function iniciarSesion(){
  session_start();
}
//para acabar sesion
function acabarSesion(){
  session_destroy();
}
//funcion para el telefono
function comprobarTelefono($telefono){
  if(!preg_match("/^[0-9]{9}$/", $telefono)){
    return false;
  }
  return true;
}
//funcion para comprobar el email
function validarEmail($email){
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
   return false;
 }
 return true;
}
//otra forma de hacerlo
/*
function validarEmail($email){
  $booleano = false;
  // Recorremos cada carácter de la cadena
  for($i=0;$i<strlen($email);$i++){
      if($email[$i]=='@' && $i == 0){
          $booleano = true;
      }
  }

  if(strlen($email) < 5){
      $booleano = true;
  }
  if((substr($email,strlen($email)-4,strlen($email)-1) == '.com') || (substr($email,strlen($email)-3,strlen($email)-1) == '.es')){
      $booleano = true;
  }
  return $booleano;
}

function comprobarTelefono($telefono){
  $booleano = false;
  // Recorremos cada carácter de la cadena
  for($i=0;$i<strlen($telefono);$i++){
      $telefonoNumero = intval($telefono[$i]);
      if(($telefonoNumero != 9 && $i == 0)|| ($telefonoNumero != 6 && $i == 0)){
          $booleano = true;
      }
      if($telefonoNumero != 0 || $telefonoNumero != 1 || $telefonoNumero != 2 || $telefonoNumero != 3 ||
       $telefonoNumero != 4 || $telefonoNumero != 5 || $telefonoNumero != 6 || $telefonoNumero != 7 ||
       $telefonoNumero != 8 || $telefonoNumero != 9){
          $booleano = true;
      }
  }
  return $booleano;
}
*/
function compararArrays($tipoPizza,$tamanoPizza,$masaPizza,$extrasPizza,$numeroPizzas,$arrayPedidos){
  $resultadoBooleano = false;
  //calculamos el precio de este pedido
  $precioPedido = calcularPrecioPedido($tipoPizza,$tamanoPizza,$masaPizza,$extrasPizza,$numeroPizzas);
  //creamos el pedido
  $pedido = crearPedido($tipoPizza,$tamanoPizza,$masaPizza,$extrasPizza,$numeroPizzas,$precioPedido);
  //recor
  foreach ($arrayPedidos as $key => $value) {
      if($pedido==$value){//value es uno de los pedidos array
          $resultadoBooleano= true;
      }
  }
  return $resultadoBooleano;
}

 ?>
