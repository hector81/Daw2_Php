<?php

 // Conecta mediante autenticación Windows
 function empezarConexion(){
   try{
       $conexion = new PDO("sqlsrv:Server=(local) ;Database=PizzaNet");//construcctor TRABAJO\SQLEXPRESS sqlsrv:server=(local)
       $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       return $conexion;
       //echo 'Conexión establecida\n<br>';
   }catch(Exception $e){
        die(print_r( $e->getMessage()));
   }
 }





?>
