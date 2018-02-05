<?php
declare(strict_types=1);
include_once 'Sanitize.php';
class Cliente {

	//private $idCliente;//INT NOT NULL IDENTITY
	private $nombre;//NVARCHAR(100) NOT NULL
	private $direccion;//NVARCHAR(100) NOT NULL
	private $tlfno;//NCHAR(9) NOT NULL,
	private $eCorreo;//NVARCHAR(100) NOT NULL

	function __construct(string $nombre,string $direccion,string $tlfno,string $eCorreo){
		$this->nombre = $nombre;
		$this->direccion = $direccion;
		$this->tlfno = $tlfno;
		$this->eCorreo = $eCorreo;
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

	function setTlfno(string $tlfno){
  		$this->tlfno = sanea($tlfno);
  }

	function getTlfno(): string{
      return $this->tlfno;
  }

	function setECorreo(string $eCorreo){
  		$this->eCorreo = sanea($eCorreo);
  }

	function getECorreo(): string{
      return $this->eCorreo;
  }

	//funcion para el telefono
  function comprobarTelefonoSinException(string $tlfno): bool{
      if(!preg_match("/^[0-9]{9}$/", $tlfno)){
          return false;
      }
          return true;
  }
  //funcion para comprobar el email
  function validarEmailSinException(string $eCorreo): bool{
     if (!filter_var($eCorreo, FILTER_VALIDATE_EMAIL)){
        return false;
     }
        return true;
  }

	//funcion para el telefono para capturar la excepcion
  function comprobarTelefono(string $tlfno){
      if(!preg_match("/^[0-9]{9}$/", $tlfno)){
          throw new Exception('<div class="errorAviso">El telefono es incorrecto y salta la excepción.</div><br>');// mensaje de excepción
      }
  }
  //funcion para comprobar el email para capturar la excepcion
  function validarEmail(string $eCorreo){
     if (!filter_var($eCorreo, FILTER_VALIDATE_EMAIL)){
        throw new Exception('<div class="errorAviso">El email es incorrecto y salta la excepción.</div><br>');
     }

  }

	function recorrerCliente(){
			echo '<h1 class="tituloDatosDerecha">DATOS DEL CLIENTE</h1>';
			echo '<table>';
			echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Nombre cliente</td><td class='."pedidoTD".'>'
			.$this->getNombre().'</td></tr><br>';
			echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Direccion cliente</td><td class='."pedidoTD".'>'
			.$this->getDireccion().'</td></tr><br>';
			echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Telefono cliente</td><td class='."pedidoTD".'>'
			.$this->getTlfno().'</td></tr><br>';
			echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Email cliente</td><td class='."pedidoTD".'>'
			.$this->getECorreo().'</td></tr><br>';
			echo '</table>';
	}
}
?>
