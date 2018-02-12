<?php ob_start() ?>
<h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>
    <table>
      <form name="formBusqueda" action="index.php?ctl=todasLasCategorias">
        <tr>
          <?php
            foreach ($listacategorias as  $categoria): ?>

            <tr style="background-color:green;text-align:left;">
                    <td><?php echo "ID: " ;?></td>
                    <td><?php echo "NOMBRE: ";?></td>
                    <td><?php echo "DESCRIPCIÓN: " ;?></td>

              </tr>
              <tr>
                    <td><?php echo $categoria->getId() ;?></td>
                    <td><?php echo $categoria->getNombre() ;?></td>
                    <td><?php echo $categoria->getDescripcion() ;?></td>
              </tr>

            <?php endforeach; ?>

        </tr>
      </form>
    </table>
<?php $contenido = ob_get_clean() ?>

<?php
if($_SESSION['grupo']=='admins'){
  include_once 'baseAdministrador.php';
}elseif($_SESSION['grupo']=='clientes'){
  include_once 'baseUsuario.php';
}
?>
