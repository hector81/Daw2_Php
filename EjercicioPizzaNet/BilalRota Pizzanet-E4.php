<?php
		$nombre = (isset($_POST['nombre']))?$_POST['nombre']:'';
		$telefono = (isset($_POST['telefono']))?$_POST['telefono']:'';
		$direccion = (isset($_POST['direccion']))?$_POST['direccion']:'';
		$correo = (isset($_POST['correo']))?$_POST['correo']:'';

        $numero = (isset($_POST['numpizza']))?$_POST['numpizza']:null;
        $tam = (isset($_POST['tam']))?$_POST['tam']:null;
        $espe = (isset($_POST['espe']))?$_POST['espe']:null;
        $ext = (isset($_POST['ext']))?$_POST['ext']:null;

        $nomPizza = ['margarita','barbacoa','estaciones','cuatroquesos','carbonara','romana','mediterranea'];

        $pizzas = [
            'margarita' => 1.5,
            'barbacoa' => 1.7,
            'estaciones' => 1.7,
            'cuatroquesos' => 1.8,
            'carbonara' => 1,
            'romana' => 1.2,
            'mediterranea' =>1.3
        ];

        $tamanio = [
            'normal' => 0,
            'grande' => 0.2,
            'familiar' => 0.5
        ];

        $espesor = [
            'normal' => 0.2,
            'fina' => 0,
        ];

        $extra = [
            'jamon' => 0,
            'queso' => 0.2,
            'cebolla' => 0.5,
            'pollo' => 0.5
        ];

        $enviado = (isset($_POST['aceptar']))?true:false;

        $ax = (isset($_POST['aceptar2']))?true:false;
        $cex = (isset($_POST['cancelar']))?true:false;
        $canceled = false;
		

	?>
