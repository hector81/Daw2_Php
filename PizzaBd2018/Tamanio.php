<?php
declare(strict_types=1);
include_once 'Sanitize.php';
class Tamanio {
	private $idTamanio;//INT IDENTITY NOT NULL
	private $nombre;//NVARCHAR(8) NOT NULL

	function __construct(int $idTamanio,string $nombre){
		$this->idTamanio = $idTamanio;
		$this->nombre = $nombre;
	}

	function setIdTamanio(int $idTamanio){
      $this->idTamanio = sanea($idTamanio);
  }

  function getIdTamanio(): int{
    	return $this->idTamanio;
  }

	function setNombre(string $nombre){
  		$this->nombre = sanea($nombre);
  }

	function getNombre(): string{
      return $this->nombre;
  }
}
?>
