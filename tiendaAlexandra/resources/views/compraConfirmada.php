
<?php ob_start();?>
<h1 class='center'>¡Compra confirmada!</h1>
  <table class='table table-striped table-hover'>
      <tr>
        <th>idVenta</th>
        <th>idCliente</th>
        <th>Fecha de Compra</th>
        <th>Fecha de Entrega</th>
        <th>PVP Total</th>
      </tr>
      <tr>
        <td><a href='index.php?ctl=compraConfirmada&idVenta=<?=$params['datosVenta'][0]['idVenta'];?>&detalles'><?= $params['datosVenta'][0]['idVenta']?></a></td>
        <td><?= $params['datosVenta'][0]['idCliente']?></td>
        <td><?= date('d-m-Y',strtotime($params['datosVenta'][0]['fCompra']))?></td>
        <td><?= date('d-m-Y',strtotime($params['datosVenta'][0]['fEntrega']))?></td>
        <td><?= number_format($params['datosVenta'][0]['PVPTotal'],2);?></td>
      </tr>
    </table>
    <?php if(isset($_GET['detalles']) && count($params['articulos'])>0): ?>
    <table class='table table-striped table-hover'>
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
      <?php endforeach; ?>
    </table>
  <?php endif;?>
  <table class='table table-striped table-hover'>
  <tr>
    <th>Identificador envío:</th>
    <th>Datos envío:</th>
    <th>Tipo Envío</th>
    <th>Tienda:</th>
    <th>Estado:</th>

  </tr>
  <tr>
    <td><?= $params['envio'][0]['id']?></td>
    <td><?= $params['envio'][0]['nombre']?>
    <?= $params['envio'][0]['apellidos']?><br>
    <?= $params['envio'][0]['direccion']?>
    <?= $params['envio'][0]['ciudad']?>
    <?= $params['envio'][0]['codigoPostal']?>
    <?= $params['envio'][0]['provincia']?>
    <?= $params['envio'][0]['pais']?><br>
    <?= $params['envio'][0]['telefono']?>
    <?= $params['envio'][0]['email']?></td>
    <td><?= $params['envio'][0]['tipoEnvio']?></td>
    <td>"<?= $params['tienda'][0]['nombre']?>"<br>
    <?= $params['tienda'][0]['ciudad']?>
    <?= $params['tienda'][0]['provincia']?><br>
    <?= $params['tienda'][0]['tlfno']?></td>
    <td><?=$params['envio'][0]['estado']?></td>
  </tr>
</table>
<?php
 $contenido = ob_get_clean();
include __DIR__ . '/../layout/base.php';
