<?php
function sanear($cadena) {
//html pone el primero
//el segundo stripslashes QUITA LOS caracteres de metadatos
  return htmlspecialchars(stripslashes(trim($cadena)));
}
 ?>
