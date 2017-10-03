<?php

class conexion
{
    private $serverName;
    private  $connectionInfo; //, "ReturnDatesAsStrings"=> true


  function __construct()
  {
      $this->serverName =  "C6PC06\sqlexpress";
      $this->connectionInfo = array("Database" => "CadenaTiendas","CharacterSet" => "UTF-8");//,"ReturnDatesAsStrings"=> "true");
  }

  function getConn(){
    return sqlsrv_connect($this->serverName,$this->connectionInfo);
  }

  function ejecutarConsulta($conn,$sql,$parametros = false){
    $cursor;
    if($parametros){
      $cursor = sqlsrv_query($conn,$sql,$parametros);
    }else{
      $cursor = sqlsrv_query($conn,$sql);
    }
    return $cursor;
  }

  public function liberarCursor($stmt){
    sqlsrv_free_stmt($stmt);
  }


}


?>