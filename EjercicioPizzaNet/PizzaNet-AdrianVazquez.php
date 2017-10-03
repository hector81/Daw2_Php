<?php
$enviado = (isset($_POST["aceptar"]))?true:false;


if(empty($_POST["nombre"])){
    $nombreCorrecto = false;
}else{
    $nombreCorrecto = true;
}
if(empty($_POST["direccion"])){
    $direccionCorrecto = false;
}else{
    $direccionCorrecto = true;
}
if(empty($_POST["telefono"])){
    $telefonoCorrecto = false;
}else{
    $telefonoCorrecto = true;
}

$aPizzas = array(
    "Margarita" => "3.5",
    "Barbacoa" => "5",
    "4 estaciones" => "3.5",
    "4 quesos" => "4",
    "Carbonara" => "3",
    "Romana" => "2.5",
    "Mediterranea" => "6",
);

$aTamano = array(
    "Normal" => "1",
    "Grande" => "2",
    "Familiar" => "3",
);

$aMasa = array(
    "Fina" => "1",
    "Normal" => "2",
);

$aExtras = array(
    "Queso" => "0.5",
    "Pimiento" => "1",
    "Cebolla" => "0.25",
    "Jamon" => "1.5",
    "Pollo" => "1",
);


if($enviado){
    foreach($aPizzas as $k => $v){
        if($_POST['pizza'] == "Margarita" && $k == "Margarita"){
            $pPizza = $v;
        }
        if($_POST['pizza'] == "Barbacoa" && $k == "Barbacoa"){
            $pPizza = $v;
        }
        if($_POST['pizza'] == "4 estaciones" && $k == "4 estaciones"){
            $pPizza = $v;
        }
        if($_POST['pizza'] == "4 quesos" && $k == "4 quesos"){
            $pPizza = $v;
        }
        if($_POST['pizza'] == "Carbonara" && $k == "Carbonara"){
            $pPizza = $v;
        }
        if($_POST['pizza'] == "Romana" && $k == "Romana"){
            $pPizza = $v;
        }
        if($_POST['pizza'] == "Mediterranea" && $k == "Mediterranea"){
            $pPizza = $v;
        }
    }

    foreach($aTamano as $k => $v){
        if($_POST['tamano'] == "Normal" && $k == "Normal"){
            $pTamano = $v;
        }
        if($_POST['tamano'] == "Grande" && $k == "Grande"){
            $pTamano = $v;
        }
        if($_POST['tamano'] == "Familiar" && $k == "Familiar"){
            $pTamano = $v;
        }
    }

    foreach($aMasa as $k => $v){
        if($_POST['masa'] == "Fina" && $k == "Fina"){
            $pMasa = $v;
        }
        if($_POST['masa'] == "Normal" && $k == "Normal"){
            $pMasa = $v;
        }
    }
    
    $pExtra =0;

    foreach($aExtras as $k => $v){
        if(isset($_POST['extra1']) && $_POST['extra1'] && $k == "Queso"){
            $pExtra += $v;
        }
        if(isset($_POST['extra2']) && $_POST['extra2'] && $k == "Pimiento"){
            $pExtra += $v;
        }
        if(isset($_POST['extra3']) && $_POST['extra3'] && $k == "Cebolla"){
            $pExtra += $v;
        }
        if(isset($_POST['extra4']) && $_POST['extra4'] && $k == "Jamon"){
            $pExtra += $v;
        }
        if(isset($_POST['extra5']) && $_POST['extra5'] && $k == "Pollo"){
            $pExtra += $v;
        }
    }
}
?>

<html>
    <head>
        <title>PizzaNet</title>
    </head>
    <body>
        <?php
        if($enviado && $nombreCorrecto && $direccionCorrecto && $telefonoCorrecto){
        ?>
        <center>
            <?php
            echo ("Pizza: ".$_POST['pizza'] . " precio: ".$pPizza."€<br>");
            echo ("Tamaño: ".$_POST['tamano'] . " precio: ".$pTamano."€<br>");
            echo ("Masa: ".$_POST['masa'] . " precio: ".$pMasa."€<br>");
            echo ("Extras elegidos: ");

            if(isset($_POST['extra1'])){
                echo $_POST['extra1'];
                echo (" ".$aExtras['Queso']."€, ");
            }
            if(isset($_POST['extra2'])){
                echo $_POST['extra2'];
                echo (" ".$aExtras['Pimiento']."€, ");

            }
            if(isset($_POST['extra3'])){
                echo $_POST['extra3'];
                echo (" ".$aExtras['Cebolla']."€, ");

            }
            if(isset($_POST['extra4'])){
                echo $_POST['extra4'];
                echo (" ".$aExtras['Jamon']."€, ");

            }
            if(isset($_POST['extra5'])){
                echo $_POST['extra5'];
                echo (" ".$aExtras['Pollo']."€, ");
            }
            ?>
        </center>
        <input type="submit" name="confirmar" value="Confirmar">
        <?php
            if(isset($_POST['confirmar'])){
                echo ("OK");
            }
        }else{
        ?>
        <form method="post" action="<?= $_SERVER['PHP_SELF']?>">
            <fieldset>
                <legend>Datos usuario</legend>
                Nombre:
                <input type="text" name="nombre" value="">
                <?php
            if($nombreCorrecto == false && $enviado){
                echo ("Campo obligatorio");
            }
                ?>
                <br>
                <br>
                Direccion:
                <input type="text" name="direccion" value="">
                <?php
            if($direccionCorrecto == false && $enviado){
                echo ("Campo obligatorio");
            }
                ?>
                <br><br>
                Telefono:
                <input type="text" name="telefono" value="">
                <?php
            if($telefonoCorrecto == false && $enviado){
                echo ("Campo obligatorio");
            }
                ?>
                <br><br>
            </fieldset>
            <br>
            <fieldset>
                <legend>Pizzas</legend>
                Pizza:
                <select name="pizza" value="">
                    <option>Margarita</option>
                    <option>Barbacoa</option>
                    <option>4 estaciones</option>
                    <option>4 quesos</option>
                    <option>Carbonara</option>
                    <option>Romana</option>
                    <option>Mediterranea</option>
                </select>
                <br><br>
                Tamaño:
                <select name="tamano" value="">
                    <option>Normal</option>
                    <option>Grande</option>
                    <option>Familiar</option>
                </select>
                <br><br>
                Masa:
                <select name="masa" value="">
                    <option>Fina</option>
                    <option>Normal</option>
                </select>
                <br><br>
                Extras:
                <input type="checkbox" name="extra1" value="Queso">Queso (0.5€)
                <input type="checkbox" name="extra2" value="Pimiento">Pimiento (1€)
                <input type="checkbox" name="extra3" value="Cebolla">Cebolla (0.25€)
                <input type="checkbox" name="extra4" value="Jamon">Jamon (1.5€)
                <input type="checkbox" name="extra5" value="Pollo">Pollo (1€)
            </fieldset>
            <br><br>
            <input type="submit" name="aceptar" value="Aceptar">
        </form>
        <?php
        }
        ?>
    </body>
</html>