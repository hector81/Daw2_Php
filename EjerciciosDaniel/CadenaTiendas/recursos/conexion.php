<?php
try {
    $con = new PDO('sqlsrv:Server=localhost;Database=CadenaTiendas;ConnectionPooling=0','','',array(PDO::ATTR_PERSISTENT => true));
    /*
    foreach($con->query('SELECT * from familia') as $fila) {
        print_r($fila);
        
    }
    $con = null; //Cierra la conexión    
    */
   echo 'Conexión Exitosa';
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>