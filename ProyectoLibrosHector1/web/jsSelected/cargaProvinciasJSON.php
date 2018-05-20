<?php

$provincias = [];
include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
$con = (new ConexionBaseDatos)->getConexion();
$sql = "SELECT IdProvincia, NombreProvincia FROM Provincias ORDER BY NombreProvincia ASC;";
try{
    $con->beginTransaction();
    $stmt = $con->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $nIdProvincia= $row['IdProvincia'];
        $provincias[$nIdProvincia]= $row['NombreProvincia'];
    }
    $con->commit();
}catch(PDOException $ex){
  throw $ex;
  $con->rollBack();
}finally{
  $con = null;
  $stmt = null;
}

foreach($provincias as $codigo => $nombre) {
  $elementos_json[] = "\"$codigo\": \"$nombre\"";
}

echo "{".implode(",", $elementos_json)."}"

?>
