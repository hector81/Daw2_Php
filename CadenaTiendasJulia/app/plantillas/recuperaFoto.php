<?php
  $sql = "SELECT foto
            FROM articulo
           WHERE id = ?";
  include __DIR__ . '/../../core/conexionBd.php';
  $con = (new ConexionBd())->getConexion();
  try
  { $cursor = $con->prepare($sql);

    $cursor->execute(array($_GET['id']));
    $cursor->bindColumn(1, $imagen, PDO::PARAM_LOB, 0, PDO::SQLSRV_ENCODING_BINARY);
    $cursor->fetch(PDO::FETCH_BOUND);
    echo $imagen;

  }catch (Exception $ex)
  { die(print_r($ex->getMessage()));
  }

?>
