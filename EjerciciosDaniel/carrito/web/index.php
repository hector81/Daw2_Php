<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cargar Foto</title>
    </head>
    <body>
        <?php
        require_once 'appFotoPDO.php';

        if (isset($_REQUEST['accion'])) {

            switch ($_REQUEST['accion']) {

                // Muestra el formulario para subir una foto
                case 'muestraFormularioSubirFoto':
                    try {
                        $sql = "SELECT nombre FROM articulo WHERE id = ?";
                        $getName = $con->prepare($sql);
                        $getName->execute(array($_GET['idProducto']));
                        $nombre = $getName->fetchColumn(0);
                    } catch (Exception $ex) {
                        die(print_r($ex->getMessage()));
                    }
                    muestraFormSubirFoto($_GET['idProducto'], $nombre);
                    break;

                // Sube una foto nueva del producto seleccionado
                case 'subeFoto':
                    $id = $_POST['idProducto'];
                    try {
                        $sql = "UPDATE articulo
                                SET foto = ?
                                WHERE id = ?";
                        $subeFoto = $con->prepare($sql);
                        $fileStream = fopen($_FILES['file']['tmp_name'], "r");
                        $subeFoto->bindParam(1, $fileStream, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
                        $subeFoto->bindParam(2, $id, PDO::PARAM_STR);
                        $subeFoto->execute();
                    } catch (Exception $ex) {
                        die(print_r($ex->getMessage()));
                    }

                    getArticulo($con);
                    break;
            }//Fin del switch
        } else {
            getArticulo($con);
        }
        ?>
    </body>
</html>
