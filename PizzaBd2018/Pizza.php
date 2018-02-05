<?php
declare(strict_types=1);
include_once 'Sanitize.php';
class Pizza {
	//private $idPizza;//INT NOT NULL IDENTITY
	private $nombre;//NVARCHAR(50)
	private $descripcion;//NVARCHAR(150)

	function __construct(string $nombre,string $descripcion){
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
	}

	function setNombre(string $nombre){
        $this->nombre = sanea($nombre);
    }

    function getNombre(): string{
      return $this->nombre;
    }

	function setDescripcion(string $descripcion){
        $this->descripcion = sanea($descripcion);
    }

    function getDescripcion(): string{
      return $this->descripcion;
    }

}
?>
