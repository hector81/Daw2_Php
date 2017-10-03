<?php

namespace Amowhi\Cms\Controller;

use Amowhi\Cms\Model\Carrito;
use Amowhi\Cms\Repository\CarritoRepository;
use Amowhi\Cms\Repository\AlmacenRepository;
use Amowhi\Cms\Repository\TiendaRepository;
//use Amowhi\Cms\Core\Database;

//Controlador del carrito y la vista carrito.
class CarritoController extends BaseController
{
  private $carritoRepository = null;
  private $almacenRepository = null;
  private $tiendaRepository = null;

  public function __construct()
  {
    $this->carritoRepository = new CarritoRepository();
    $this->almacenRepository = new AlmacenRepository();
    $this->tiendaRepository = new TiendaRepository();
  }

  //Añade los articulos al carrito.
   public function anadirCarrito()
   {
     //Inicializa el arrayCarrito vacio siemre y cuando no haya session de carrito iniciada
     if(isset($_SESSION['carrito']) == false) {
     $_SESSION['carrito'] = [];
     }
     if($_SERVER['REQUEST_METHOD']=='POST') {
      if (isset($_POST['id']) && $_POST['cantidad']>=1){
        $idProducto=$_POST['id'];
        /*al pulsar en añadir al carrito comprobamos si el id del articulo ya existe en el carrito. Si no existe reservamos el espacio
        para añadir la cantidad después. */
        if(isset($_SESSION['carrito'][$idProducto]) == false){
          $_SESSION['carrito'][$idProducto] = 0;
        }
         $_SESSION['carrito'][$idProducto] += $_POST['cantidad'];
       }
     }
     $this->verCarrito();
   }
   /* $_SESSION['carrito'] = [ 'id' => cantidad
                               '23' => 1,
                               '34' => 7,
                               '13' => 2, ]
   */


  /*Permite modificar la cantidad en el mismo carrito. Formulario modificarCarrito de la vista carrito.
  No solicita información de repository ni update de la BBDD porque aún no se ha ejecutado la modificación,
  hasta que se confirme la compra.*/
  public function modificarCantidad()
  {
    if($_SERVER['REQUEST_METHOD']=='POST') {
      $id=$_POST['id'];
      $cantidad=$_POST['cantidad'];
      $_SESSION['carrito'][$id] = $cantidad;
    }
    header('Location: /Namespaces/web/index.php?ctl=carrito&cambioCantidad');
  }

  /*Permite eliminar articulos del carrito. Formulario eliminarProducto de la vista carrito.
  No solicita información de repository ni update de la BBDD porque aún no se ha ejecutado la modificación,
  hasta que se confirme la compra.*/
  public function eliminarProducto()
  {
    if($_SERVER['REQUEST_METHOD']=='POST') {
      $id=$_POST['id'];
      unset($_SESSION['carrito'][$id]);
      header('Location: /Namespaces/web/index.php?ctl=carrito&eliminarProducto');
    }else {
      header('Status: 404 Not Found');
        echo '<html><body><h1>Error 404: No existe la ruta <i>' .
              $_GET['ctl'] .
              '</p></body></html>';
      exit;
  }

  }

 //Todas las funciones privadas devuelven un valor, que es utilizado posteriormente en verCarrito que devuelve la vista carrito.
  //Función que recoge las ids de la sesion.
  private function getIds()
  {
      $ids=[];
      if(isset($_SESSION['carrito'])){
        foreach ($_SESSION['carrito'] as $id => $cantidad) {
          $ids[]=$id;
        }
      }
      return $ids;
  }

  //Función que añade las cantidades a cada id.
  private function anadirCantidades($articulos)
  {
    $articulosConCantidad = [];
    foreach ($articulos as $articulo) {
        $articulo['cantidad'] = $_SESSION['carrito'][$articulo['id']];
        $articulosConCantidad[] = $articulo;
        //lo de arriba sería lo mismo que: array_push($articulosConCantidad, $articulo);
    }
    return $articulosConCantidad;
  }

