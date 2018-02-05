<?php
declare(strict_types=1);
include_once 'Sanitize.php';
class Extras {
	private $idExtra; //INT IDENTITY NOT NULL
	private $nombre; //NVARCHAR(15) NOT NULL
	private $pv; //MONEY NOT NULL

	function __construct(int $idExtra,string $nombre,int $pv){
		$this->$idExtra = $idExtra;
		$this->nombre = $nombre;
		$this->pv = $pv;
	}

	function setIdExtra(int $idExtra){
        $this->idExtra = sanea($idExtra);
  }

  function getIdExtra(): int{
    return $this->idExtra;
  }

	function setNombre(string $nombre){
        $this->nombre = sanea($nombre);
  }

  function getNombre(): string{
    return $this->nombre;
  }

	function setPv(int $pv){
        $this->pv = sanea($pv);
  }

  function getIdPv(): int{
    return $this->pv;
  }
}
?>
