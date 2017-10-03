<?php
//Empresa-Programador/Paquete
namespace Amowhi\Cms\Controller;

use Amowhi\Cms\Model\Articulo;
use Amowhi\Cms\Repository\ArticuloRepository;
use Amowhi\Cms\Repository\AlmacenRepository;
use Amowhi\Cms\Repository\FamiliaRepository;


class ArticuloController extends BaseController
{
  private $articuloRepository = null;
  private $almacenRepository = null;
  private $familiaRepository = null;


  public function __construct()
  {
    $this->articuloRepository = new ArticuloRepository();
    $this->almacenRepository = new AlmacenRepository();
    $this->familiaRepository = new FamiliaRepository();
  }

  //Muestra los articulos buscando por nombre. Utilizado en el menú superior, muestra la vista buscarArticulo.
  public function listarArticulos()
  {

      $params['nombre'] = $_REQUEST['nombre'];
      $params['art'] =(new ArticuloRepository())->findArticuloByNombre(array($_REQUEST['nombre']));


    $this->cargarVista('buscarArticulo',$params);
  }

  //Muestra la información del articulo buscando por su id, información que recoge en su url mediante un GET.
  //En esta misma función tambien creamos la variable stock, que recoge la información de AlmacenRepository.
  //Utilizado en la vista verArticulo.
  public function verArticulo()
  {
    $id = $_GET['id'];
    $params = $this->articuloRepository->findArticuloById(array($id));
    $params['stock'] = $this->almacenRepository->getStock($id);

    $this->cargarVista('verArticulo', $params);
  }

  //Formulario para cargar una nueva foto, utiliza la función actualizarFoto de ArticuloRepository.
  //Utilizado en la vista nuevaFoto.
  public function nuevaFoto()
  {
    $params = array('id' => $_REQUEST['id'],
                    'foto' => '',
                    'nombre' => $_REQUEST['nombre']
                  );
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $params['foto'] = fopen($_FILES['file']['tmp_name'], "r");
      $actualizada=$this->articuloRepository->actualizaFoto($params);
      if($actualizada>0){
        header('Location: /Namespaces/web/index.php?ctl=nuevaFoto&id='.$params['id'].'&nombre='.$params['nombre'].'&actualizada');
      }
    }
    $this->cargarVista('nuevaFoto',$params);
  }

  //Muestra los articulos y la información por familia.
  //Utiliza la información de $params['art'] que recibe de ArticuloRepository y de la tabla Familia que recibe de FamiliaRepository.
  //Utilizado en la vista articulosPorFamilias.
  public function listarArticulosPorFamilias()
  {
    $params = array('mensaje' => '<h2>Bienvenido a Cadena Tiendas Media</h2>',
                      'fecha' => date('d-m-Y'),);
    $params['idFamilia'] = $_GET['idFamilia'];
    $params['art']= $this->articuloRepository->articulosPorFamilias($params['idFamilia']);
    $params['infoFamilia']= $this->familiaRepository->verInfoFamilia($params['idFamilia']);

    $this->cargarVista('articulosPorFamilias',$params);
  }

}
