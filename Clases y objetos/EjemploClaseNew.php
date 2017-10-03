<html>
	<head>
		<title>Clases</title>
	</head>
	<body>
		<?php
				include 'ClaseSencilla.php'; //coomo import en java
				
				$instancia = new ClaseSencilla();

				$asignada =  $instancia;
				$referencia =& $instancia;//esto es la referncia de la referencia

				$instancia->var = '$asignada tendrá este valor';

				$instancia = null; // $instancia y $referencia son null

				var_dump($instancia);//este hace referencia clase sencilla  //null
				var_dump($referencia);///null  //este hace referencia a instancia
				var_dump($asignada); //este hace referencia a instancia  //da bien

		?>
	</body>
</html>