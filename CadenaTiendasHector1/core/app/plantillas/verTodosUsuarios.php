<?php ob_start() ?>
<h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>
    <table><div><span ><?= isset($error)?$error: null; ?></span></div>
      <form name="formBusqueda" action="index.php?ctl=verTodosUsuarios">
        <tr>
          <?php
            foreach ($listaUsuarios as  $usuario): ?>

            <tr style="background-color:green;text-align:left;">
                    <td><?php echo "USUARIO: " ;?></td>
                    <td><?php echo "GRUPO: " ;?></td>

              </tr>
              <tr>
                    <td><?php echo $usuario->getUsuario() ;?></td>
                    <td><?php echo $usuario->getGrupo() ;?></td>
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
