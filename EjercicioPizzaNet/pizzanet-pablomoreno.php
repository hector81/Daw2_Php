<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formulario web</title>
</head>
<body>
    <?php 
        $pizzas = ["Margarita", "Cuatro estaciones", "Barbacoa", "Cuatro quesos", "Carbonara", "Romana", "Mediterránea"];
        $sizes = ["Normal" => 3.90, "Grande" => 5.10, "Familiar" => 7.60];
        $extras = ["Queso" => 0.50, "Pimiento" => 0.60, "Cebolla" => 0.70, "Jamón" => 1.00, "Pollo" => 0.90];
        if (isset($_POST["confirmacion"]))
        {
            confirm();
        }
        elseif (isset($_POST["cancelacion"]))
        {
            cancel();
        }
        elseif (isset($_POST["feedback"]))
        {
            feedback();
        }
        else {
            if (!comprobarPedido())
            {
    ?>
    <form name="input" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="nombre">Nombre</label>
        <input id="nombre" name="nombre" value="<?php echo (isset($_POST['nombre']) && !empty($_POST['nombre']) ? $_POST['nombre'] : "") ?>">
        <?php echo (isset($_POST['nombre']) && empty($_POST['nombre']) ? "Campo obligatorio": "") ?>
        <br>
        <label for="direccion">Dirección</label>
        <input id="direccion" name="direccion" value="<?php echo (isset($_POST['direccion']) && empty($_POST['direccion']) ? $_POST['direccion'] : "") ?>">
        <?php echo (isset($_POST['direccion']) && empty($_POST['direccion']) ? "Campo obligatorio": "") ?>
        <br>
        <label for="telefono">Teléfono</label>
        <input id="telefono" type="tel" name="telefono" value="<?php echo (isset($_POST['telefono']) && empty($_POST['telefono']) ? $_POST['telefono']: "") ?>">
        <?php echo (isset($_POST['telefono']) && empty($_POST['telefono']) ? "Campo obligatorio": "") ?>
        <br>
        <label for="email">E-Mail</label>
        <input id="email" type="email" name="email" value="<?php echo (isset($_POST['email']) && empty($_POST['email']) ? $_POST['email']: "") ?>">
        <?php echo (isset($_POST['email']) && empty($_POST['email']) ? "Campo obligatorio": "") ?>
        <br>
        <br>
        <br>
        <table>
            <tr>
                <td></td>
                <?php 
                    foreach ($pizzas as $pizza)
                    {
                        echo "<td>".$pizza."</td>\n";
                    }
                ?>
            </tr>
            <tr>
                <td>Cantidad</td>
                <?php 
                    foreach ($pizzas as $pizza)
                    {
                        echo "<td><input name='cantidad[".$pizza."]' min='0' type='number'>"."</td>\n";
                    }
                ?>
            </tr>
            <tr>
                <td>Tipo de masa</td>
                <?php 
                    foreach ($pizzas as $pizza)
                    {
                        ?>
                        <td>
                            <select name="masa[<?= $pizza ?>]">
                                <option value="fina">Fina</option>
                                <option value="normal">Normal</option>
                            </select>
                        </td>
                        <?php
                    }
                ?>
            </tr>
            <tr>
                <td>Tamaño</td>
                <?php 
                    foreach ($pizzas as $pizza)
                    {
                        echo "<td>";
                        echo "<select name='size[$pizza]'>";
                        foreach ($sizes as $size => $precio)
                        {
                            echo "<option value='".$size."'>".$size." - ".number_format($precio, 2)." €</option>";
                        }
                        echo "</select>";
                        echo "</td>\n";
                    }
                ?>
            </tr>
            <tr>
                <td>Extras</td>
                <?php 
                    foreach ($pizzas as $pizza)
                    {
                        echo "<td>";
                        foreach ($extras as $extra => $precio)
                        {
                            $a = $pizza . $extra;
                            echo "<input id='".$a."' type='checkbox' name='extras[".$pizza."][]' value='".$extra."'>\n";
                            echo "<label for='".$a."'>".$extra." - ".number_format($precio, 2) ." €</label><br>\n";
                        }
                    }
                ?>
            </tr>
        </table>
        <br>
        <input type="submit" value="Enviar">
    </form>
    <?php
            } else {
                mostrarResumenPedido($extras, $sizes);
            }
        }
    ?>
    <?php
        function comprobarPedido()
        {
            $cantidades = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
            if ($cantidades == 0)
                return false;
            else {
                $total = 0;
                foreach ($cantidades as $k => $v)
                {
                    $total += $v;
                }
                return $total > 0;
            }
        }
        
        function mostrarResumenPedido($extras, $sizes)
        {
            $direccion = $_POST["direccion"];
            $cantidades = $_POST['cantidad'];
            $preciototal = 0;
            foreach ($cantidades as $k => $v)
            {
                if ($v > 0)
                {
                    echo "<h3>". $k ."</h3>";
                    $masa = $_POST['masa'][$k];
                    $size = $_POST['size'][$k];
                    $listaextras = isset($_POST['extras'][$k]) ? $_POST['extras'][$k] : [];
                    echo "Tipo de masa: " . $masa ." - ".number_format($sizes[$size], 2)."€<br>";
                    echo "Tamaño: " . $size . "<br>";
                    echo "Extras: <br>";
                    $totalextras = 0;
                    echo "<ul>";
                    foreach ($listaextras as $ek => $ev)
                    {
                        echo "<li>" . $ev . "</li>";
                        $totalextras += $extras[$ev];
                    }
                    echo "</ul>";
                    echo "Subtotal extras: " . number_format($totalextras, 2) . "€ <br>";
                    echo "Cantidad: " . $v . "<br>";
                    $totalpizza = ($sizes[$size]) * $v + $totalextras;
                    echo "Total " . $k . ": " . number_format($totalpizza, 2) . " €<br><br><hr>";
                    $preciototal += $totalpizza;
                }
            }
            echo "<h4>Precio total: ".number_format($preciototal, 2)."€ </h4>";
            ?>
            <form method="post">
                <input hidden="hidden" name="confirmacion" value="<?= $direccion ?>">
                <input type="submit" name="confirmado" value="Confirmar">
            </form>
            <form method="post">
                <input hidden="hidden" name="cancelacion" value="cancelado">
                <input type="submit" value="Cancelar">
            </form>
            <?php
        }
        
        function confirm()
        {
            echo "Gracias por su pedido, llegará a la dirección " . $_POST['confirmacion'] . " en unos 30 minutos.";
        }
        
        function cancel()
        {
            echo "Sentimos que hayas cancelado el pedido :(<br>Por favor, indiíquenos los motivos de su cancelación";
            ?>
            <form method="post">
                <textarea name="feedback"></textarea><br>
                <input type="submit" value="Enviar">
            </form>
            <?php
        }
        
        function feedback()
        {
            echo "Gracias por ayudarnos a mejorar.";
        }
    ?>
</body>
</html>