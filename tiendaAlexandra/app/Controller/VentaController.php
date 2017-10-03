<?php
//Empresa-Programador/Paquete
namespace Amowhi\Cms\Controller;

use Amowhi\Cms\Model\Venta;
use Amowhi\Cms\Repository\VentaRepository;
use Amowhi\Cms\Repository\CarritoRepository;
use Amowhi\Cms\Repository\TiendaRepository;
use Amowhi\Cms\Repository\AlmacenRepository;
use Amowhi\Cms\Core\Utilidades;

class VentaController extends BaseController
{
  private $ventaRepository = null;

  public function __construct()
  {
    $this->ventaRepository = new VentaRepository();
    $this->carritoRepository = new CarritoRepository();
    $this->tiendaRepository = new TiendaRepository();
    $this->almacenRepository = new AlmacenRepository();
  }


  /*LOGISTICA: Función que recibe la disponibilidad de la tienda seleccionada por el cliente,en caso de que la disponibilidad sea 0, revisa el count stock de la central -tienda 1- si el count del stock de la central es menor al count del carrito, significa que la central no tiene disponibilidad de todos o algunos de los productos. Entonces revisa en el resto de tiendas si tienen dispo de los productos del carrito y selecciona la primera tienda que tenga todos los productos.
  En almacen repository descuenta la cantidad de la tienda con disponibilidad y lo añade a la tienda seleccionada.*/
  private function actualizarStocks( $tiendaSeleccionada, $disponibilidad)
  {
    $carrito=$_SESSION['carrito'];
    if($disponibilidad == 0){
    $central=1;
    $countCentral= $this->almacenRepository->idTiendasDispo($carrito,$central);

      if($countCentral == count($carrito)){
          $tiendaConDispo=$central;
      }else{
          $tiendasConDispo = $this->almacenRepository->tiendasConDisponibilidad($carrito);
          $tiendaConDispo = $tiendasConDispo[0]['idTienda'];
      }
    $transaccion=$this->almacenRepository->actualizarStocks($tiendaConDispo, $carrito,$tiendaSeleccionada);

    return $transaccion;
    }
  }

  /*Revisa la fecha de entrega online, la cual se valida desde html con el valor min,
  pero desde esta funcion tambien se recoge el valor para ver si tiene un mínimo de 48 horas
  de diferencia con la fecha de compra. */
  private function validarFechaEntregaOnline($fEntregaOnline)
  {
    $params['error']=false;
    if($fEntregaOnline == date('Y-m-d')|| $fEntregaOnline == date('Y-m-d', strtotime("+1 days")))
    {
    $params['error'] =true;
    }
  return $params['error'];
  }


  /*Funcion que asigna el valor a $params['Entrega'], tras validar si es online o en tienda.
  Si es online validarFechaEntregaOnline valida que la fecha sea posterior a 48 hrs.
  Si es recogida en tienda confirma si será el mismo dia o en 48 horas en caso de que no haya disponibilidad.*/
  private function confirmarFechaEntrega($disponibilidad)
  {
    if(isset($_POST['fechaEntregaOnline'])){
    $params['error']= $this->validarFechaEntregaOnline( $_POST['fechaEntregaOnline']);
      if($params['error']== false){
        $params['fEntrega']=$_POST['fechaEntregaOnline'];}
      }else{
        if($disponibilidad==1){
        $params['fEntrega'] = date('Y-m-d');
        }else{
          $params['fEntrega'] = date('Y-m-d', strtotime("+2 days"));
        }
    }

    return $params['fEntrega'];
  }

/*en funcion aparte no funciona, directamente en datosCompra si funciona
  private function confirmarEstado($envio)
  {
    if(isset($params['cliente']['envio'])){
      if($params['cliente']['envio']=='0' && $params['cliente']['disponibilidad']==0){
        $params['estado']="Recogida en dos días.";
      }elseif($params['cliente']['envio']=='0' && $params['cliente']['disponibilidad']==1){
          $params['estado']="Disponibilidad inmediata.";
      }elseif($params['cliente']['envio']=='5.99'){
          $params['estado']="Entrega en máx.48 horas.";
      }
    }
    return $params['estado'];
  }*/

    /*Utilizo nuevamente la funcion test_unput data ara asegurarme que los datos introduidos por el usuario no contiene posibles amenazas/hacking
    trim — Elimina espacio en blanco (u otros caracteres) del inicio y el final de la cadena
    stripslashes — Quita las barras de un string con comillas escapadas
    htmlspecialchars — Convierte caracteres especiales en entidades HTML, ej: < &lt, & &amp;
    */
  private function test_input($data) {
  $character_mask = " \t\n\r\0\x0B";
  $data = trim($data,$character_mask);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  }

