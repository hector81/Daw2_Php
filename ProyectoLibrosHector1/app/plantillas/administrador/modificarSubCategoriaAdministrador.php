<?php ob_start();
include './app/config/nl2br2.php';
?>
<?php foreach ($subCategorias as $key => $value) {  ?>
<form name="formularioUsuario" class="formularioUsuario" action="index.php?ctl=enviarDatosModificacionSubCategoria" method="POST" style="text-align:left;">
        <legend>Datos de la subcategoria a modificar</h1><br><br><br>
        <label for="nombreSubCategoria">Nombre SubCategoria</label>
        <input type="text" value="<?php echo $value->getNombreSubCategoria(); ?>" name="nombreSubCategoria" id="nombreSubCategoria"><br><br>
        <label for="descripcion">Descripción de la categoria</label><br><br>
        <textarea value="<?php echo $value->getDescripcion(); ?>" name="descripcion" id="descripcion"></textarea>

        <input type="hidden" value="<?php echo $value->getIdSubCategoria(); ?>" name="idSubCategoria" id="idSubCategoria"><br><br>

        <input type="submit" value="Enviar datos modificados" name="boton" ><br><br>
  </form>
  <?php } ?>
<?php $contenido = ob_get_clean() ?>
<?php include 'baseAdministrador.php' ?>
