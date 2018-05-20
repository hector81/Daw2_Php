<?php

$subcategorias = [];
include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
$con = (new ConexionBaseDatos)->getConexion();
$sql = "SELECT IdCategoria,IdSubCategoria, NombreSubCategoria FROM SubCategorias ORDER BY IdCategoria ASC;";
try{
    $con->beginTransaction();
    $stmt = $con->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $nIdCategoria= $row['IdCategoria'];
        $nIdSubCategoria= $row['IdSubCategoria'];
        $subcategorias[$nIdCategoria][$nIdSubCategoria]= $row['NombreSubCategoria'];
    }
    $con->commit();
}catch(PDOException $ex){
  throw $ex;
  $con->rollBack();
}finally{
  $con = null;
  $stmt = null;
}

$categorias = trim($_POST["categoria"]);
$listaSubcategorias = $subcategorias[$categorias];

foreach($listaSubcategorias as $codigo => $nombre) {
  $elementos_json[] = "\"$codigo\": \"$nombre\"";
}

echo "{".implode(",", $elementos_json)."}"

?>
