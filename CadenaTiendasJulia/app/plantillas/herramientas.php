<?php 

function nl2br2($string){
  $cad = nl2br(stripcslashes($string));
  return $cad;
}

function compruebaCodigo($variable){
  if ( strpos($variable, '--')!==false ||  strpos($variable, '\0')!==false || strpos($variable, '<')!==false
  || strpos($variable, '>')!==false ||  strpos($variable, ';')!==false ){
    return true;
  }else{
    return false;
  }
}

 ?>
