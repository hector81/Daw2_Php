<?php
function sanear($cadena) {
	// Caracteres prohibidos porque en algunos sistemas operativos no son admitidos como nombre de fichero
// Obtenida del código fuente de WordPress.org
$forbidden_chars = array(
  "?", "[", "]", "/", "\\", "=", "<", ">", ":", ";", ",", "'", "\"", "&",
  "$", "#", "*", "(", ")" , "|", "~", "`", "!", "{", "}", "%", "+" , chr(0));

// Caracteres que queremos reemplazar por otros que hacen el texto igualmente legible
$replace_chars = array(
  'áéíóúäëïöüàèìòùñ ',
  'aeiouaeiouaeioun_'
);

// Convertimos el texto a analizar a minúsculas
$cadena = strtolower($cadena);

//Comprobamos cada carácterIdit1611

for( $i=0 ; $i < strlen($cadena) ; $i++ ) {
  $sane_char = $source_char = $cadena[$i];
  if ( in_array( $source_char, $forbidden_chars ) ) {
    $sane_char = "_";
    $sane .= $sane_char;
    continue;
  }
  $pos = strpos( $replace_chars[0], $source_char);
  if ( $pos !== false ) {
    $sane_char = $replace_chars[1][$pos];
    $sane .= $sane_char;
    continue;
  }
  if ( ord($source_char) < 32 || ord($source_char) > 128 ) {
    // Todos los caracteres codificados por debajo de 32 o encima de 128 son especiales
    // Ver http://www.asciitable.com/
    $sane_char = "_";
    $sane .= $sane_char;
    continue;
  }
  // Si ha pasado todos los controles, aceptamos el carácter
  $sane .= $sane_char;
}
//html pone el primero
//el segundo stripslashes QUITA LOS caracteres de metadatos
  return htmlspecialchars(stripslashes(trim($sane)));
}
 ?>



