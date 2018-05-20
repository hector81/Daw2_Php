<?php
header("Content-Type: application/xml");

//$municipios["01"]["0014"] = "Alegría-Dulantzi";
$tiendas = [];
include_once __DIR__ . '/../../core/conexionBaseDatos.inc';
$con = (new ConexionBaseDatos)->getConexion();
$sql = "SELECT IdCiudad,IdTienda,Nombre FROM Tiendas ORDER BY Nombre ASC";
try{
    $con->beginTransaction();
    $stmt = $con->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $nIdCiudad = $row['IdCiudad'];
		      $nIdTienda = $row['IdTienda'];
          $tiendas[$nIdCiudad][$nIdTienda]= $row['Nombre'];
    }
    $con->commit();
}catch(PDOException $ex){
  throw $ex;
  $con->rollBack();
}finally{
  $con = null;
  $stmt = null;
}



$municipio = trim($_POST["municipio"]);
$lasTiendas = $tiendas[$municipio];

foreach($lasTiendas as $codigo => $nombre) {
  $elementos_json[] = "\"$codigo\": \"$nombre\"";
}

echo "{".implode(",", $elementos_json)."}"

?>
