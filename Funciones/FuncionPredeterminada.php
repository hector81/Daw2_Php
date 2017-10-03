<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
			//predeterminado, no usar los valores en llamadas 	
			 
			function hacerCafé($var = ["capuccino"], $fabricanteCafe = NULL){
				$aparato = is_null($fabricanteCafe)?" las manos":$fabricanteCafe;
				return "Hacer una taza de " .join(" . ",$var)." con $aparato.\n";			
			}
			echo hacerCafé();
			echo hacerCafé(array["capuchino","lavazza"], "una tetera");
			
			
		?>
	</body>
</html>

