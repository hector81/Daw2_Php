<?php ob_start(); include 'nl2br2.php'; ?>
<h1>Bienvenido visitante</h1>
<h2>Categorias</h2>
<div class='categorias'></div>
 <?php
     foreach ($familias as $key => $value) {
     ?>

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
                   <form class="formborrar" name="formborrar" method="POST" action="index.php?ctl=borrarCategoria">
                     <td><input type="hidden" name="articulosCategoriaId" value="<?php echo $value->getId(); ?>"></td>
                     <td><input type="submit" name="borrarCategoria" value="Borrar Categoria"></td>
                   </form>
               </tr>
               <tr>
                   <form class="formModificar" name="formModificar" method="POST" action="index.php?ctl=modificarCategoria">
                     <td><input type="submit" name="modificarCategoria" value="Modificar Categoria"></td>
                     <td><input type="hidden" name="articulosCategoriaId" value="<?php echo $value->getId(); ?>"></td>
                     <td><input type="hidden" name="descripcionCategoria" value="<?php echo $value->getDescripcion(); ?>"></td>
                     <td><input type="hidden" value="<?php echo $value->getNombre(); ?>" name="nombreCategoria"></td>
                   </form>
               </tr>
           </table>

       <?php
     }
  ?>

<?php $contenido = ob_get_clean() ?>

<?php include 'baseAdministrador.php' ?>
