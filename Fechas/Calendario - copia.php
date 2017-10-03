<!-- 

-->
<html>
	<head>
		<title>Calendario</title>
	</head>

	
<body> 
		<form name="input" method="post" >
			<table>			
				<caption>Calendario</caption>
				
				<tr>
					<td>
						<b>Escoge día</b>
					</td>
					<td>
						<input name="diaAño" type="text" value=""/>	
					</td>
				</tr>
				<tr>
					<td>
						<b>Escoge mes</b>
					</td>
					<td>
						<input name="mesAño" type="text" value=""/>	
					</td>
				</tr>
				<tr>
					<td>
						<b>Escoge Año</b>
					</td>
					<td>
						<input name="Año" type="text" value=""/>	
					</td>
				</tr>
				

				
			</table>
			
		</table>

		<input type="submit" name="Enviar" value="Enviar"/>
		</form>

		
			<!-- empieza el php -->
			<?php
			//SI LE DAMOS AL BOTON AGREGAR
			if(isset($_POST['Enviar'])) {	 
					//en caso de estar completados los pasamos valores a las variables mediante el metodo POST 
					$diaAño = $_POST['diaAño'];
					$mesAño = $_POST['mesAño'];
					$Año = $_POST['Año'];
					//funcion para sacar el numero de dias del mes
					function calculadDiasMes($mesAño){
						$dias=0;
						switch($mesAño){
							case "Enero":
										 $dias=31;
										 break;
							case "Febrero":
										 $dias=28;
										 break;
							case "Marzo":
										 $dias=31;
										 break;
							case "Abril":
										 $dias=30;
										 break;
							case "Mayo":
										 $dias=31;
										 break;
							case "Junio":
										 $dias=30;
										 break;
							case "Julio":
										 $dias=31;
										 break;
							case "Agosto":
										 $dias=31;
										 break;
							case "Septiembre":
										 $dias=30;
										 break;
							case "Octubre":
										 $dias=31;
										 break;
							case "Noviembre":
										 $dias=30;
										 break;
							case "Diciembre":
										 $dias=31;
										 break;
							}
							return $dias;
					}
					//funcion para sacar el numero de dias del mes		
					function sacarNumeroMes($mesAño){
					$numeroMes=0;;	
					switch($mesAño){
						case "Enero":
									 $numeroMes=1;
									 break;
						case "Febrero":
									 $numeroMes=2;
									 break;
						case "Marzo":
									 $numeroMes=3;
									 break;
						case "Abril":
									 $numeroMes=4;
									 break;
						case "Mayo":
									 $numeroMes=5;
									 break;
						case "Junio":
									 $numeroMes=6;
									 break;
						case "Julio":
									 $numeroMes=7;
									 break;
						case "Agosto":
									 $numeroMes=8;
									 break;
						case "Septiembre":
									 $numeroMes=9;
									 break;
						case "Octubre":
									 $numeroMes=10;
									 break;
						case "Noviembre":
									 $numeroMes=11;
									 break;
						case "Diciembre":
									 $numeroMes=12;
									 break;
						}
						return $numeroMes;
					}
						
					//dias del mes correspondiente	
					$dias = calculadDiasMes($mesAño);
					//numero del mes correspondiente	
					$numeroMes = sacarNumeroMes($mesAño);
					//vemos la fecha actual
					$date = new DateTime();
					echo "Fecha actual: <br>";
					echo $date->format('Y-m-d H:i:s');
					echo "<br>";
					//sacamos el numero de la semana actual
					$NumeroSemanaActual= date('w');
					$diasSemana = array("domingo","lunes","martes","mi&eacute;rcoles","jueves","viernes","s&aacute;bado");
					echo "Buenos d&iacute;as, hoy es ".$diasSemana[$NumeroSemanaActual]."<br>";
					
					echo "FECHAS PARA COMPARAR<br>";
					//vemos fechas actuales					
					$AñoActual= date('Y');
					$mesActual= date('m');
					$diaActual= date('d');
					$fecha1 = "$AñoActual-$mesActual-$diaActual";
					echo "Fecha actual<br>";
					echo $fecha1;echo "<br>";
					
					
					//vemos fechas puesta
					if($numeroMes < 10){
						$fecha2 = "$Año-0$numeroMes-$diaAño";
					}elseif($diaAño < 10){
						$fecha2 = "$Año-$numeroMes-0$diaAño";	
					}elseif($numeroMes < 10 && $diaAño < 10){
						$fecha2 = "$Año-0$numeroMes-0$diaAño";
					}else{
						$fecha2 = "$Año-$numeroMes-$diaAño";
					}
					
					echo "Fecha para comparar<br>";
					echo $fecha2;echo "<br>";
					
					

					function dias_transcurridos($fecha1,$fecha2)
					{
						$dias	= (strtotime($fecha1)-strtotime($fecha2))/86400;
						$dias 	= abs($dias); $dias = floor($dias);		
						return $dias;
					}
					// DIAS TRANSCURRIDOS
					$diasDiferencia = dias_transcurridos($fecha1,$fecha2);
					echo "Dias transcurridos entre dos fechas<br>";
					echo $diasDiferencia;
					echo "<br>";
				
					//calcular años
					echo "Meses transcurridos entre dos fechas<br>";
					$fechainicial = new DateTime($fecha2);
					$fechafinal = new DateTime($fecha1);
					$diferencia = $fechainicial->diff($fechafinal);
					$meses = ( $diferencia->y * 12 ) + $diferencia->m;
					echo $meses."<br>";
				
					//calcular años
					echo "Años transcurridos entre dos fechas<br>";
					echo floor($diasDiferencia/365)."<br>";
					
					//
					function CalcularDiaCalendario(){
						
					}
	
					//construimos calendario
					$contador=0;
					echo "<table border='1'>";
					echo "<tr>
								<th cols='7'>$mesAño $Año</th>
						  </tr>
					";
					echo "<tr>
							<th>Lunes</th>
							<th>Martes</th>
							<th>Miercoles</th>
							<th>Jueves</th>
							<th>Viernes</th>
							<th>Sabado</th>
							<th>Domingo</th>
						 </tr>
					";
					echo "<tr>";
					for($i=2*-1; $i <= $dias; $i++){
						if($i < 1){
							echo "<th>";
							echo "</th>";
							$contador++;
						}elseif($i > 0){
							echo "<th>";
								echo $i;
							echo "</th>";
							$contador++;
							if($contador%7 == 0){
								echo "</tr>";
								echo "<tr>";
								$contador=0;
							}	
						}
												
							
					}
					echo "</tr>";
					echo "</table>";		
						

						
					
					
				}//fin if agregar
				//fin de la accion de introducir
				
		
			?>
			<?php
$hoy = unixtojd(mktime(0, 0, 0, 8, 16, 2003));
print_r(cal_from_jd($hoy, CAL_GREGORIAN));
?>
	
			
			
</body>
</html>