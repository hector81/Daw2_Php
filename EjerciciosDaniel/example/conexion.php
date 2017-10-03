<?php
  $serv = "(local)\sqlexpress";

  // Conecta usando autenticación Windows
  class conexion{
	  public static function connect(){
		try
		{ return new PDO("sqlsrv:server=localhost ; Database=AdventureWorks2012", "", "", array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}catch(Exception $ex)
		{ die(print_r($ex->getMessage()));
		}
	  }
  }
  
?>