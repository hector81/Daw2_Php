<?php

require_once 'conexion.php';

try {
    $sql = "SELECT foto FROM articulo WHERE id = ?";
    $cursor = $con->prepare($sql);
    $cursor->execute(array($_GET['idProducto']));
    $cursor->bindColumn(1, $img, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
    $cursor->fetch(PDO::FETCH_BOUND);
    echo $img;
} catch (Exception $exc) {
    die($exc->getMessage());
}

