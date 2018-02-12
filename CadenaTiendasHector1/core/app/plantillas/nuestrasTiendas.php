<?php ob_start(); include_once 'nl2br2.php' ?>
<h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>
<form action="index.php?ctl=nuestrasTiendas" method='POST'>
  <fieldset>
    <legend>NUESTRAS TIENDAS</legend>
    <div id="contenedor">
      <p>Tenemos tiendas en Barcelona, Madrid, Valencia y Vallalodid.</p>
      <table>
      <form name="formBusqueda" action="index.php?ctl=mostrarTiendas" method='post'>
        <?php foreach($tiendasCiudad as $tienda): ?>
            <tr style="background-color:green;text-align:left;">
                  <td><?php echo "ID: " ;?></td>
                  <td><?php echo "NOMBRE: " ;?></td>
                  <td><?php echo "PROVINCIA: ";?></td>
                  <td><?php echo "CIUDAD: " ;?></td>
                  <td><?php echo "TELEFONO: " ;?></td>
            </tr>
            <tr>
                  <td><?php echo $tienda->getId() ;?></td>
                  <td><?php echo $tienda->getNombre() ;?></td>
                  <td><?php echo $tienda->getProvincia() ;?></td>
                  <td><?php echo $tienda->getCiudad() ;?></td>
                  <td><?php echo $tienda->getTlfno() ;?></td>
            </tr>
        <?php endforeach;?>

      </form>
    </table>
    </div>
  </fieldset>
</form>

<?php $contenido = ob_get_clean() ?>

<?php
if($_SESSION['grupo']=='admins'){
  include_once 'baseAdministrador.php';
}elseif($_SESSION['grupo']=='clientes'){
  include_once 'baseUsuario.php';
}
?>
