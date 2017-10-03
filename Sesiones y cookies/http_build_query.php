<?php
	///Inicializacion de la matrixz uque contiene los datos
	$datos= ['nombre' => 'unNombre & otroNombre', 'masNombre + otroNombreMas'];	//esto es un array con valor y indice
	//construccion de la cadena de la consulta:
	//sin prefijo
	echo http_build_query($datos). "<br>\n";//lo usara en la url
	//con prefijo
	echo http_build_query($datos,'v_'). "<br>\n";
?>
