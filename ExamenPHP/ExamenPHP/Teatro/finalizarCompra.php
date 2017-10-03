<?php

include './Conexion/conexion.php';
include './Usuarios/Cliente.php';
session_start();

/*
 * Función para comprar el número de entradas que quedan para una actuación un dia determinado y 
 * compruebo que tambien el cliente no haya puesto de más de las que quedan, si todo esta bien
 * devuelve true
 */

function obtenerNumEntradas($con, $id, $numEntradasComprar) {
    $sql = "select * from Funcion where idEspectaculo = " . $id . " and fFuncion = '" . $_POST['fechaFuncion'] . "'";
    $stm = sqlsrv_query($con, $sql);
    if ($row = sqlsrv_fetch_array($stm)) {
        $numero = $row['quedan'];
    }

    if ($numEntradasComprar > $numero) {
        return false;
    } else {
        return true;
    }
}

/*
 * Función para insertar los datos en la tabla Ventas y para actualizar la tabla Funcion, reduciendo 
 * el número de entradas que quedan por las que ha comprado el cliente
 */

function actualizarTablaEInsertarDatos($con, $id, $numEntradasComprar, $telefono) {
    $sql = "select * from Funcion where idEspectaculo = " . $id . " and fFuncion = '" . $_POST['fechaFuncion'] . "'";
    $stm = sqlsrv_query($con, $sql);
    if ($row = sqlsrv_fetch_array($stm)) {
        $idSesion = $row['id'];
    }
    $sqlInsertar = "insert into Venta values (" . $idSesion . ", " . $telefono . ", " . $numEntradasComprar . ")";
    $sqlActualizar = "update Funcion set quedan = quedan - " . $numEntradasComprar . " where id = " . $idSesion;
    sqlsrv_query($con, $sqlInsertar);
    sqlsrv_query($con, $sqlActualizar);
}

/* -------------------------------------- */

//Compruebo que la primera función, para saber el número de entradas disponibles
if (obtenerNumEntradas($con, $_SESSION['id'], $_POST['numeroButacas']) == true) {
    //Creo un nuevo cliente con los datos obtenidos del formulario anterior
    $cliente = new Cliente($_POST['telefono'], $_POST['numeroButacas']);

    //Hago la llamada a la funcion de insertar y actualizar, le paso los datos con los getters
    //del cliente creado anteriormente.
    actualizarTablaEInsertarDatos($con, $_SESSION['id'], $cliente->getNumEntradas(), $cliente->getTelefono());
    echo 'Compra realizada correctamente';
} else {
    echo 'No hay tantas entradas disponibles a la venta';
}