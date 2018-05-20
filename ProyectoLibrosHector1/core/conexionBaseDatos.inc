<?php
require_once __DIR__ . '/../app/config/config.php';

class conexionBaseDatos {
    private $con;

    public function __construct(){
          $parametrosConfig = (new Configuracion())->getParametros();

          try{
            $this->con = new PDO("sqlsrv:server={$parametrosConfig['server']},{$parametrosConfig['port']};
                                    Database={$parametrosConfig['database']}"
                                   ,$parametrosConfig['user'], $parametrosConfig['pass']);
              $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          }catch(PDOException $ex){
              throw $ex;
              die('No se ha podido establecer la conexión.');
              //die("Error de conexión".$ex->getMessage());
          }

    }//fin constructor

    public function getConexion(){
        return $this->con;
    }
}


 ?>
