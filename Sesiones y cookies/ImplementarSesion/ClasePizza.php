<?php
//clase pedido
class Pizza{
	//atributos para las pizzas
	private $tipoPizza;
	private $sizePizza;
	private $masaPizza;
	//este es para hacer un array de extras
	private $extrasPizzas  = Array();
	//constructor con parametros
	public function __construct($tipoPizza,$sizePizza,$masaPizza,$extrasPizzas){
		$this->tipoPizza=$tipoPizza;
		$this->sizePizza=$sizePizza;
		$this->masaPizza=$masaPizza;
		$this->extrasPizzas= array();//es un array
	  }
	
	function getTipoPizza() {
        return $this->tipoPizza;
    }

    function setTipoPizza($tipoPizza) {
        $this->tipoPizza = $tipoPizza;
    }
	
	function getSizePizza() {
        return $this->sizePizza;
    }

    function setSizePizza($sizePizza) {
        $this->sizePizza = $sizePizza;
    }
	
	function getMasaPizza() {
        return $this->masaPizza;
    }

    function setMasaPizza($masaPizza) {
        $this->masaPizza = $masaPizza;
    }
	
	function getExtrasPizzas() {//al ser un array debe devolverlo recorriendolo como array
        $cadena="";
        foreach ($extrasPizzas as $value) {
            $cadena=$cadena . ", ". $value;
        }
        return $this->extrasPizzas;
    }

    function setExtrasPizzas($extrasPizzas) {
        $this->extrasPizzas = $extrasPizzas;
    }
	
	
}//fin clase

?>

