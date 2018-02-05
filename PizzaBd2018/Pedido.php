<?php
declare(strict_types=1);
include_once 'Sanitize.php';
class Pedido {
	private $idPedido;//INT IDENTITY NOT NULL
	private $idCliente;//INT NOT NULL
	private $fPedido;//DATETIME2(7) NOT NULL DEFAULT GETDATE()
	private $servido;//bit DEFAULT 'false' NOT NULL    CONVERT(bit,'True')
	private $importe; // MONEY NULL

	function __construct(int $idPedido,int $idCliente,datetime $fPedido,bool $servido,float $importe){
		$this->idPedido = $idPedido;
		$this->$idCliente = $idCliente;
		$this->fPedido = $fPedido;/// date("Y-m-d H:i:s")
		$this->servido = $servido;
		$this->importe = $importe;
	}

	function setIdPedido(int $idPedido){
			$this->idPedido = sanea($idPedido);
	}

	function getIdPedido(): int{
			return $this->idPedido;
	}

	function setIdCliente(int $idCliente){
			$this->idCliente = sanea($idCliente);
	}

	function getIdCliente(): int{
			return $this->idCliente;
	}

	function setFPedido(date $fPedido) :date{
			$this->fPedido = sanea($fPedido);//$fechaActual = date("Y-m-d", time());
	}

	function getFPedido(){///date("Y-m-d H:i:s")
			return $this->fPedido;
	}

	function setServido(bool $servido){
			$this->servido = sanea($servido);
	}

	function getServido(): bool{
			return $this->servido;
	}

	function setImporte(float $importe){
			$this->importe = sanea($importe);
	}

	function getImporte(): float{
			return $this->importe;
	}
}
?>
