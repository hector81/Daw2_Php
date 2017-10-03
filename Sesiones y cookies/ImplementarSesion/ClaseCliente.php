<?php
include 'pedidoPizzaNet.php';//llamamos a la clase pedido
//clase cliente
class cliente {
	//atributos para los clientes
	private $nombreCliente;
	private $direccionCliente;
	private $telefonoCliente;
	private $pedidoCliente;//el pedido del cliente

	//constructor con parametros
	public function __construct($nombreCliente,$direccionCliente,$telefonoCliente, $pedido){
		$this->nombreCliente=$nombreCliente;
		$this->direccionCliente=$direccionCliente;
		$this->telefonoCliente=$telefonoCliente;
		$this->pedidoCliente = new pedidoPizzaNet();//creamos un nuevo pedido
	  }
	
	//Funciones getters and setters
	public function getNombreCliente(){
		return $this->nombreCliente;
	}
	 
	public function setNombreCliente($nombreCliente){
		$this->nombreCliente = $nombreCliente;
	}
	
	public function getDireccionCliente(){
		return $this->_direccionCliente;
	}
	 
	public function setDireccionCliente($direccionCliente){
		$this->direccionCliente = $direccionCliente;
	}
	
	public function getTelefonoCliente(){
		return $this->_telefonoCliente;
	}
	 
	public function setTelefonoCliente($telefonoCliente){
		$this->telefonoCliente = $telefonoCliente;
	}
	
	function getPedidoCliente() {
        return $this->pedidoCliente;
    } 

    function setPedidoCliente($pedidoCliente) {
        $this->pedidoCliente = $pedidoCliente;
    }

}//fin clase //////
//fin clase cliente

?>
	