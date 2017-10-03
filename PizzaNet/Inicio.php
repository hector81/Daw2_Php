<?php
if (isset($_POST['agregar']) && !empty($_POST['nombre']) && !empty($_POST['direccion']) && !empty($_POST['telefono'])) {
    include 'Cliente.php';
    session_start();
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $cliente1 = new Cliente($nombre, $direccion, $telefono);
    $_SESSION['cliente1'] = serialize($cliente1);
    header('Location: formulario.php');
    exit();
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>PizzaNet</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <center>  
        <form name="input" action="#" method="POST">
            <table border="1">
                <tr>
                    <td <?php echo (empty($_POST['nombre'])) && isset($_POST['nombre']) ? "style='color:red'" : '' ?>>Nombre:</td>
                    <td><input type="text" name="nombre" value="<?php echo!empty($_POST['nombre']) && isset($_POST['nombre']) ? $_POST['nombre'] : '' ?>" ></td>
                </tr>
                <tr>
                    <td <?php echo (empty($_POST['direccion'])) && isset($_POST['direccion']) ? "style='color:red'" : '' ?>>Direccion: </td>
                    <td><input type="text" name="direccion" value="<?php echo!empty($_POST['direccion']) && isset($_POST['direccion']) ? $_POST['direccion'] : '' ?>" ></td>
                </tr>
                <tr>
                    <td <?php echo (empty($_POST['telefono'])) && isset($_POST['telefono']) ? "style='color:red'" : '' ?>>Telefono: </td>
                    <td><input type="number" name="telefono" value="<?php echo!empty($_POST['telefono']) && isset($_POST['telefono']) ? $_POST['telefono'] : '' ?>"  ></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="agregar" value="Pedir Pizza">
                    </td>
                </tr> 
            </table>
        </form>
    </center>
</body>
</html>
