<!DOCTYPE html>
<html>
    <head>
        <title>Ejer2</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form name="input" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            Altura m: <input type="text" name="n1"><br>
            Cilindro m: <input type="text" name="n2"><br>
            <input type="submit" name="calcular" value="calcular">
        </form>
        <?php
        if (isset($_POST['calcular'])) {
            if ((empty($_POST['n1']) && isset($_POST['n1']) || !is_numeric($_POST['n1']))|| (isset($_POST['n1']) && empty($_POST['n2'])|| !is_numeric($_POST['n2']))) {
                echo "Algun campo esta vacio o no es numerico <br>";
            } else {
                $n1 = $_POST['n1'];
                $n2 = $_POST['n2'];
                echo "Volumen del cilintro son: " . pi() * pow(($n2 / 2), 2) * $n1 . " cm3 </br>";
            }
        }
        ?>
    </body>
</html>


