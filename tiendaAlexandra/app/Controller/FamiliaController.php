<?php
//Empresa-Programador/Paquete
namespace Amowhi\Cms\Controller;

use Amowhi\Cms\Model\Familia;
use Amowhi\Cms\Repository\FamiliaRepository;


class FamiliaController extends BaseController
{
  private $familiaRepository = null;

  public function __construct(){
    $this->$familiaRepository = new FamiliaRepository();
  }



}
