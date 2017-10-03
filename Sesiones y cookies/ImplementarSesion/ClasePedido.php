<?php
include 'ClasePizza.php';//llamamos a la clase pizza
include 'ClaseCliente.php';//llamamos a la clase cliente
//clase pedido
class pedidoPizzaNet{
	//atributos para los precios
	private static $IVA = 10; //diez por ciento IVA alimentos hosteria
	private $pizza;
	private $cliente;
	//constructor con parametros
	public function __construct($pizza, $cliente){
		$this->pizzas = new ClasePizza($tipoPizza,$sizePizza,$masaPizza,$extrasPizzas);//pasar la referencia al objeto
		$this->$cliente = new ClaseCliente($nombreCliente,$direccionCliente,$telefonoCliente);//pasar la referencia al objeto
	  }
	//GETTER SETTER
    function getPizzas() {
        return $this->pizzas;
    }

    function setPizzas($pizzas) {
        $this->pizzas = $pizzas;
    }
	
	function getCliente() {
        return $this->cliente;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }
	
	//FUNCIONES
	
	//fUNCION PARA RECORRER EL ARRAY CON LOS DATOS DE LA FACTURA DEL PEDIDO
	public function devolverDatosPizzas($pizza){
		//recorrer objeto y imprimir el resultado en html
		echo "<table border='1'>";
		echo "<caption>DATOS DEL CLIENTE</caption>";
		foreach ($pizza as $clave => $valor) {
				if(!is_array($valor)){
					echo "<tr>";
					echo "<td>";
					echo "$clave: $valor\n"."<br>";
					echo "</td>";
					echo "</td>";		
				}else{
					foreach ($valor as $claveNueva => $valorNuevo) {
						echo "<tr>";
						echo "<td>";
						echo "$claveNueva: $valorNuevo\n"."<br>";
						echo "</td>";
						echo "</td>";		
						}
				}
		}//fin foreach
		echo "</table>";
	}//Fin funcion
	
			

	//fUNCION PARA calcular el coste total
	public function calcularCostePedido($pizza){
		$euros = 0; //precio inicial pizza//va sumando el precio en sentido lineal
		foreach ($pizza as $clave => $valor) { //$tipoPizza,$sizePizza,$masaPizza,$extrasPizzas
				if(!is_array($valor)){ 
					//Precios tamaño pizza Normal	7 Grande	10 Familiar	12	
					if ($tipoPizza == "normal") {
						$euros = $euros + 7;
					} elseif ($tipoPizza == "grande") {
						$euros = $euros + 10;
					} else {
						$euros = $euros + 12;
					}
				}else{
						//Precios extras pizza Queso	1 Pimiento	1 Cebolla	2 Jamon	2 Pollo	3
						for($e =0; $e< count($valor); $e++){
							$extraElegido = $valor[$e];
							if ($extraElegido == 'queso') {
								$euros = $euros + 1;
							} elseif ($extraElegido == 'pimiento') {
								$euros = $euros + 1;
							} elseif ($extraElegido == 'cebolla') {
								$euros = $euros + 1;
							} elseif ($extraElegido == 'jamon') {
								$euros = $euros + 2;
							} elseif ($extraElegido == 'pollo') {
								$euros = $euros + 3;
							
							}
						}
			
					}
				}
		}//fin foreach
		//multipicamos el numero de pizzas
		$euros = $euros*$numeroPizzas;	
		//calculamos total factura iva
		$totalFacturaIVA = (($euros+($euros/100)*$IVA));
		$resultado = "Son ". $euros . " euros más un " .$IVA ." % de IVA que es igual a " . $totalFacturaIVA . " euros en total";  
		
		
	}//fin funcion		

	//fUNCION PARA RECORRER EL OBJETO CLIENTE
	public function devolverDatosClientes($cliente){
		//recorrer objeto y imprimir el resultado en html
		echo "<table border='1'>";
		echo "<caption>DATOS DEL CLIENTE</caption>";
		foreach ($cliente as $clave => $valor) {
				echo "<tr>";
				echo "<td>";
				echo "$clave: $valor\n"."<br>";
				echo "</td>";
				echo "</td>";
		}//fin foreach
		echo "</table>";
	}//fin funcion
	
	
	 public function addItem($pizza) {
        array_push($this->pizzas, $pizza);
    }
}//fin clase
//fin clase pedido
?>