<html>
<head><title>Formulario 1</title></head>
	<body>
        <h1>La pizzeria de Carlos</h1>
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        
            
                <input type="text" name="nombre" value="<?= $nombre ?>"> Nombre de cliente 
                <?php
                    if($enviado && empty($nombre)){
                        echo " || es un campo obligatorio";
                    }
                ?>
                <br><input type="text" name="telefono" value="<?= $telefono ?>"> Telefono 
                <?php
                    if($enviado && empty($telefono)){
                        echo " || es un campo obligatorio";
                    }
                ?>
                <br><input type="text" name="direccion" value="<?= $direccion ?>"> Direccion 
                <?php
                    if($enviado && empty($direccion)){
                        echo " || es un campo obligatorio";
                    }
                ?>
                <br><input type="text" name="correo" value="<?= $correo ?>"> Correo Electronico 
                <?php
                    if($enviado && empty( $correo )){
                        echo " || es un campo obligatorio";
                    }
                ?>
                <br>
                ---------------------------------------------------------<br>

                <h2>Pizza a elegir:</h2><br>
                <input type="text" name="numpizza[]" size=1 value="<?= $numero[0] ?>">  MARGARITA          
                <select name="tam[0]" size="1" >
                <option value="normal" selected="selected">Normal</option>
                <option value="grande">Grande</option>
                <option value="familiar">Familiar</option>
                </select>
                <select name="espe[0]" size="1" >
                <option value="fina" selected="selected">Fina</option>
                <option value="normal">Normal</option>
                </select>
                <select name="ext[0]" size="1">
                <option value="jamon" selected="selected">Jamon</option>
                <option value="queso">Queso</option>
                <option value="cebolla">Cebolla</option>
                <option value="pollo">Pollo</option>
                </select>
                <br>

                <input type="text" name="numpizza[]" size=1 value="<?= $numero[1] ?>">  BARBACOA          
                <select name="tam[1]" size="1" >
                <option value="normal" selected="selected">Normal</option>
                <option value="grande">Grande</option>
                <option value="familiar">Familiar</option>
                </select>
                <select name="espe[1]" size="1" >
                <option value="fina" selected="selected">Fina</option>
                <option value="normal">Normal</option>
                </select>
                <select name="ext[1]" size="1">
                <option value="jamon" selected="selected">Jamon</option>
                <option value="queso">Queso</option>
                <option value="cebolla">Cebolla</option>
                <option value="pollo">Pollo</option>
                </select>
                <br>

                <input type="text" name="numpizza[]" size=1 value="<?= $numero[2] ?>">  4 ESTACIONES          
                <select name="tam[2]" size="1" >
                <option value="normal" selected="selected">Normal</option>
                <option value="grande">Grande</option>
                <option value="familiar">Familiar</option>
                </select>
                <select name="espe[2]" size="1" >
                <option value="fina" selected="selected">Fina</option>
                <option value="normal">Normal</option>
                </select>
                <select name="ext[2]" size="1">
                <option value="jamon" selected="selected">Jamon</option>
                <option value="queso">Queso</option>
                <option value="cebolla">Cebolla</option>
                <option value="pollo">Pollo</option>
                </select>
                <br>

                <input type="text" name="numpizza[]" size=1 value="<?= $numero[3] ?>">  4 QUESOS          
                <select name="tam[3]" size="1" >
                <option value="normal" selected="selected">Normal</option>
                <option value="grande">Grande</option>
                <option value="familiar">Familiar</option>
                </select>
                <select name="espe[3]" size="1" >
                <option value="fina" selected="selected">Fina</option>
                <option value="normal">Normal</option>w
                </select>
                <select name="ext[3]" size="1">
                <option value="jamon" selected="selected">Jamon</option>
                <option value="queso">Queso</option>
                <option value="cebolla">Cebolla</option>
                <option value="pollo">Pollo</option>
                </select>
                <br>
                
                <input type="text" name="numpizza[]" size=1 value="<?= $numero[4] ?>">  4 CARBONARA          
                <select name="tam[4]" size="1" >
                <option value="normal" selected="selected">Normal</option>
                <option value="grande">Grande</option>
                <option value="familiar">Familiar</option>
                </select>
                <select name="espe[4]" size="1" >
                <option value="fina" selected="selected">Fina</option>
                <option value="normal">Normal</option>
                </select>
                <select name="ext[4]" size="1">
                <option value="jamon" selected="selected">Jamon</option>
                <option value="queso">Queso</option>
                <option value="cebolla">Cebolla</option>
                <option value="pollo">Pollo</option>
                </select>
                <br>
                
                <input type="text" name="numpizza[]" size=1 value="<?= $numero[5] ?>">  ROMANA         
                <select name="tam[5]" size="1" >
                <option value="normal" selected="selected">Normal</option>
                <option value="grande">Grande</option>
                <option value="familiar">Familiar</option>
                </select>
                <select name="espe[5]" size="1" >
                <option value="fina" selected="selected">Fina</option>
                <option value="normal">Normal</option>w
                </select>
                <select name="ext[5]" size="1">
                <option value="jamon" selected="selected">Jamon</option>
                <option value="queso">Queso</option>
                <option value="cebolla">Cebolla</option>
                <option value="pollo">Pollo</option>
                </select>
                <br>
                
                <input type="text" name="numpizza[]" size=1 value="<?= $numero[6] ?>">  MEDITERRANEA         
                <select name="tam[6]" size="1" >
                <option value="normal" selected="selected">Normal</option>
                <option value="grande">Grande</option>
                <option value="familiar">Familiar</option>
                </select>
                <select name="espe[6]" size="1" >
                <option value="fina" selected="selected">Fina</option>
                <option value="normal">Normal</option>w
                </select>
                <select name="ext[6]" size="1">
                <option value="jamon" selected="selected">Jamon</option>
                <option value="queso">Queso</option>
                <option value="cebolla">Cebolla</option>
                <option value="pollo">Pollo</option>
                </select>
                
                <br>---------------------------------------------------------<br>
                <input type="submit" name="aceptar">	                     

                <?php
    
                    if((strlen($nombre)>0) && (strlen($direccion)>0) && (strlen($correo)>0) && (strlen($telefono)>0) && is_numeric($telefono)){
                        
                    
                
                    if($enviado){
                        $r = false;
                        foreach($numero as $x){
                            if ($x > 0){
                                $r = true;
                                break;
                            }
                        }
                        if ($r){
                            echo "Datos introducidos correctamente";
                        }else{
                            echo "Faltan datos pizzas";
                        }
                    }
                    if ($enviado){

                       echo "<br><br>"; 
                       if (count($numero)>0){

                        echo "<h1>Datos finales: </h1>";                   
                        echo "Datos del cliente: $nombre, $telefono, $correo<br>";                                      
                        echo "<br>";

                           $sumaTotal = 0;

                           foreach($numero as $ky => $val){
                               $nomb = $nomPizza[$ky];
                               $frase = "Numero de ";
                               if ($val > 0){
                                   $frase =  $frase. $nomb." = <strong>". $val. "</strong> "; 

                                    foreach($pizzas as $keypi => $valpi){
                                        if ($nomb == $keypi){
                                            $sumaTotal += $valpi;
                                        }
                                    }
                                    foreach($tamanio as $keyta => $valta){
                                        if ($tam[$ky] == $keyta ){
                                            $sumaTotal += $valta;
                                            $frase =  $frase. "tamaño <strong>".$keyta. "</strong> "; 
                                        }
                                    }
                                   foreach($espesor as $keyesp => $valesp){
                                        if ($espe[$ky] == $keyesp ){
                                            $sumaTotal += $valesp;
                                            $frase =  $frase. "espesor <strong>".$keyesp. " </strong>"; 
                                        }
                                    }
                                   foreach($extra as $keyext => $valext){
                                        if ($ext[$ky] == $keyext ){
                                            $sumaTotal += $valext;
                                            $frase =  $frase. "extra <strong>".$keyext."</strong>"; 
                                        }
                                    }
                                   $sumaTotal *= $val;
                                   echo $frase.".<br>";
                                }
                           }
                           echo "<h3>Total: $sumaTotal €</h3>";      
                           echo "<input type=\"submit\"name=\"aceptar2\" value=\"aceptar\">"."<input type=\"submit\" name=\"cancelar\" value=\"cancelar\">";                         
                       }
                   }
                       
                       echo "<br><br>";
                           
                        if ($ax){
                                echo "<br>La pizza se enviara en 20 min a la direccion: $direccion. Gracias por su compra.<br>";
                                $ax = false;
                            }
                       
                        if ($cex){
                                echo "<br>Se ha cancelado la compra del pedido introduzca las razones de estas:<br>  <textarea id=\"exp\" name=\"experiencia\" cols=\"40\" rows=\"5\"></textarea>";
                                $cex = false;
                            }  
                        
                        }else{
                        echo "Rellene todos los datos personales";
                    }
                ?>
            
        </form>
	</body>
</html>