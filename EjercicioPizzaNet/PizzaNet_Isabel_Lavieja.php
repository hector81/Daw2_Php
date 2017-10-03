<?php
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : null;
$pizza = (isset($_POST['pizza'])) ? $_POST['pizza'] : null;
$enviado = (isset($_POST['aceptar'])) ? true : false;
$masa = (isset($_POST['masa'])) ? $_POST['masa'] : null;
$cantidadPizza = (isset($_POST['cantidadPizza'])) ? $_POST['cantidadPizza'] : null;
$tamano = (isset($_POST['tamano'])) ? $_POST['tamano'] : null;
$extra = (isset($_POST['extras'])) ? $_POST['usuario'] : null;


if (empty($usuario['nombre']) || empty($usuario['dir']) || empty($usuario['tel']) || $cantidadPizza == null) {
    $correctoDatos = false;
} else {
    $correctoDatos = true;
}

if ($enviado) {
    if ($tamano == 'pequeña') {
        $precioTamano = 5;
    } else if ($tamano == 'mediana') {
        $precioTamano = 7;
    } else if ($tamano == 'grande') {
        $precioTamano = 10;
    }
}

if ($enviado) {
    if ($extra == 'jamon' || $extra == 'pollo') {
        $precioExtra = 1;
    } else{
        $precioExtra = 0.75;
       }
}

if ($enviado) {
    if ($masa == 'fina') {
        $precioMasa = 0.5;
    } else if ($masa == 'normal') {
        $precioMasa = 2;
    }
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>PizzaNet</title>

    </head>
    <body>

        <?php
        if ($correctoDatos && $enviado) {
            ?>

            <table border=1 >
                <th colspan="2">Información de contacto</th>
                <tr>
                    <td>Nombre: </td>
                    <td align="right"><?= $usuario['nombre'] ?></td>
                </tr>
                <tr>
                    <td>Apellidos:</td>
                    <td align="right"><?= $usuario['dir'] ?></td>
                </tr>
                <tr>
                    <td>Telefono:</td>
                    <td align="right"><?= $usuario['tel'] ?></td>
                </tr>
                <th colspan="2">Resumen pedido</th>
                <tr>
                    <td>Tipo pizza:</td>
                    <td><?php
                        echo "pizza " . $pizza
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Cantidad</td>
                    <td align="right"><?= $cantidadPizza ?></td>
                </tr>
                <tr>
                    <td>Tamaño :</td>
                    <td align="right"><?=  $tamano. " " . $precioTamano . "€" ?></td>
                </tr>
                <tr>
                    <td >Tipo masa:</td>
                    <td align="right"><?= $masa . " " . $precioMasa . "€" ?></td>
                </tr>
                <tr>
                    <td>Extras:</td>
                    <td  align="right"><?php
                        foreach ($_POST["extras"] as $value) {
                            echo " " . $value . " ". $precioExtra;
                        }
                        ?></td>
                </tr>
                <tr>
                    <th align="left">Total:</th>
                    <td align="right"><?= ($precioMasa + $precioTamano + $precioExtra) * $cantidadPizza . "€" ?></td>
                </tr>
            </table>
            <?php
        } else {
            ?>

        <center> <h1>PizzaNet</h1></center>
        <form action = "Formulario.php" method = "post">
            <fieldset style="height: 80px; width:500px">
                <legend>Datos Personales</legend>
                <!--DATOS USUARIO-->

                *Nombre: <input type = "text" name = "usuario[nombre]" value = "<?= $usuario['nombre'] ?>">
                <?php
                if ($enviado && empty($usuario['nombre'])) {
                    echo "Es un campo obligatorio";
                }
                ?><br>
                *Direccion: <input type="text" name="usuario[dir]" value="<?= $usuario['dir'] ?>">
                <?php
                if ($enviado && empty($usuario['dir'])) {
                    echo "Es un campo obligatorio";
                }
                ?><br>
                *Telefono: <input type="text" name="usuario[tel]" value="<?= $usuario['tel'] ?>">
                <?php
                if ($enviado && empty($usuario['tel'])) {
                    echo "Es un campo obligatorio";
                }
                ?><br>
            </fieldset>
            <!--TIPO PIZZA-->
            <fieldset style="height: 500px; width:500px">
                <legend>Pedido</legend>

                <h2>Elige tu pizza:</h2>

                <select name="pizza" >
                    <option name="margarita" value="<?= $pizza['margarita'] ?>">Queso</option>
                    <option name="barbacoa" value="<?= $pizza['barbacoa'] ?>">Pimiento</option>
                    <option name="c4quesos"value="<?= $pizza['c4quesos'] ?>">Cebolla</option>
                    <option name="c4estaciones" value="<?= $pizza['c4estaciones'] ?>">Jamon</option>
                    <option name="carbonara" value="<?= $pizza['carbonara'] ?>">Pollo</option>
                    <option name="romana" value="<?= $pizza['romana'] ?>">Jamon</option>
                    <option name="mediterranea" value="<?= $pizza['mediterranea'] ?>">Pollo</option>
                </select>
                <input type="number" name="cantidadPizza" placeholder="Cantidad">

                <?php
                if ($enviado && !$cantidadPizza) {
                    echo "Tienes que pedir minimo una pizza";
                }
                ?>

                <!--TAMAÑO-->

                <h2>Elige tamaño:</h2>
                <input type="radio" name="tamano" value="pequeña">Pequeña (5€)
                <input type="radio" name="tamano" value="mediana">Mediana (7€)
                <input type="radio" name="tamano" value="grande">Grande   (10€)

                <!--TIPO MASA-->

                <h2>Tipo masa:</h2>
                <input type="radio" name="masa" id="masa" value="fina">Masa fina (+0.50€)
                <input type="radio" name="masa" id="masa" value="normal">Normal  (+1€)

                <!--EXTRAS-->

                <h2>Extras</h2>

                <select name="extras[]" size="5" multiple="true">
                    <option value="Queso" name="extras['queso']">Queso (+0.75€)</option>
                    <option value="Pimiento"name="extras['pimiento']">Pimiento (+0.75€)</option>
                    <option value="Cebolla"name="extras['cebolla']">Cebolla (+0.75€)</option>
                    <option value="Jamon"name="extras['jamon']">Jamon (+1€)</option>
                    <option value="Pollo"name="extras['pollo']">Pollo (+1€)</option>
                </select><br><br>

                <input type="submit" name="aceptar" value="Enviar pedido">
            </fieldset>

        </form>
        <?php
    }
    ?>
</body>
</html>
