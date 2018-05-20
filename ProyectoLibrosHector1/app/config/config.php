<?php

class Configuracion {
  private $parametrosConfiguracion = [];

  public function __construct(){
      $this->parametrosConfiguracion = [
          'driver' => 'pdo_sqlsrv',
          'server' => '(local)',
          'port' => '1433',
          'database' => 'GestionLibros',
          'user' => null,
          'pass' => null,
          'charset' => 'utf-8'
      ];
  }

  public function getParametros() :array{
      return $this->parametrosConfiguracion;
  }

}



 ?>
