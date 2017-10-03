<html>
	<head>
		<title>Clases</title>
	</head>
	<body>
		<?php
			///recuperar el valor de session_id
			$idAnterior = session_id();
			//abrir / reactivar
			session_start();
			//recuperar el valor de session_id despues
			$idPosterior = session_id();
			//mostrar valores
			$hora = date("H:i:s");
			echo "Hora:  $hora<br>\n";
			echo "Antes:  $idAnterior<br>\n";//sale vacio porque eesta antes de session start
			echo "Despues:  $idPosterior<br>\n";
		

		?>
	</body>
</html>