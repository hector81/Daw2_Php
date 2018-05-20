<?php
header("Content-Type: application/xml");

//$municipios["01"]["0014"] = "Alegría-Dulantzi";
$municipios = [];
include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
$con = (new ConexionBaseDatos)->getConexion();
$sql = "SELECT IdProvincia, IdCiudad, NombreCiudad FROM Ciudades ORDER BY NombreCiudad ASC;";
try{
    $con->beginTransaction();
    $stmt = $con->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $nIdProvincia= $row['IdProvincia'];
		      $nIdCiudad= $row['IdCiudad'];
          $municipios[$nIdProvincia][$nIdCiudad]= $row['NombreCiudad'];
    }
    $con->commit();
}catch(PDOException $ex){
  throw $ex;
  $con->rollBack();
}finally{
  $con = null;
  $stmt = null;
}



$provincia = trim($_POST["provincia"]);
$losMunicipios = $municipios[$provincia];

foreach($losMunicipios as $codigo => $nombre) {
  $elementos_json[] = "\"$codigo\": \"$nombre\"";
}

echo "{".implode(",", $elementos_json)."}"

?>
