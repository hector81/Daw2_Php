<?php
class ExceptionPizza extends Exception
{
    function __construct(){

    }

    function enviarErrorNumeroPizzas($numeroPizzas){
        if(!is_numeric($numeroPizzas)){
            throw new Exception('El número de pizzas no es numérico y salta la excepción. ');
        }
    }

}
?>
