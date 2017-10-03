<?php ob_start();
$pedidos=count($params['envio']);
if($pedidos>0){?>
<div class="row">
  <div class="col-md-8">
<h1> Mis Pedidos</h1>
  </div>
  <div class="col-md-4">
    <h3>Tus pedidos a fecha <?=date('d-m-Y');?></h3>
  </div>
</div>
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
  <?php
  $total=count($params['datosVenta']);
  for($i=0;$i<$total;$i++):?>
    <tr>
      <td><a href='index.php?ctl=vistaVentaDetalle&detalles=<?= $params['datosVenta'][$i]['idVenta']?>'><?=$params['datosVenta'][$i]['idVenta']?></a></td>
      <td><?= number_format($params['datosVenta'][$i]['PVPTotal'], 2);?>€</td>
      <td><?= date('d-m-Y',strtotime($params['datosVenta'][$i]['fCompra']))?></td>
      <td><?= date('d-m-Y',strtotime($params['datosVenta'][$i]['fEntrega']))?></td>
      <td><?=$params['envio'][$i]['id']?></td>
      <td><?= $params['envio'][$i]['nombre']?>
      <?= $params['envio'][$i]['apellidos']?><br>
      <?= $params['envio'][$i]['direccion']?>
      <?= $params['envio'][$i]['ciudad']?>
      <?= $params['envio'][$i]['codigoPostal']?>
      <?= $params['envio'][$i]['provincia']?>
      <?= $params['envio'][$i]['pais']?><br></td>
      <td><?= $params['envio'][$i]['tipoEnvio']?></td>
      <td><?= $params['envio'][$i]['estado']?></td>
    </tr>
  <?php endfor;?>
</table>
<?php
}else{?>
  <h2>No hay pedidos realizados. </h2>
<?php }
 $contenido = ob_get_clean();
include __DIR__ . '/../layout/base.php';
