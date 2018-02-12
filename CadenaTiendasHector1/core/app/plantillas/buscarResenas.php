<?php ob_start() ?>
<h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>
    <table>
      <form name="formBusqueda" action="index.php?ctl=verResenas" method="POST">
        <h4>PARA BUSCAR RESEÑAS POR ID DE PRODUCTO</h4>
        <div><span ><?= isset($error)?$error: null; ?></span></div>
          <tr>
            <td>ID DE PRODUCTO:</td>
            <td><input type="text" name="idResena"></td>
            <td><input type="submit" value="buscar"></td>
          </tr>
          <tr>
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
