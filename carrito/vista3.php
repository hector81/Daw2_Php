<?php
include 'Articulo.php';
include 'Carrito.php';
$pedido = new Carrito();
session_start();
if (isset($_SESSION['carrito'])) {
    $pedido = unserialize($_SESSION['carrito']);
}
//select *
//from Production.Product as a join Production.ProductProductPhoto as b on a.ProductID=b.ProductID join Production.ProductPhoto as c on b.ProductPhotoID=c.ProductPhotoID;
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
            <h1>Selecciona un Producto</h1>
            <?php
            $usr = "C6PC10\SQLEXPRESS";
            $db = array("Database" => "AdventureWorks2012",
                "returnDatesAsStrings" => true, "CharacterSet" => "UTF-8");

            $conn2 = sqlsrv_connect($usr, $db);
            if ($conn2 === false) {
                die(print_r(sqlsrv_errors(), true));
                echo "La consexion no ha se podido realizar <br>";
            }
            $sql2 = "select * from AdventureWorks2012.Production.Product where ProductSubcategoryID='" . $_SESSION['categoria'] . "';";
            $stmt2 = sqlsrv_query($conn2, $sql2);
            echo "<form action='vista3.php' method='POST'>";
            echo "<select name='producto'>";
            while ($row = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_NUMERIC)) {
                echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
            }
            echo "</select>"
            . "<input type='submit' name='enviar1' value='enviar'>"
            . "</form>";

            sqlsrv_free_stmt($stmt2);
            ?>
        </div>
        <div id="der">
            <h1>Tu carrito</h1>
            <?php
            if (isset($_POST['enviar1'])) {
                $sql = "select Name, StandardCost, ThumbNailPhoto  
                          from Production.Product as a
                               join Production.ProductProductPhoto as b on a.ProductID=b.ProductID
                               join Production.ProductPhoto as c on b.ProductPhotoID=c.ProductPhotoID
                        where a.ProductID='" . $_POST['producto'] . "';";
                $stmt3 = sqlsrv_query($conn2, $sql);
                if ($stmt3 === false) {
                    die(print_r(sqlsrv_errors(), true));
                }
                $row = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_NUMERIC);
                $articulo = new Articulo($_POST['producto'], $row[0], $row[1], $row[2]);
                $pedido->addItem($articulo);
                $datos = $pedido->getPedidos();
                $_SESSION['carrito'] = serialize($pedido);
                header("Location:vista.php");
            }

            if (isset($_SESSION['carrito'])) {
                $total = 0;
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