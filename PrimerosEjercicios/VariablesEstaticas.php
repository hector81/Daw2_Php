<html>
	<head>
		<title>Primer ejemplo</title>
	</head>
	<body>
		<h1>
		Variables Estaticas
		</h1>
		<?php	
			static $prueba = 0;//hay que inicarlas siempre . si le ponemos static esta igual que antes , es global al todo codigo
			// excepto las funciones //si es static se mantiene los valores que tenia
			function test()
			{
				static $count = 0;

				$count++;
				echo $count."\n<br>";
				if ($count < 10) {
					test();
				}
				$count--;
				
				$prueba++;//no sumara dara error
			}
			
			$prueba = 20;
			
			echo test()."\n<br>";
			echo "\n<br>";
			echo $prueba."\n<br>";
		?>
	</body>
</html>