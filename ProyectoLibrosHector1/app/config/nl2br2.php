<?php

function nl2br2(string $cadena) :string{
    $cad = nl2br(stripcslashes($cadena));
    return $cadena;
}

 ?>
