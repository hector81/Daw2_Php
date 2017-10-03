<?php
namespace Amowhi\Cms\Core;



class Database
{ private $con=null;

  public function __construct()
  { $params = (new Configuracion())->getDbParams();
    //$uid = file_get_contents("C:\AppData\uid.txt");
    //$pwd = file_get_contents("C:\AppData\pwd.txt");
    try
    /*Al indicar new, le decimos al lenguaje que cree una instancia de la clase con el nombre indicado. Php busca dicho nombre
    en el Namespace en curso, salvo que encuentre un use en dicha clase indicandole un Namespace diferente. Al añadir la barra
    invertida estamos indicando que se trata de una clase propia del lenguaje, que no requiere Namespace.*/
    { $this->con = new \PDO("sqlsrv:server={$params['server']},{$params['port']};Database={$params['database']}", //$uid, $pwd);
                           $params['user'], $params['pass']);
      $this->con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }catch(\PDOException $ex)
    { die("Error de conexión".$ex->getMessage());
    }
  }

  public function getConexion()
  { return $this->con;
  }
}
