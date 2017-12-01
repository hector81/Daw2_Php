<?php

//por si hay equivocacion
function generarErrorVuelta(){
  $mensaje= "<form id=".'formularioRegreso'." action=".'FormularioPizzaNet.php'."><table>
  <tr><td><input type=".'submit'." value=".'Inicio'. " name=".'Enviar'." class=".'centroBoton'.">
  </td></tr></table></form>";
  echo $mensaje;
}

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
                echo '<input type="text" value="" name="numeroPizzas">&nbsp;&nbsp';
            echo '</td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td class="centroBoton">';
                echo '<input type="submit" value="Agregar pedido" name="Enviar" class='."centroBoton".'></td>';
            echo '</td>';
        echo '</tr>';
    echo '</table>';
    echo '</form>';

}




 ?>
