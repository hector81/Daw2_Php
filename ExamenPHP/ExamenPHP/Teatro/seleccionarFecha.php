<!DOCTYPE html>
<?php
include './Conexion/conexion.php';
session_start();
$_SESSION['id'] = $_POST['idTituloEspectaculo'];

//Función para mostrar el título de la funcion
function mostrarTitulo($con, $id) {
    $sql = "select * from Espectaculo where id = " . $id;
    $stm = sqlsrv_query($con, $sql);
    while ($row = sqlsrv_fetch_array($stm)) {
        echo '<h2>' . $row['nombre'] . '</h2>';
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Teatro</title>
    </head>
    <body>
        <?php
        mostrarTitulo($con, $_SESSION['id']); //Llamada a la función anterior
        /*
         * Formulario en el que hago la consulta para saber las fechas de la función.
         * 
         */
        echo '<form method="post" action="finalizarCompra.php">';
        echo '<p>Fecha: ';
        $sql = "select * from Funcion where idEspectaculo = " . $_SESSION['id'];
        $stm = sqlsrv_query($con, $sql);
        echo '<select name="fechaFuncion">';
        while ($row = sqlsrv_fetch_array($stm)) {
            echo '<option>' . $row['fFuncion']->format('Y-m-d') . '</option>';
        }
        echo '</select></p>';
        echo '<p>Num. Butacas: <input type="number" name="numeroButacas" min="1"></p>';
        echo '<p>Telefono: <input type="number" name="telefono"></p>';
        echo '<p><input type="submit" value="Finalizar compra"></p>';
        echo '</form>';
        ?>
    </body>
</html>
