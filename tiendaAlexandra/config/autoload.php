<?php

//Gracias al autoloader podemos utilizar Namespaces sin necesidad del composer.json

spl_autoload_register(function( $class ) {
  //si el string position en la clase de Amowhi\\Cms\\ se encuentra al principio:
  if(strpos($class, 'Amowhi\\Cms\\') === 0){
    //reemplazamos Amowhi\\Cms\\ por nada, dentro de la clase y lo igualamos a $path.
    $path = str_replace('Amowhi\\Cms\\','', $class);
    require_once __DIR__ . '\\..\\app\\' . $path . '.php';
  } 
});
