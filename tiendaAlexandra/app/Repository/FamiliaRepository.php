<?php
  namespace Amowhi\Cms\Repository;
  use Amowhi\Cms\Core\Database;
  use Amowhi\Cms\Model\Familia;


class FamiliaRepository
{
  private $con = null;
  public function __construct(){
    $this->con = (new Database())->getConexion();
  }

  //Devuelve todos los datos de la familia.
  public function verFamilias()
  {
    $sql="SELECT * FROM familia";
    $cursor=$this->con->prepare($sql);
    $cursor->execute();
    $familias = array();
    while ($fil = $cursor->fetch(\PDO::FETCH_ASSOC))
    { $familias[] = new Familia($fil);
    }
    return $familias;
  }

  //Devuelve la información según el id de la familia. Para la vista articulosPorFamilias
  public function verInfoFamilia($idFamilia)
  {
    $sql="SELECT * FROM familia WHERE id=:idFamilia";
    $cursor=$this->con->prepare($sql);
    $cursor->bindValue(':idFamilia',$idFamilia);
    $cursor->execute();
    while ($fil = $cursor->fetch(\PDO::FETCH_ASSOC))
    { $familia= new Familia($fil);
    }
    return $familia;
  }



}
