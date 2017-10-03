<?php ob_start(); ?>

<div class="perfil">
  <h2><?php echo  $_SESSION['nombre-usu'] . " " . $_SESSION['apellidos']; ?></h2>
  <hr>
  <table>
    <tr><th>Nombre de usuario</th></tr>
    <tr><td><?php echo $_SESSION['usuario']; ?></td></tr>
    <tr><th>Dirección de entrega</th></tr>
    <tr><td><?php echo $_SESSION['direccion'] . " " . $_SESSION['cod_postal']
     . " " . $_SESSION['ciudad'] . " " . $_SESSION['provincia']
     . " " . $_SESSION['pais']; ?></td></tr>
  </table>
</div>
<div class="pedidos">
  <table>
    <tr>
      <h4>Registro de pedidos</h4>
    </tr>
    <?php if(count($pedidos)<1){ ?>
      <tr>
        <p>Aún no has realizado ningún pedido</p>
      </tr>
    <?php }else{ ?>
        <tr>
          <th>Id de pedido</th>
          <th>Fecha de compra</th>
          <th>Estado del pedido</th>
          <th>Total pagado</th>
        </tr>
        <?php foreach($pedidos as $info){?>
          <tr>
            <td> 0032PD<?= $info['id'] ?></td>
            <td> <?= $info['fCompra'] ?></td>
            <td> <?= (isset($_info['fEntrega']))? 'Entregado' : 'En tránsito' ?></td>
            <td> <?= number_format($info['Pv'], 2) ?>€</td>
          </tr>
        <?php } ?>
      <?php } ?>
    </table>
  </div>
</div>

 <?php $contenido = ob_get_clean() ?>
 <?php include 'base.php' ?>
