<!DOCTYPE html>
<html>
    <head> 
        <title>Cilindro</title>
        <style>
            td{
                text-align: center;
            }
        </style>
    </head>
    <bodY>
    <center>  <form name="input" action="#" method="POST">
            <table border="1">
                <tr>
                    <td <?php echo (empty($_POST['nombre'])) && isset($_POST['nombre']) ? "style='color:red'" :''?>>Nombre:</td>
                    <td><input type="text" name="nombre" value="<?php echo!empty($_POST['nombre']) && isset($_POST['nombre']) ? $_POST['nombre'] : '' ?>" ></td>
                </tr>
                <tr>
                    <td <?php echo (empty($_POST['direccion'])) && isset($_POST['direccion']) ? "style='color:red'" :''?>>Direccion: </td>
                    <td><input type="text" name="direccion" value="<?php echo!empty($_POST['direccion']) && isset($_POST['direccion']) ? $_POST['direccion'] : '' ?>" ></td>
                </tr>
                <tr>
                    <td>Telefono: </td>
                    <td><input type="number" name="telefono" min="1" value="1" ></td>
                </tr>
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
                    <td>Unidadaes: </td>
                    <td>
                        <input type="number" name="unidades" value="1" ></br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="agregar" value="Pedir Pizza">
                    </td>
                </tr> 
            </table>
        </form>
        <?php
        if (isset($_POST['agregar'])) {
            $cesta= new Carrito();

            if (empty($_POST['nombre'])) {
                echo 'Falta el nombre <br>';
            } else{
                $nombre = $_POST['nombre'];
            }
            if(empty($_POST['direccion'])) {
                echo 'Falta la direccion <br>';
            } else{
                $direccion = $_POST['direccion'];
            }
            if (isset($_POST) && !empty($_POST['nombre']) && !empty($_POST['direccion'])) {
                $nombre = $_POST['nombre'];
                $direccion = $_POST['direccion'];
                $telefono = $_POST['telefono'];
                $tipo = $_POST['tipo'];
                $tamano = $_POST['tamano'];
                $masa = $_POST['masa'];
                $extra = $_POST['extra'];
                $unidades = $_POST['unidades'];


                $cuenta = array(
                    "Piza" => array(
                        "Tipo" => $tipo,
                        "Tamaño" => $tamano,
                        "Masa" => $masa,
                        "Unidades" => $unidades,
                        "Extras" => $extra)); //Puede que sea un array
                
                
                echo "<br><br>";
                echo "Cliente: $nombre, con telefono: $telefono, direccion: $direccion";
                echo "<table border='1'>";
                foreach ($cuenta as $key => $value) {
                    echo "<tr>";
                    echo "<td>";
                    echo "$key: ";
                    echo "</td>";
                    echo "<td>";
                    foreach ($value as $key2 => $value2) {
                        if (!is_array($value2)) {
                            echo $key2;
                            echo ": ";
                            echo $value2;
                            echo ", ";
                        } else {
                            echo $key2;
                            echo ": ";
                            foreach ($value2 as $value3) {
                                echo $value3;
                                echo ", ";
                            }
                        }
                    }
                    echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td colspan='2'>";
                    echo "Total a pagar : $euros €";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<center> <a href='confirmar.php'><button>confirmar</button></a> <a href='cancelar.php'><button>Cancelar</button></a> </center>"; 
            }
        }
        ?>
    </center>
</body>
</html>

