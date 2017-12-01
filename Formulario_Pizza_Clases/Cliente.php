<?php
declare(strict_types=1);
include_once 'Sanitize.php';
//include 'ExceptionCliente.php';
class Cliente { //implements Serializable
    private $nombre;
    private $direccion;
    private $telefono;
    private $email;
    private $arrayCliente;


    function __construct(string $nombre,string $direccion, string $telefono , string $email){
            $this->nombre = $nombre;
            $this->direccion = $direccion;
            $this->telefono = $telefono;
            $this->email = $email;
        //$this->arrayCliente = [$nombre,$direccion,$telefono,$email];
    }

    //funcion para el telefono para capturar la excepcion
    function comprobarTelefono(string $telefono){
        if(!preg_match("/^[0-9]{9}$/", $telefono)){
            throw new Exception('El telefono es incorrecto y salta la excepción.<br>');// mensaje de excepción
        }
    }
    //funcion para comprobar el email para capturar la excepcion
    function validarEmail(string $email){
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
          throw new Exception('El email es incorrecto y salta la excepción.<br>');
       }

    }



    function setNombre(string $nombre){
        $this->nombre = sanea($nombre);
    }

    function getNombre(): string{
      return $this->nombre;
    }

    function setDireccion(string $direccion){
        $this->direccion = sanea($direccion);
    }

    function getDireccion(): string{
      return $this->direccion;
    }

    function setTelefono(string $telefono){
        $this->telefono = sanea($telefono);
    }

    function getTelefono(): string{
      return $this->telefono;
    }

    function setEmail(string $email){
        $this->email = sanea($email);
    }

    function getEmail(): string{
      return $this->email;
    }

    function recorrerCliente(){
        echo '<h1>DATOS DEL CLIENTE</h1>';
        echo '<table>';
        echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Nombre cliente</td><td class='."pedidoTD".'>'
        .$this->getNombre().'</td></tr><br>';
        echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Direccion cliente</td><td class='."pedidoTD".'>'
        .$this->getDireccion().'</td></tr><br>';
        echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Telefono cliente</td><td class='."pedidoTD".'>'
        .$this->getTelefono().'</td></tr><br>';
        echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Email cliente</td><td class='."pedidoTD".'>'
        .$this->getEmail().'</td></tr><br>';
        echo '</table>';
    }

    //funcion para el telefono
    function comprobarTelefonoSinException(string $telefono): bool{
        if(!preg_match("/^[0-9]{9}$/", $telefono)){
            return false;
        }
            return true;
    }
    //funcion para comprobar el email
    function validarEmailSinException(string $email): bool{
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
          return false;
       }
          return true;
    }


}

?>
