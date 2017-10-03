<?php

include __DIR__ . '/../config/autoload.php';

 // Consigue la foto del producto de un Id de producto dado
 try
 { $sql = "SELECT foto
              FROM articulo
             WHERE id = ?";
   $con = (new Amowhi\Cms\Core\Database())->getConexion();
   $cursor = $con->prepare($sql);
   $cursor->execute(array($_GET['productId']));
   $cursor->bindColumn(1, $imagen, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
   $cursor->fetch(PDO::FETCH_BOUND);
   echo $imagen;
 }catch(Exception $ex)
 { die(print_r($ex->getMessage()));
 }
?>
