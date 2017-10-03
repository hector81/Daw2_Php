<?php
  namespace Amowhi\Cms\Repository;
  use Amowhi\Cms\Core\Database;
  use Amowhi\Cms\Model\Venta;


class VentaRepository
{
  private $con = null;
  public function __construct(){
    $this->con = (new Database())->getConexion();
  }

  public function anadirVenta($idCliente,$fCompra,$fEntrega,$pvpTotal)
  {
    $sql="INSERT INTO venta(idCliente, fCompra, fEntrega, PVPTotal) values (:idCliente,:fCompra,:fEntrega,:PVPTotal)";
    $cursor = $this->con->prepare($sql);
    $cursor->bindValue(':idCliente', $idCliente);
    $cursor->bindValue(':fCompra', $fCompra);
    $cursor->bindValue(':fEntrega', $fEntrega);
    $cursor->bindValue(':PVPTotal', $pvpTotal);

    $cursor->execute();
    $idVenta = $this->con->lastInsertId();
    return $idVenta;
  }

  public function anadirDetalle($idVenta,$articulos,$pvpUnitario)
  {
    $sql="INSERT INTO ventaDetalle(idVenta, idArticulo, pvpUnidad, cantidad) values (:idVenta, :idArticulo, :pvpUnidad, :cantidad)";
    $total=count($pvpUnitario);
      for($i=0;$i<$total;$i++){
      $cursor = $this->con->prepare($sql);
      $cursor->bindValue(':idVenta', $idVenta);
      $cursor->bindValue(':idArticulo', $articulos['ides'][$i]);
      $cursor->bindValue(':cantidad', $articulos['cantidad'][$i]);
      $cursor->bindValue(':pvpUnidad', $pvpUnitario[$i]['PVP']);
      $cursor->execute();

    }
      $filasAfectadas = $cursor->rowCount();
      return $filasAfectadas;
  }

  public function anadirEnvio($nombre, $apellidos, $direccion, $provincia, $ciudad, $codPostal,
  $telefono,$pais, $email , $tiendaSeleccionada, $envio, $idCliente,$idVenta,$estado)
  {
    $sql="INSERT INTO envios(idVenta, idUsuario, nombre, apellidos, direccion, provincia, ciudad, codigoPostal,
    telefono,pais, email , tiendaSeleccionada, tipoEnvio,estado) values (:idVenta, :idUsuario, :nombre, :apellidos, :direccion, :provincia, :ciudad, :codigoPostal,
    :telefono,:pais, :email , :tiendaSeleccionada, :tipoEnvio,:estado)";

    $cursor = $this->con->prepare($sql);

    $cursor->bindValue(':idVenta', $idVenta);
    $cursor->bindValue(':idUsuario', $idCliente);
    $cursor->bindValue(':nombre', $nombre);
    $cursor->bindValue(':apellidos', $apellidos);
    $cursor->bindValue(':direccion', $direccion);
    $cursor->bindValue(':provincia', $provincia);
    $cursor->bindValue(':ciudad', $ciudad);
    $cursor->bindValue(':codigoPostal', $codPostal);
    $cursor->bindValue(':telefono', $telefono);
    $cursor->bindValue(':pais', $pais);
    $cursor->bindValue(':email', $email);
    $cursor->bindValue(':tiendaSeleccionada', $tiendaSeleccionada);
    $cursor->bindValue(':tipoEnvio', $envio);
    $cursor->bindValue(':estado',$estado);

    $cursor->execute();
    $idEnvio = $this->con->lastInsertId();
    return $idEnvio;
  }

/*
  public function datosTablaVenta($idVenta)
  {
    $sql="SELECT * from venta WHERE idVenta =:idVenta;";
    $cursor = $this->con->prepare($sql);
    $cursor->bindValue(':idVenta', $idVenta);
    $cursor->execute();
    $datosVenta = $cursor->fetchAll();
    return $datosVenta;
  }*/


  public function datosTablaVenta($idVenta)
  {
  $in = join(',', array_fill(0, count($idVenta), '?'));// ?,?,?,
  $sql="SELECT * from venta WHERE idVenta IN (".$in.")";
  $cursor = $this->con->prepare($sql, array(\PDO::ATTR_CURSOR=>\PDO::CURSOR_SCROLL));
  $cursor->execute((array)$idVenta);
  $datosVenta = array();
  while ($fil = $cursor->fetch(\PDO::FETCH_ASSOC))
  { $datosVenta[] = $fil;
  }

  return $datosVenta;
  }

  public function datosVentaDetalle($idVenta)
  {
    $in = join(',', array_fill(0, count($idVenta), '?'));// ?,?,?,

    $sql="SELECT idVenta, idArticulo, cantidad, pvpUnidad, nombre
    FROM (ventaDetalle
      INNER JOIN articulo ON ventaDetalle.idArticulo = articulo.id)
      WHERE ventaDetalle.idVenta in (".$in.")";
    $cursor = $this->con->prepare($sql, array(\PDO::ATTR_CURSOR=>\PDO::CURSOR_SCROLL));
    $cursor->execute((array)$idVenta);
    $articulos = $cursor->fetchAll();
    return $articulos;
  }

  public function datosEnvio($idVenta)
  {
    $sql="SELECT id,nombre,apellidos, direccion,ciudad,codigoPostal, provincia,pais,telefono,email, tiendaSeleccionada,estado, tipoEnvio = CASE
				WHEN tipoEnvio = '0' THEN 'Recogida en Tienda'
				WHEN tipoEnvio = '5.99' THEN 'Online'
      END
      FROM envios WHERE idVenta=:idVenta";
    $cursor = $this->con->prepare($sql);
    $cursor->bindValue(':idVenta', $idVenta);
    $cursor->execute();
    $envio = $cursor->fetchAll();
    return $envio;
  }

}
