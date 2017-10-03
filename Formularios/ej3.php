<!DOCTYPE html>
<html>
    <head> 
        <title>Producto</title>
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
                    <td>Tienda 1: </td>
                    <td><input type="text" name="t1"></td>
                </tr>
                <tr>
                    <td>Tienda 2: </td>
                    <td><input type="text" name="t2"></td>
                </tr>
                <tr>
                    <td>Tienda 3: </td>
                    <td><input type="text" name="t3"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="calcular" value="Calcular"></td>
                </tr> 
            </table>
        </form>
        <br>
        <table>
        <?php
            if(isset($_POST['calcular'])){
                $t1 = $_POST['t1'];
                $t2 = $_POST['t2']; 
                $t3 = $_POST['t3']; 
                echo "<tr><td>Media: </td><td>" . ($t1 + $t2 + $t3)/3 . " €</td></tr>";
            }
        ?>
        </table></center>
    </body>
</html>