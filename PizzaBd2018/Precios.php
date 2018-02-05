<?php
declare(strict_types=1);
include_once 'Sanitize.php';
class Precios {
	private $idPrecio;//INT IDENTITY NOT NULL
	private $idPizza;//INT NOT NULL
	private $idTamanio;//INT NOT NULL
	private $pv;//INT NOT NULL

	function __construct(int $idPrecio,int $idPizza,int $idTamanio,int $pv){
		$this->idPrecio = $idPrecio;
		$this->idPizza = $idPizza;
		$this->idTamanio = $idTamanio;
		$this->pv = $pv;
	}

	function setIdPrecio(int $idPrecio){
  		$this->idPrecio = sanea($idPrecio);
  }

  function getIdPrecio(): int{
    	return $this->idPrecio;
  }

	function setIdPizza(int $idPizza){
  		$this->idPizza = sanea($idPizza);
  }

  function getIdPizza(): int{
    	return $this->idPizza;
  }

	function setIdTamanio(int $idTamanio){
  		$this->idTamanio = sanea($idTamanio);
  }

  function getIdTamanio(): int{
    	return $this->idTamanio;
  }

	function setPv(int $pv){
  		$this->pv = sanea($pv);
  }

  function getPv(): int{
    	return $this->pv;
  }

}
?>
