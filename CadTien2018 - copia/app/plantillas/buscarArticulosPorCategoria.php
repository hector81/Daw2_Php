<?php ob_start(); include 'nl2br2.php' ?>

    <h1>Bienvenido <?php echo $_SESSION['userNombre'].' perteneciente al grupo de: '.$_SESSION['grupoUser'] ;?></h1>
    <div><span ><?= isset($error)?$error: null; ?></span></div>

    <form id="elegirProdCat" class="elegirProdCat" action="index.php?ctl=elegirProductoCategoria" method="POST">
        <select id="selectCategorias" class="selectCategorias" name="selectCategorias">
        <?php
            foreach ($familias as $key => $categoria) {
                echo '<option value="'.$categoria->getNombre().'">'.$categoria->getNombre().'</option>';
            }
         ?>
       </select>
       <input type="submit" value="Envia categoria elegida" name="catElegir">
   </form>


<?php $contenido = ob_get_clean() ?>

<?php
include_once 'baseUsuario.php';
?>
