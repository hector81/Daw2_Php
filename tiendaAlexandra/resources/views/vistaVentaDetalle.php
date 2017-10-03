<?php ob_start();?>

<table class='table table-striped table-hover'>
  <tr>
    <th>Id Venta</th>
    <th>PVP Total</th>
    <th>Fecha Compra</th>
    <th>Fecha Entrega</th>
    <th>Localizador<br>envío</th>
    <th>Datos envío</th>
    <th>Tipo Envio</th>
    <th>Estado</th>
  </tr>
    <tr>
      <td><?=$params['datosVenta'][0]['idVenta']?></a></td>
      <td><?= number_format($params['datosVenta'][0]['PVPTotal'], 2);?>€</td>
      <td><?= date('d-m-Y',strtotime($params['datosVenta'][0]['fCompra']))?></td>
      <td><?= date('d-m-Y',strtotime($params['datosVenta'][0]['fEntrega']))?></td>
      <td><?=$params['envio'][0]['id']?></td>
      <td><?= $params['envio'][0]['nombre']?>
      <?= $params['envio'][0]['apellidos']?><br>
      <?= $params['envio'][0]['direccion']?>
      <?= $params['envio'][0]['ciudad']?>
      <?= $params['envio'][0]['codigoPostal']?>
      <?= $params['envio'][0]['provincia']?>
      <?= $params['envio'][0]['pais']?><br></td>
      <td><?= $params['envio'][0]['tipoEnvio']?></td>
      <td><?= $params['envio'][0]['estado']?></td>
    </tr>
</table>
<table border= '2px' class='table table-striped table-hover'>
  <tr>
  <th colspan='5'>Detalles pedido idVenta <?= $params['articulos'][0]['idVenta']?>:</th>
</tr>
  <tr>
    <th colspan='2'>Nombre</th>
    <th>Pvp Unitario</th>
    <th>Cantidad</th>
    <th>Subtotal</th>
  </tr>
  <?php foreach ($params['articulos'] as $articulo) :
    $subtotal= $articulo['pvpUnidad']*$articulo['cantidad'];?>
    <tr>
      <td colspan='2'><?= $articulo['nombre']; ?></td>
      <td><?= number_format ( $articulo['pvpUnidad'], 2) ?>€ </td>
      <td><?= $articulo['cantidad']; ?></td>
      <td><?= number_format($subtotal,2); ?>€ </td>
    </tr>
  <?php endforeach;?>
</table>
<a href="index.php?ctl=misPedidos">Volver al listado</a>

<?php $contenido= ob_get_clean();
include __DIR__ . '.\..\layout\base.php';?>
