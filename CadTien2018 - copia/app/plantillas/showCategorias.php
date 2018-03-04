 <?php ob_start(); include 'nl2br2.php'; ?>
<h1>Bienvenido visitante</h1>
<h2>Categorias</h2>
<div class='categorias'></div>
  <?php
      foreach ($familias as $key => $value) {
      ?>
        <form class="formBusqueda" name="formBusqueda" method="POST" action="index.php?ctl=verArticulosPorCategoria">
             <table class="categorias">
                <tr>
                    <td>NOMBRE CATEGORIA </td>
                    <td><?php echo $value->getNombre(); ?> </td>
                </tr>
                <tr>
                    <td>DESCRIPCIÓN CATEGORIA </td>
                    <td><?php echo $value->getDescripcion(); ?> </td>
                </tr>
                <tr>
                    <td><input type="submit" name="verArticulosCategoria" value="Ver articulos por Categoria"></td>
                    <td><input type="hidden" name="articulosCategoriaId" value="<?php echo $value->getId(); ?>"></td>
                    <td><input type="hidden" value="<?php echo $value->getNombre(); ?>" name="nombreCategoria"></td>
                </tr>
            </table>
        </form>
        <?php
      }
   ?>

 <?php $contenido = ob_get_clean() ?>

 <?php include 'base.php' ?>
