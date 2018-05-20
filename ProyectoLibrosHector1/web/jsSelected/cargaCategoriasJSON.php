<?php

$categorias = [];
include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
$con = (new ConexionBaseDatos)->getConexion();
$sql = "SELECT IdCategoria, NombreCategoria FROM Categorias ORDER BY IdCategoria ASC;";
try{
    $con->beginTransaction();
    $stmt = $con->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $n= $row['IdCategoria'];
        $categorias[$n] = $row['NombreCategoria'];
    }
    $con->commit();
}catch(PDOException $ex){
  throw $ex;
  $con->rollBack();
}finally{
  $con = null;
  $stmt = null;
}


foreach($categorias as $codigo => $nombre) {
  $elementos_json[] = "\"$codigo\": \"$nombre\"";
}

echo "{".implode(",", $elementos_json)."}"

?>