  //Muestra los datos de la/s tienda/s según su id. Para ello contacta con TiendaRepository.
  private function verTiendas($idTiendas)
  {
    $idT=[];
    $total=count($idTiendas);
    for($i=0;$i<$total;$i++){
      $idT[]=$idTiendas[$i];
    }
    $infoTiendas=$this->tiendaRepository->getInfoTienda($idT);

    return $infoTiendas;
  }

  //Muestra los datos de todas las tiendas.
  private function verDatosTiendas()
  {
    $datosTiendas=$this->tiendaRepository->getAllTiendas();

    return $datosTiendas;

  }

  //Devuelve la tienda Seleccionada por el usuario en el formulario seleccionar Tienda de la vista carrito
  private function seleccionarTienda()
  {
    //Asigno a $tiendaSeleccionada 1 por defecto que es la id de la central. En caso de que sea compra online descontará de ahi.
    $tiendaSeleccionada=1;
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['tiendaSeleccionada'])){
       $tiendaSeleccionada=$_POST['tiendaSeleccionada'];
    }
    return $tiendaSeleccionada;
  }


  private function getDatosAlmacenTiendas($tiendaSeleccionada)
  {
    $datosAlmacen=$this->almacenRepository->getDatosAlmacen($tiendaSeleccionada);

    return $datosAlmacen;
  }

  /*Comprueba si hay disponibilidad de los productos del carrito en la tienda Seleccionada por el usuario.
  Con la información de disponibilidad informamos al usuario si puede recoger su compra el mismo dia o en 2 días.*/
  private function confirmarStockyEnvio($tiendaSeleccionada)
  {
    $disponibilidad = false;
    $countAlmacen= $this->almacenRepository->idTiendasDispo($_SESSION['carrito'], $tiendaSeleccionada);
    if(count($_SESSION['carrito']) == $countAlmacen){
    $disponibilidad = true;
    }
    return $disponibilidad;
  }

  //Devuelve los gastos de envío seleccionados por el cliente (recoger en tienda u online)
  private function gastosEnvio()
  {//Recogida en tienda:
    $envio='0';
    if($_SERVER['REQUEST_METHOD']=='POST'){
      //Si aún no han seleccionado tipo de compra será tienda por defecto.
      if (isset($_POST['compra']) && $_POST['compra']=='Online') {
      $envio='5.99';
      }
    }
  return $envio;
  }

  //Vista carrito, donde se recogen los datos de las funciones anteriores para generar la vista con la información necesaria.
  public function verCarrito()
  {
    $ids = $this->getIds();
    $articulos = $this->carritoRepository->infoCarrito($ids);
    $params['art'] = $this->anadirCantidades($articulos);
    if(count($ids) > 0){
    $params['tiendas']=$this->verDatosTiendas();
    $params['tiendaSeleccionada']=$this->seleccionarTienda();
    $params['disponibilidad']=$this->confirmarStockyEnvio($params['tiendaSeleccionada']);
    }
    $params['envio']= $this->gastosEnvio();

    $this->cargarVista('carrito',$params);
  }


  /*Al confirmar el carrito recoge la información necesara y uestra la vista confirmarDatosEnvio donde
  el cliente puede modificar la dirección de envío (por defecto se muestra la direccion del usuario registrado)
  y cambiar el nombre de la persona que lo va a recibir. La información se guarda en la tabla envíos pero
  no se modifica la dirección en la tabla usuario.*/
  public function confirmarDatosEnvio()
  { if(!isset($_SESSION['carrito'])){
    header('Location: /Namespaces/web/index.php?ctl=carrito');
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
      if($_SESSION['grupo']=='clientes'){
        $params['disponibilidad'] = $_POST['disponibilidad'];
        $params['tiendaSeleccionada']=$_POST['tiendaSeleccionada'];
        $params['envio']=$_POST['envio'];
        $params['infoTienda'] = $this->verTiendas($params['tiendaSeleccionada']);
        $params['carrito'] =$_SESSION['carrito'];
      }else{
      header('Location: /Namespaces/web/index.php?ctl=iniciaSesion&confirmaCarrito');}
    }else{
        header('Status: 404 Not Found');
          echo '<html><body><h1>Error 404: No existe la ruta <i>' .
                $_GET['ctl'] .
                '</h1></body></html>';
          exit;
    }
    $this->cargarVista('confirmarDatosEnvio', $params);

  }

}
