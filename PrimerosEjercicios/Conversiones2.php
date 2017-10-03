<html>
	<head>
		<title>echo implicito</title>
	</head>
	<body>
		<p>
		
		</p>
		<?php
			$var1 = "20" + 15;//se convierte a tipo integer .valor =35
			$var2 = 20 . " años";//se convierte a tipo string .valor =20 años
			$var3 = 20 + "años";//se convierte a tipo integer .valor =20
			$var4 = 40 + "2 razones";//se convierte a tipo integer .valor =42//coge el primer caracter de numero que encuentre ,despues del espacio ya no coge mas
			$var5 = 40 + "25 razones";//se convierte a tipo integer .valor =65
			$var6 = 40 + "7 5 razones";//se convierte a tipo integer .valor =47
			$var7 = true && "hola";// valor = 1
			$var8 = 40 + "25razones6";//se convierte a tipo integer .valor =65
			echo $var1;
			echo $var2;
			echo $var3;
			echo $var4;
			echo $var5;
			echo $var6;
			echo var_dump($var7);
			echo $var8;
		?>
	</body>
</html>