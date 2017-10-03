<?php
/**
app: Contiene todas las clases que manejan el programa. Utiliza Namespaces gracias al uso de autoloader.
Controller: Es el controlador de las vistas y la información que se muestra en las mismas. Puede existir un sólo controlador,
aunque es mejor separarlos según la tabla o vista que manejan, a libre disposición del programador (puedes tener uno o todos los que quieras).
Un mismo controlador puede llamar al repositorio del mismo nombre u otro repositorio si necesita la información para la vista.
**/

//Empresa-Programador/Paquete
namespace Amowhi\Cms\Controller;

use Amowhi\Cms\Model\Almacen;
use Amowhi\Cms\Repository\AlmacenRepository;

//Controla todas las interacciones relacionadas con el almacen
class AlmacenController extends BaseController
{
  private $almacenRepository = null;

  public function __construct(){
    $this->almacenRepository = new AlmacenRepository();
  }

  /*public function verStock()
  { $idArticulo = $_GET['id'];
    $params['stock'] = $this->almacenRepository->getStock($idArticulo);

    $this->cargarVista('verArticulo',$params);
  }*/

}