  /*Recoge todos los datos del formulario datos envio y los datos necesario de carrito. Los datos de la tarjeta se validan desde htm, pero al no
  guardarlos en ninguna tabla por seguridad, no guardo los datos. La pasarela de pago verificaría los datos y realizaría el cobro en un programa
  funcional. */
  private function datosCompra()
  {
    $params= [];
    $params['cliente']['nombre'] = Utilidades::test_input($_POST['nombre']);
    $params['cliente']['apellidos'] = Utilidades::test_input($_POST['apellidos']);
    $params['cliente']['direccion'] = Utilidades::test_input($_POST['direccion']);
    $params['cliente']['provincia'] = Utilidades::test_input($_POST['provincia']);
    $params['cliente']['ciudad'] = Utilidades::test_input($_POST['ciudad']);
    $params['cliente']['codPostal'] = Utilidades::test_input($_POST['codigoPostal']);
    $params['cliente']['pais'] = Utilidades::test_input($_POST['pais']);
    $params['cliente']['telefono'] = Utilidades::test_input($_POST['telefono']);
    $params['cliente']['email'] = Utilidades::test_input($_POST['email']);
    $params['cliente']['tiendaSeleccionada']=Utilidades::test_input($_POST['tiendaSeleccionada']);
    $params['cliente']['envio']=Utilidades::test_input($_POST['envio']);
    $params['cliente']['disponibilidad']= Utilidades::test_input($_POST['disponibilidad']);
    $params['idCliente']= $_SESSION['idUsuario'];
    $params['fCompra'] = Utilidades::test_input($_POST['fechaCompra']);
    $params['carrito'] = $_SESSION['carrito'];
    $params['fEntrega']= $this->confirmarFechaEntrega($params['cliente']['disponibilidad']);
    if(isset($params['cliente']['envio'])){
      if($params['cliente']['envio']=='0' && $params['cliente']['disponibilidad']==0){
        $params['estado']="Recogida en dos días.";
      }elseif($params['cliente']['envio']=='0' && $params['cliente']['disponibilidad']==1){
          $params['estado']="Disponibilidad inmediata.";
      }elseif($params['cliente']['envio']=='5.99'){
          $params['estado']="Entrega en máx.48 horas.";
      }
    }
    $params['idesCantidades']= $_SESSION['carrito'];
    $ids=[];
    $cantidades=[];
      foreach($params['idesCantidades'] as $id => $cantidad) {
        $ids[]=$id;
        $cantidades[]=$cantidad;
      }

    $params['info'] = $this->carritoRepository->infoCarrito($ids);
    $total=count($params['info']);
    $pvpTotal=null;
    $pvpUnitario=null;
    $nombres=null;
      for($i=0; $i<$total;$i++){
        $pvpUnitario[]=$params['info'][$i]['PVP'];
        $pvpTotal+=$params['info'][$i]['PVP'];
        $nombres[]=$params['info'][$i]['nombre'];
      }
    $params['articulo']['ides']=$ids;
    $params['articulo']['cantidad']=$cantidades;
    $params['articulo']['nombre']=$nombres;
    $params['articulo']['pvpUnitario']=$pvpUnitario;
    $params['pvpTotal']=$pvpTotal;

    return $params;
  }

  //Función que actualiza stocks, inserta las ventas en las tablas Venta y VentaDetalle, y el envio en la tabla Envios.
  public function confirmarCompra()
  {
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
      $params = $this->datosCompra();
      $params['errors']=Utilidades::validarDatosUsuario($params['cliente']['nombre'], $params['cliente']['apellidos'], $params['cliente']['direccion'], $params['cliente']['provincia'], $params['cliente']['ciudad'], $params['cliente']['codPostal'] ,
      $params['cliente']['pais'],$params['cliente']['telefono'], $params['cliente']['email']);
      if(count($params['errors']) == 0){
        $params['transaccion']=$this->actualizarStocks($params['cliente']['tiendaSeleccionada'],$params['cliente']['disponibilidad']);
        $filasAfectadas=$this->almacenRepository->modificarStock($params['cliente']['tiendaSeleccionada'],$params['carrito']);
          if($filasAfectadas>0){
          $_SESSION['carritoConfirmado'] = [
            'carrito' => $_SESSION['carrito'],
            'envio' => $params['cliente']['envio'],
            'tiendaSeleccionada' => $params['cliente']['tiendaSeleccionada'],
            'disponibilidad' => $params['cliente']['disponibilidad'],
          ];
          unset($_SESSION['carrito']);
          }

        $idVenta=$this->ventaRepository->anadirVenta($params['idCliente'],$params['fCompra'],$params['fEntrega'],$params['pvpTotal']);
        $filasAfectadas= $this->ventaRepository->anadirDetalle($idVenta,$params['articulo'],$params['info']);
        $datosCliente= $this->ventaRepository->anadirEnvio($params['cliente']['nombre'], $params['cliente']['apellidos'], $params['cliente']['direccion'], $params['cliente']['provincia'], $params['cliente']['ciudad'], $params['cliente']['codPostal'] ,
        $params['cliente']['telefono'],$params['cliente']['pais'], $params['cliente']['email'] , $params['cliente']['tiendaSeleccionada'], $params['cliente']['envio'], $params['idCliente'],$idVenta,$params['estado']);
          if($idVenta>0){
          header('Location: /Namespaces/web/index.php?ctl=compraConfirmada&idVenta='.$idVenta);
          }
        }else {
            header('Location: /Namespaces/web/index.php?ctl=carrito&error');
          }
    }else{
      header('Status: 404 Not Found');
      echo '<html><body><h1>Error 404: No existe la ruta <i>' .
            $_GET['ctl'] .
            '</p></body></html>';
      exit;
    }
  }

  //Muestra los datos de Venta, VentaDetalle y Envíos una vez realizada la compra.
  public function compraConfirmada()
  {
    if(isset($_GET['idVenta'])){
    $params['idVenta']= $_GET['idVenta'];

    $params['datosVenta']=$this->ventaRepository->datosTablaVenta($params['idVenta']);
    $params['articulos']=$this->ventaRepository->datosVentaDetalle($params['idVenta']);
    $params['envio']=$this->ventaRepository->datosEnvio($params['idVenta']);
    $params['tienda']=$this->tiendaRepository->getInfoTienda($params['envio'][0]['tiendaSeleccionada']);
    }

   $this->cargarVista('compraConfirmada',$params);
  }

}
