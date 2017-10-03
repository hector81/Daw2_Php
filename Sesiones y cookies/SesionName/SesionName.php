<html>
	<head>
		<title>Clases</title>
	</head>
	<body>
		<?php
			///recuperar el valor de session_anme
			$idAnterior = session_name();
			//abrir / reactivar
			session_start();
			//recuperar el valor de session_name despues
			$idPosterior = session_name();
			//mostrar valores
			$hora = date("H:i:s");
			echo "Hora:  $hora<br>\n";
			echo "Antes:  $idAnterior<br>\n";//se modifica
			echo "Despues:  $idPosterior<br>\n";
		

		?>
	</body>
</html>