<?php
include 'conexion.php';

try {  
	  $conexionBD->beginTransaction();
	  $conexionBD->exec("UPDATE almacen SET stock=stock - 1 WHERE idArticulo = 1");
	  $conexionBD->exec("INSERT almacen(idArticulo,idTienda,stock) VALUES(1,2,1)");
	  $conexionBD->commit();
	  echo 'Transacción realizada';
  
} catch (Exception $e) {
	$conexionBD->rollBack();
	echo "Fallo: " . $e->getMessage();
}
?>