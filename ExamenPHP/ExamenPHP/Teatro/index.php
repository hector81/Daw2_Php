<!DOCTYPE html>
<?php
//Incluyo el fichero conexión
include './Conexion/conexion.php';

//Compruebo la fecha actual con la del evento, si es menor que la del dia de hoy 
//devuelvo false, en caso contrario devuelvo true
function comprobarFecha($fecha) {
    $fechaActual = new DateTime();
    if ($fechaActual < $fecha) {
        return true;
    } else {
        return false;
    }
}

//Compruebo el numero de entradas en total de cada espectáculo, mientras haya alguna 
//a alguna hora devolvera true 
function comprobarEntradas($con, $idEspectaculo) {
    $sql = "select sum(quedan) as total from Funcion where idEspectaculo = " . $idEspectaculo;
    $stm = sqlsrv_query($con, $sql);
    while ($row = sqlsrv_fetch_array($stm)) {
        if ($row['total'] == 0) {
            return false;
        } else {
            return true;
        }
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
        $sql = "select * from Teatro";
        $stm = sqlsrv_query($con, $sql);
        /*
         * En este bucle lo que hago es mostrar el titulo de cada teatro y de cada actuación.
         * A su vez hago las llamadas a los métodos anteriores para comprobar la fecha y el número
         * de butacas disponibles, si la fecha es anterior a la actual no muestro ni el titulo ni nada.
         * Si la fecha esta bien, muestro el título. Posteriormente compruebo el nº de butacas disponibles, 
         * si hay muestro un botón para poder comprar, en caso contrario muestro un texto de que no hay entradas.
         * 
         * El id del espectaculo lo paso por un hidden
         */
        while ($row = sqlsrv_fetch_array($stm)) {
            echo '<h2>' . $row['nombre'] . '</h2>';
            $sql2 = "select * from Espectaculo where idTeatro = " . $row['id'];
            $stm2 = sqlsrv_query($con, $sql2);

            while ($row2 = sqlsrv_fetch_array($stm2)) {
                if (comprobarFecha($row2['fInicio'])) {
                    echo '<p>' . $row2['nombre'] . '</p>';
                    if (comprobarEntradas($con, $row2['id']) == true) {
                        echo '<form method="post" action="seleccionarFecha.php">';
                        echo '<input type="hidden" name="idTituloEspectaculo" value="' . $row2['id'] . '">';
                        echo '<input type="submit" name="comprarEntrada" value="Comprar entrada">';
                        echo '</form>';
                    } else {
                        echo '<p><strong>No hay entradas</strong></p>';
                    }
                }
            }
        }
        ?>
    </body>
</html>
