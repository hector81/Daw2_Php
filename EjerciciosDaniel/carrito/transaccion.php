<?php

require_once 'conexion.php'; // Verificará si el archivo ya ha sido incluido y si es así, no se incluye (require) de nuevo.

try {
    $con->beginTransaction();
    $con->exec('UPDATE almacen SET stock = 1 WHERE idArticulo = 1');
    $con->exec('INSERT INTO almacen VALUES (1, 2, 1)');
    $con->commit();
} catch (Exception $e) {
    $con->rollBack();
    echo "Fallo: " . $e->getMessage();
}

