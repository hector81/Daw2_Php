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
            <h1>Selecciona una Categoria</h1>
            <?php
            $usr = "C6PC10\SQLEXPRESS";
            $db = array("Database" => "AdventureWorks2012",
                "returnDatesAsStrings" => true, "CharacterSet" => "UTF-8");

            $conn = sqlsrv_connect($usr, $db);
            if ($conn === false) {
                die(print_r(sqlsrv_errors(), true));
                echo "La consexion no ha se podido realizar <br>";
            }
            $sql = "select * from AdventureWorks2012.Production.ProductCategory order by ProductCategoryID;";
            $stmt = sqlsrv_query($conn, $sql);
            echo "<form action='vista2.php' method='POST'>";
            echo "<select name='categoria'>";
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)) {
                echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
            }
            echo "</select>"
            . "<input type='submit' name'enviar1' value='enviar'>"
            . "</form>";
            sqlsrv_free_stmt($stmt);
            sqlsrv_close($conn);
            ?>
        </div>
        <div id="der">
            <h1>Tu carrito</h1>
            <?php
            session_start();
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
