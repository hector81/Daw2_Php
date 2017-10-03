<?php
session_start();
include 'conexion.php';~
$prueba="";
$sql = "SELECT usuario.usuario, usuario.contrasenia FROM usuario;";
    foreach ($conexionBD->query($sql) as $row) {
		$prueba =$row['contrasenia'];
        echo $prueba;
    }


?>

			
	
</body>
</html>