<?php
include '..\recursos\conexion.php';

try {  
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $con->beginTransaction();
  $con->exec("UPDATE almacen SET stock=stock - 1 WHERE idArticulo = 1");
  $con->exec("INSERT almacen(idArticulo,idTienda,stock) VALUES(1,2,1)");
  $con->commit();
  
} catch (Exception $e) {
  $con->rollBack();
  echo "Fallo: " . $e->getMessage();
}
?>