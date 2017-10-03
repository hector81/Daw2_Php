<?php
session_start();
?>
<html>
    <head></head>
    <body>
        <style>
            #izq{
                float: left;
                width: 45%;
                height: 80%;
                border: 1px solid blue;
            }
            #der{
                float: left;
                margin-left: 5%;
                width: 45%;
                height: 80%;
                border: 1px solid blue;
            }
        </style>
        <div id="izq">
            <h1>Selecciona una subcategoria</h1>
            <?php
            $categoria = $_POST['categoria'];
            $usr = "C6PC10\SQLEXPRESS";
            $db = array("Database" => "AdventureWorks2012",
                "returnDatesAsStrings" => true, "CharacterSet" => "UTF-8");

            $conn2 = sqlsrv_connect($usr, $db);
            if ($conn2 === false) {
                die(print_r(sqlsrv_errors(), true));
                echo "La consexion no ha se podido realizar <br>";
            }
            $sql2 = "select * from AdventureWorks2012.Production.ProductSubcategory where ProductCategoryID='" . $categoria . "';";
            $stmt2 = sqlsrv_query($conn2, $sql2);
            echo "<form action='#' method='POST'>";
            echo "<select name='categoria'>";
            while ($row = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_NUMERIC)) {
                echo "<option value='" . $row[0] . "'>" . $row[2] . "</option>";
            }
            ?>
        </select>
        <input type='submit' name='enviar1' value='enviar'>
        </form>;  
        <?php
        if (isset($_POST['enviar1'])) {
            $_SESSION['categoria'] = $_POST['categoria'];
            header("Location:vista3.php");
        }
        sqlsrv_free_stmt($stmt2);
        sqlsrv_close($conn2);
        ?>
    </div>
    <div id="der">
        <h1>Tu carrito</h1>
        <?php
        if (isset($_SESSION['carrito'])) {
            $total = 0;
            include 'Articulo.php';
            include 'Carrito.php';
            $pedido = unserialize($_SESSION['carrito']);
            $datos = $pedido->getPedidos();
            echo "<table border='1'>";
            echo "<tr><th>Nombre</th><th>Imagen</th><th>Precio</th></tr>";
            for ($index = 0; $index < count($datos); $index++) {
                echo "<tr><td>" . $datos[$index]->getNombre() . "</td> <td> <img src='data:image/gif;base64," . base64_encode($datos[$index]->getImg()) . "'> </td> <td>" . $datos[$index]->getPrecio() . " €</td></tr>";
                $total+=$datos[$index]->getPrecio();
            }
            echo "<tr><td>Suma total a pagar: </td><td colspan='2'>" . $total . " €</td></tr>";
            echo "</table>";
        }
        ?>
    </div>

</body>
</html>