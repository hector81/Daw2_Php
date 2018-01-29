<?php ob_start(); include_once 'nl2br2.php' ?>

    <h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>



    <form name="formBusqueda" action="index.php?ctl=categorias" method="POST">
      <h4>PARA VER LAS CATEGORIAS</h4>
      <table>
        <tr>
          <td>Nombre categoria:</td>
          <td><input type="text" name="nombreCategoria"></td>
          <td><input type="submit" value="buscar"></td>
        </tr>

          <tr>
            <form name="formBusqueda" action="index.php?ctl=categoriasPresentacion">
          <?php
            $listacategorias;
          foreach ($listacategorias as  $a): ?>

                <?php foreach ($a as  $b): ?>
                    <td><?php echo $b; ?></td>
                <?php endforeach; ?>

          <?php endforeach; ?>
          </form>
        </tr>

      </table>
    </form>




<?php $contenido = ob_get_clean() ?>

<?php include_once 'base.php' ?>
