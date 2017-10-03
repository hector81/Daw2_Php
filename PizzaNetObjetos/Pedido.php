<?php

class Pedido {

    protected $pizzas;

    function __construct() {
        $this->pizzas = array();
    }

    public function addItem($pizza) {
        array_push($this->pizzas, $pizza);
    }

    function getPizzas() {
        return $this->pizzas;
    }

    function setPizzas($pizzas) {
        $this->pizzas = $pizzas;
    }    
}
