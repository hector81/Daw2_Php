﻿<html>
	<head>
		<title>Clases</title>
	</head>
	<body>
		<?php
				class Foo
				{
					public static $mi_static = 'foo';
					public function valorStatic(){
						return self::$mi_static;
					}

					
				}	
				
				class Bar extends Foo
				{
				
					public function fooStatic(){
						return parent::$mi_static;
					}

					
				}
				
					print Foo::$mi_static . "\n";
					$foo = new Foo();
					print $foo->valorStatic(). "\n";
					print $foo->mi_static. "\n";//propiedad
					print $foo::$mi_static. "\n";
					$nombreClase = 'Foo';
					print $nombreClase::$mi_static. "\n";
					print Bar::$mi_static. "\n";
					$bar = new Bar();
					print $bar->fooStatic(). "\n";
						
					
				

		?>
	</body>
</html>