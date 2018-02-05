<?php
declare(strict_types=1);
include_once 'Sanitize.php';
class LineaPedido {
	private $idPedido;//INT NOT NULL
	private $idPrecio;//INT NOT NULL
	private $cantidad;//TINYINT NOT NULL

	function __construct(int $idPedido,int $idPrecio,int $cantidad){
		$this->idPedido = $idPedido;
		$this->idPrecio = $idPrecio;
		$this->cantidad = $cantidad;
	}

	function setIdPedido(int $idPedido){
			$this->idPedido = sanea($idPedido);
	}

	function getIdPedido(): int{
			return $this->idPedido;
	}

	function setIdPrecio(int $idPrecio){
			$this->idPrecio = sanea($idPrecio);
	}

	function getIdPrecio(): int{
			return $this->idPrecio;
	}

	function setIdCantidad(int $cantidad){
			$this->cantidad = sanea($cantidad);
	}

	function getCantidad(): int{
			return $this->cantidad;
	}
}
?>
