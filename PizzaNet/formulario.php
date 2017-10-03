<?php
include 'Cliente.php';
include 'Pizza.php';
$id = 0;
session_start();
$cliente = unserialize($_SESSION['cliente1']);
?>
<!DOCTYPE html>
<html>
    <head> 
        <title>Formulario</title>
        <style>
            td{
                text-align: center;
            }
            #i{
                width: 50%;
                float:left;
                background-color: aqua;
            }
            #d{
                width: 100%;  
                background-color: darksalmon;
            }
        </style>
    </head>
    <bodY>
        <h2>PizzaNet</h2>
        <hr>
            <center>
        <div id='i'>
            <form name="form" action="#" method="POST">
                <table border="1">
                    <tr>
                        <td>Pizza: </td>
                        <td>
                            <input type="radio"  name="tipo" value="margarita" checked="checked">margarita
                            <input type="radio"  name="tipo" value="barbacoa">barbacoa
                            <input type="radio"  name="tipo" value="4estaciones">4 estaciones
                            <input type="radio"  name="tipo" value="4quesos">4 quesos
                            <input type="radio"  name="tipo" value="carbonara">carbonara
                            <input type="radio"  name="tipo" value="romana">romana
                            <input type="radio"  name="tipo" value="meiditerranea">meiditerranea
                        </td>
                    </tr>
                    <tr>
                        <td>Tamaño: </td>
                        <td>
                            <input type="radio" name="tamano" value="normal" checked="checked" >normal
                            <input type="radio" name="tamano" value="grande">grande
                            <input type="radio"  name="tamano" value="familiar">familiar
                        </td>
                    </tr>
                    <tr>
                        <td>Masa: </td>
                        <td>
                            <input type="radio" name="masa" value="normal" checked="checked" >normal
                            <input type="radio"  name="masa" value="fina">fina
                        </td>
                    </tr>
                    <tr>
                        <td>Extras: </td>
                        <td>
                            <input type="checkbox" name="extra[]" value="queso" checked="checked" >queso
                            <input type="checkbox" name="extra[]" value="pimiento">pimiento
                            <input type="checkbox" name="extra[]" value="cebolla">cebolla
                            <input type="checkbox" name="extra[]" value="jamon">jamon
                            <input type="checkbox" name="extra[]" value="pollo">pollo
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="agregar1" value="Agregar Pizza" >
                        </td>
                    </tr> 
                </table>
            </form>
        </div>
        <div id='d'>
            <table>
                <tr>
                    <td colspan="2"><h3>Datos del cliente:</h3></td>
                </tr>
                <tr>
                    <td>Nombre:</td>
                    <td>           
                        <?php
                        echo $cliente->getNombre();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Direccion:</td>
                    <td>           
                        <?php
                        echo $cliente->getDireccion();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Direccion:</td>
                    <td>           
                        <?php
                        echo $cliente->getTelefono();
                        ?>
                    </td>
                </tr>
                <?php
                if (isset($_POST['a'])) {
                    $cliente->getPedido()->removeItem(count($cliente->getPedido()->getPizzas()) - 1);
                    $_SESSION['cliente1'] = serialize($cliente);
                }
                if (isset($_POST['agregar1'])) {
                    $pizza = new Pizza($id, $_POST['tipo'], $_POST['tamano'], $_POST['masa'], $_POST['extra']);
                    $cliente->getPedido()->addItem($pizza);
                    $pizasadd = $cliente->getPedido()->getPizzas();

                    for ($index = 0; $index < count($pizasadd); $index++) {
                        echo "<tr> <td><b>Pizza " . ($index + 1) . ": </b></td><td><form action='##' method='post'><input type='submit' value='X' name='a'><form></td></tr>";
                        echo "<tr> <td>Tipo: </td><td>" . $pizasadd[$index]->getTipo() . "</td></tr>";
                        echo "<tr> <td>Tamaño: </td><td>" . $pizasadd[$index]->getTamaño() . "</td></tr>";
                        echo "<tr> <td>Masa: </td><td>" . $pizasadd[$index]->getMasa() . "</td></tr>";
                        echo "<tr> <td>Extra: </td><td>";
                        $extras = $pizasadd[$index]->getExtra();
                        for ($index1 = 0; $index1 < count($extras); $index1++) {
                            echo $extras[$index1] . " ";
                        }
                        echo"</td></tr>";
                        echo "<tr> <td>Precio: </td><td>" . $pizasadd[$index]->calculaPrecio() . " €</td><td>";
                    }
                    echo "<tr><td colspan='2'>Precio Total: " . $cliente->getPedido()->calcula_total() . " €</td></tr>";
                    $_SESSION['cliente1'] = serialize($cliente);
                } else {
                    $pizasadd = $cliente->getPedido()->getPizzas();
                    for ($index = 0; $index < count($pizasadd); $index++) {
                        echo "<tr> <td><b>Pizza " . ($index + 1) . ": </b></td><td><form action='' method='post'><input type='hidden' value='" . $index . "' name='indice'><input type='submit' value='X' name='a'><form></td></tr>";
                        echo "<tr> <td>Tipo: </td><td>" . $pizasadd[$index]->getTipo() . "</td></tr>";
                        echo "<tr> <td>Tamaño: </td><td>" . $pizasadd[$index]->getTamaño() . "</td></tr>";
                        echo "<tr> <td>Masa: </td><td>" . $pizasadd[$index]->getMasa() . "</td></tr>";
                        echo "<tr> <td>Extra: </td><td>";
                        $extras = $pizasadd[$index]->getExtra();
                        for ($index1 = 0; $index1 < count($extras); $index1++) {
                            echo $extras[$index1] . " ";
                        }
                        echo"</td></tr>";
                        echo "<tr> <td>Precio: </td><td>" . $pizasadd[$index]->calculaPrecio() . " €</td><td>";
                    }
                    echo "<tr><td colspan='2'>Precio Total: " . $cliente->getPedido()->calcula_total() . " €</td></tr>";
                }
                ?>         
            </table>
        </div>
    </center>
</body>
</html>

