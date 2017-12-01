<?php
declare(strict_types=1);
include_once 'Sanitize.php';
class Pizza {
    private $indice;
    private $tipoPizza;
    private $tamanoPizza;
    private $masaPizza;
    private $extraPizza;
    private $numeroPizzas;
    //este sera accesible desde cualquier parte
    const precios = array(
        'getTipoPizza' => array(
            'margarita' => 4,
            'barbacoa' => 4.5,
            '4estaciones' => 5,
            '4quesos' => 3.75,
            'carbonara' => 4,
            'romana' => 5,
            'mediterranea' => 4.25
        ),
        'getTamanoPizza' => array(
            'normal' => 4,
            'grande' => 5,
            'familiar' => 6.5
        ),
        'getMasaPizza' => array(
            'fina' => 2,
            'familiar' => 2.5
        ),
        'getExtraPizza' => array(
            'queso' => 1,
            'pimiento' => 1,
            'cebolla' => 1,
            'jamon' => 1,
            'pollo' => 1,
        )

    );

    //constructor
    function __construct(int $indice,string $tipoPizza,string $tamanoPizza,string $masaPizza,array $extraPizza,int $numeroPizzas){
            $this->indice = $indice;
            $this->tipoPizza = $tipoPizza;
            $this->tamanoPizza = $tamanoPizza;
            $this->masaPizza = $masaPizza;
            $this->extraPizza = $extraPizza;
            $this->numeroPizzas = $numeroPizzas;
    }

    function enviarErrorNumeroPizzas($numeroPizzas){
        if(!is_numeric($numeroPizzas)){
            throw new Exception('El número de pizzas no es numérico y salta la excepción. ');
        }
    }

    function comprobarErrorNumeroPizzas(int $numeroPizzas): bool{
        if(!is_numeric($numeroPizzas)){
          return false;
       }
          return true;
    }

    function setIndice(int $indice){
        $this->indice = sanea($indice);
    }

    function getIndice(): int{
      return $this->indice;
    }

    function setTipoPizza(string $tipoPizza){
        $this->tipoPizza = sanea($tipoPizza);
    }

    function getTipoPizza(): string{
      return $this->tipoPizza;
    }

    function setTamanoPizza(string $tamanoPizza){
        $this->tamanoPizza = sanea($tamanoPizza);
    }

    function getTamanoPizza(): string{
      return $this->tamanoPizza;
    }

    function setMasaPizza(string $masaPizza){
        $this->masaPizza = sanea($masaPizza);
    }

    function getMasaPizza(): string{
      return $this->masaPizza;
    }

    function setExtraPizza(array $extraPizza){
        $this->extraPizza = sanea($extraPizza);
    }

    function getExtraPizza(): array{
      return $this->extraPizza;
    }

    function setNumeroPizzas(int $numeroPizzas){
      $this->numeroPizzas = sanea($numeroPizzas);
    }

    function getNumeroPizzas(): int{
      return $this->numeroPizzas;
    }

    function calcularPrecioPizza(): float{//echo $key. " " . $var .PHP_EOL;$thearray = (array) $theobject;$libro = (object)$miarray;
        $precio = 0.0;
        $varNumero = 0;
        foreach (self::precios as $keyPrecio => $valuePrecio) {
            if($keyPrecio == 'getTipoPizza'){
                foreach ($valuePrecio as $key => $value) {
                    if($key == $this->getTipoPizza()){
                        $precio = $precio + $value;
                    }
                }
            }
            if($keyPrecio == 'getTamanoPizza'){
                foreach ($valuePrecio as $key => $value) {
                    if($key == $this->getTamanoPizza()){
                        $precio = $precio + $value;
                    }
                }
            }
            if($keyPrecio == 'getMasaPizza'){
                foreach ($valuePrecio as $key => $value) {
                    if($key == $this->getMasaPizza()){
                        $precio = $precio + $value;
                    }
                }
            }/////////esto es para los extras que es un array
            if($keyPrecio == 'getExtraPizza'){
                foreach ($this->getExtraPizza() as $keyExtras => $extras){
                    foreach ($valuePrecio as $key => $value){
                        if($extras == $key ){
                            $precio = $precio + $value;
                        }
                    }
                }
            }
        }
        $varNumero = $this->getNumeroPizzas();
        $resultado = $precio*$varNumero;
        return $resultado;
    }

    /*
    function calcularPrecioPizza(): float{
      $precio = 0.0;
      $varNumero = 0;

          //TIPO PIZZA
              switch ($this->getTipoPizza()) {
                case 'margarita':
                  $precio = $precio + 4;
                  break;
                case 'barbacoa':
                  $precio = $precio + 4.5;
                  break;
                case '4estaciones':
                  $precio = $precio + 5;
                  break;
                case '4quesos':
                  $precio = $precio + 3.75;
                  break;
                case 'carbonara':
                  $precio = $precio + 4;
                  break;
                case 'romana':
                  $precio = $precio + 5;
                  break;
                case 'mediterranea':
                  $precio = $precio + 4.25;
                  break;
              }

          //TAMAÑO PIZZA
              switch ($this->getTamanoPizza()) {
                  case 'normal':
                    $precio = $precio + 4;
                    break;
                  case 'grande':
                    $precio = $precio + 5;
                    break;
                  case 'familiar':
                    $precio = $precio + 6.5;
                    break;
              }

          //MASA PIZZA
              switch ($this->getMasaPizza()) {
                  case 'fina':
                    $precio = $precio + 2;
                    break;
                  case 'familiar':
                    $precio = $precio + 2.5;
                    break;
              }

        //EXTRAS PIZZA, ESTE ES UN ARRAY
              foreach ($this->getExtraPizza() as $key1 => $extras){
                  switch ($extras) {
                        case 'queso':
                          $precio += 1;
                          break;
                        case 'pimiento':
                          $precio += 1;
                          break;
                        case 'cebolla':
                          $precio += 1;
                          break;
                        case 'jamon':
                          $precio += 1;
                          break;
                        case 'pollo':
                          $precio += 1;
                          break;
                  }
              }


          //numeroPizzas

            $varNumero = $this->getNumeroPizzas();


      $resultado = $precio*$varNumero;
      return $resultado;
    }
    */
    function imprimirPedidoPizza(float $precio){
      echo '<table>';
            echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>TIPO PIZZA: </td><td class='."pedidoTD".'>'.
            $this->getTipoPizza().'</td></tr>';
            echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>TAMAÑO PIZZA: </td><td class='."pedidoTD".'>'.
            $this->getTamanoPizza().'</td></tr>';
            echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>MASA PIZZA: </td><td class='."pedidoTD".'>'.
            $this->getMasaPizza().'</td></tr>';
            echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>EXTRAS PIZZA: </td>';
            echo '<td class='."pedidoTD".'>';
            foreach ($this->getExtraPizza() as $key1 => $value1) {
              echo $value1.'<br>';
            }
            echo '</td>';
            echo '</tr>';
            echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>NÚMERO PIZZAS: </td><td class='."pedidoTD".'>'.
            $this->getNumeroPizzas().'</td></tr>';
      echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Precio pizzas</td><td class='."pedidoTD".'>'.$precio.'</td></tr>';
      echo '</table>';
    }



}
 ?>
