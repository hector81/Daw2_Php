<?php
	///abrir y reactivar la sesion
	session_start();	
		

?>
		
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
		<title>Sesion pag  1 sesion global</title>
	</head>
	<body>
		<div>
		<?php
			//llama al nombre de sesion global
			echo '$_SESSION["nombre"]=' ,
			isset($_SESSION['nombre'])?$_SESSION['nombre']:'','<br>';
			//llama al apellido de sesion global
			echo '$_SESSION["informacion"]["apellido"]=',
			isset($_SESSION['informacion']['apellido'])?$_SESSION['informacion']['apellido']:'','<br>';
		?>
		</div>
	</body>
	
</html>