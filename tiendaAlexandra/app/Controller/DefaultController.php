<?php
namespace Amowhi\Cms\Controller;

use Amowhi\Cms\Repository\ArticuloRepository;

//Controlador por defecto, muestra la vista de inicio.
class DefaultController extends BaseController
{
  private $articuloRepository = null;

  public function __construct()
  {
    $this->articuloRepository = new ArticuloRepository();
  }

  //Función que muestra los productos y su stock.
   public function inicio()
   {
   $params = array('mensaje' => 'Bienvenido a Cadena Tiendas Media',
                    'fecha' => date('d-m-Y'),);
   $params['art']=$this->articuloRepository->mostrarArticulosInicio();

   $this->cargarVista('inicio', $params);
  }

}
