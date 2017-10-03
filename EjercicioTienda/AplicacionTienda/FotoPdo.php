<?php
include 'conexion.php';

try {  
	  $conexionBD->beginTransaction();
	  $sql = "SELECT Foto
              FROM articulo
             WHERE nombre = ?";
	   $cursor = $conexionBD->prepare($sql);
	   $cursor->execute(array($_GET['nombre']));
	   $cursor->bindColumn(1, $imagen, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
	   $cursor->fetch(PDO::FETCH_BOUND);
	   echo $imagen;
	   $conexionBD->commit();
	   echo 'Transacción realizada';
  
} catch (Exception $e) {
	$conexionBD->rollBack();
	echo "Fallo: " . $e->getMessage();
}
?>

 