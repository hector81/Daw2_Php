<?php
//Empresa-Programador/Paquete
namespace Amowhi\Cms\Controller;

use Amowhi\Cms\Model\Tienda;
use Amowhi\Cms\Repository\TiendaRepository;

class TiendaController extends BaseController
{
  private $tiendaRepository = null;

  public function __construct(){
    $this->tiendaRepository = new TiendaRepository();
  }

}
