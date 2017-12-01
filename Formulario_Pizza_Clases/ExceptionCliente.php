<?php
class ExceptionCliente extends Exception
{
    function __construct(){

    }

    function enviarErrorClienteTelefono($telefono){
        if(!preg_match("/^[0-9]{9}$/", $telefono)){
            throw new Exception('El telefono es incorrecto y salta la excepción.<br>');// mensaje de excepción
            return true;
        }else{
            return false;
        }
    }

    function enviarErrorClienteEamil($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new Exception('El email es incorrecto y salta la excepción.<br>');
            return true;
        }else{
            return false;
        }
    }

}
?>
