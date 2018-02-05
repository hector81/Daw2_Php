<?php
declare(strict_types=1);
include_once 'Sanitize.php';
class ExtrasPedido {
	private $idPizza;//INT NOT NULL
	private $idPrecio;//INT NOT NULL
	private $idExtra;//INT NOT NULL

	function __construct(int $idPizza,int $idPrecio,int $idExtra){
		$this->idPizza = $idPizza;
		$this->idPrecio = $idPrecio;
		$this->idExtra = $idExtra;
	}

	function setIdPizza(int $idPizza){
      $this->idPizza = sanea($idPizza);
  }

  function getIdPizza(): int{
    	return $this->idPizza;
  }

	function setIdPrecio(int $idPrecio){
      $this->idPrecio = sanea($idPrecio);
  }

  function getIdPrecio(): int{
    	return $this->idPrecio;
  }

	function setIdExtra(int $idExtra){
      $this->idExtra = sanea($idExtra);
  }

  function getIdExtra(): int{
    	return $this->idExtra;
  }


}
?>
