<!DOCTYPE html>
<html>
    <head>
        <title>Formulaio Web</title>
        <style>
            td{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <form name="input" action="" method="post"><center>
            <table border="1">  
                <tr>
                    <td><input type="text" name="n1"></td>
                    <td><input type="text" name="n2"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="enviar" value="Enviar"></td>
                </tr> 
            </table>
        </form>
        <br>
        <table>
        <?php
            if(isset($_POST['enviar'])){
                $n1 = $_POST['n1'];
                $n2 = $_POST['n2']; 
                echo "<tr><td>Suma: </td><td>" . ($n1 + $n2) . "</td></tr>";
                echo "<tr><td>Resta: </td><td>" . ($n1 - $n2) . "</td></tr>";
                echo "<tr><td>Multiplicacion: </td><td>" . $n1 * $n2 . "</td></tr>";
                echo "<tr><td>Division real: </td><td>" . $n1 / $n2 . "</td></tr>";
                echo "<tr><td>Division entera: </td><td>" . floor($n1 / $n2) . "</td></tr>";
                echo "<tr><td>Resto: </td><td>" . $n1 % $n2 . "</td></tr>";
            }
        ?>
        </table></center>
    </body>
</html>