<?php

class Pedido {

    protected $pizzas;

    function __construct() {
        $this->pizzas = array();
    }

    function addItem($pizza) {
        array_push($this->pizzas, $pizza);
    }

    function removeItem($index) {
        unset($this->pizzas[$index]);
        $this->pizzas = array_values($this->pizzas);
    }

    function getPizzas() {
        return $this->pizzas;
    }

    function setPizzas($pizzas) {
        $this->pizzas = $pizzas;
    }

    function calcula_total() {
        $precio_total = 0;
        for ($index = 0; $index < count($this->pizzas); $index++) {
            $precio_total = $precio_total + $this->pizzas[$index]->calculaPrecio();
        }
        return $precio_total;
    }

}
