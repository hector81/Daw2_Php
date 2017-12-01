<?php
declare(strict_types=1);
include_once 'Sanitize.php';
class ListaPedidos implements Serializable {

    private $lista;

    function __construct() {
      $this->lista = array();
    }

    function getLista(): array{
        return $this->lista;
    }

    function setLista(array $lista){
        $this->lista = sanea($lista);
    }

    function anadirPizzas(Pizza $pizza) {
      $cuenta1 =  count($this->lista);
      array_push($this->lista, $pizza);
      $cuenta2 =  count($this->lista);
      if(($cuenta1+1) == $cuenta2){
        echo 'Pizza añadida<br>';
      }else{
          echo 'Pizza no ha sido añadida<br>';
      }
      //$this->lista[] = $pizza ;

    }

    function recorrerLista(){
      foreach ($this->lista as  $pizza) {
          /*
            if(is_object($pizza)){
                echo 'Pizza es un objeto<br>';
            }elseif(is_array($pizza)){
                echo 'Pizza es un array<br>';
            }else{
                echo 'Pizza no se lo que es<br>';
            }
            */
            echo '<form name="cancelarNumeroPedido" id="cancelarNumeroPedido" action="procesamientoPedido.php" method="POST">';
            echo '<table>';
            $intIndice = $pizza->getIndice(). PHP_EOL;
            $intIndice = intval($intIndice);
            echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Indice de la pizza</td>
            <td class='."pedidoTD".'>'.($intIndice+1).'</td></tr>';
            echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Tipo de la pizza</td>
            <td class='."pedidoTD".'>'. $pizza->getTipoPizza(). PHP_EOL.'</td></tr>';
            echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Tamaño de la pizza</td>
            <td class='."pedidoTD".'>' . $pizza->getTamanoPizza(). PHP_EOL.'</td></tr>';
            echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Masa de la pizza</td>
            <td class='."pedidoTD".'>'. $pizza->getMasaPizza(). PHP_EOL.'</td></tr>';
            echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Extras de la pizza</td>';
            $listaExtras = '';
            $variable = $pizza->getExtraPizza();
            echo '<td class='."pedidoTD".'>';
            foreach ($variable as $key => $value) {
                $listaExtras.= $value.'<br>';
            }
            echo $listaExtras.'</td></tr>';
            echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Masa de la pizza</td>
            <td class='."pedidoTD".'>'. $pizza->calcularPrecioPizza($pizza).'</td></tr>';
            echo '</table>';
            echo '<input type="hidden" name="numeroBorrar" value='.$pizza->getIndice().'>';//
            echo '<input type="submit" name="Borrar" value="Borrar" class='."centroBoton".' >';
            echo '</form>';
            echo 'NUMERO BORRAR '.$pizza->getIndice();
        }

      }

      function calcularPedidosPrecioTotal(): string{
          $sumaTotal = 0.0;
          foreach ($this->lista as $key => $pizza) {
              $sumaTotal += $pizza->calcularPrecioPizza($pizza);
          }
          return '<table class="totalPedidos"><tr class='.'precioTr'.'><td class='."precioTituloTD".'>TOTAL DE LOS PEDIDOS </td>
          <td class='."pedidoTD".'>'. $sumaTotal.'</td></tr></table>';
      }

      function contarPedidosTotal(){
        echo 'NÚMERO PEDIDOS EN TOTAL = '.count($this->lista);
      }

      function borrarPedidoNumero($numeroBorrar){
          unset($this->lista[array_search($numeroBorrar, $this->lista)]);
          //unset($this->lista,$numeroBorrar);
          //unset($this->lista[$numeroBorrar]);
          /*foreach ($this->lista as  $pizza) {
            if($pizza->getIndice() == $numeroBorrar){
                unset($this->lista[$pizza]);
            }
          }*/
          echo 'BORRADO PEDIDO';
      }

      function cambiarIndicesBorrado(){
          $varContador = 0;
          foreach ($this->lista as  $pizza) {
                $pizza->setIndice($varContador);
                $varContador++;
          }
            /* Se podría usar
          $this->lista = array_values($this->lista);*/
       }

      function compararPizza(Pizza $pizza): bool{
        $bool= false;
        //COMPARAMOS TODo menos el indice que no sera igual
        foreach ($this->lista  as $keyPizza => $valorPizza) {
            if ($pizza->getTipoPizza() == $valorPizza->getTipoPizza() && $pizza->getTamanoPizza() == $valorPizza->getTamanoPizza()
            && $pizza->getMasaPizza() == $valorPizza->getMasaPizza()
            && $pizza->getExtraPizza() == $valorPizza->getExtraPizza() && $pizza->getNumeroPizzas() == $valorPizza->getNumeroPizzas()) {
                $bool= true;
            }
        }
        return $bool;
      }

      function recorrerListaFinal(){
        foreach ($this->lista as  $pizza) {
              echo '<form name="cancelarNumeroPedido" id="cancelarNumeroPedido" action="procesamientoPedido.php" method="POST">';
              echo '<table>';
              $intIndice = $pizza->getIndice(). PHP_EOL;
              $intIndice = intval($intIndice);
              echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Indice de la pizza</td>
              <td class='."pedidoTD".'>'.($intIndice+1).'</td></tr>';
              echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Tipo de la pizza</td>
              <td class='."pedidoTD".'>'. $pizza->getTipoPizza(). PHP_EOL.'</td></tr>';
              echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Tamaño de la pizza</td>
              <td class='."pedidoTD".'>' . $pizza->getTamanoPizza(). PHP_EOL.'</td></tr>';
              echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Masa de la pizza</td>
              <td class='."pedidoTD".'>'. $pizza->getMasaPizza(). PHP_EOL.'</td></tr>';
              echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Extras de la pizza</td>';
              $listaExtras = '';
              $variable = $pizza->getExtraPizza();
              echo '<td class='."pedidoTD".'>';
              foreach ($variable as $key => $value) {
                  $listaExtras.= $value.'<br>';
              }
              echo $listaExtras.'</td></tr>';
              echo '<tr class='.'precioTr'.'><td class='."precioTituloTD".'>Masa de la pizza</td>
              <td class='."pedidoTD".'>'. $pizza->calcularPrecioPizza($pizza).'</td></tr>';
              echo '</table>';
              echo '</form>';
          }

        }


      function serialize() {
          return serialize($this->lista);
      }

      function unserialize($lista) {
          $this->lista = unserialize($lista);
      }

      function contarPizzas(): int{
           $varContador = 0;
           foreach ($this->lista as  $pizza) {
                 $varContador++;
           }
           return $varContador;
        }

        function transformarArrayEnObjeto($lista){
            $listaObjeto = (object)$lista;
            return $listaObjeto;
        }

        function ObjetoEnArray($lista){
          $listaArray = (array)$lista;
          return $listaArray;
        }



}
?>
