<?php ob_start();?>

<div class="row">
  <div class="col-md-6">

  <?php
  echo $params['mensaje']."<h3 class='red'> Departamento de ".$params['infoFamilia']->getNombre()."</h3>";
  $total=count($params['art']);
  ?>
</div>
</div>
<div class="row">
<div class="col-md-12">
  <h4><?=$params['infoFamilia']->getDescripcion();?></h4>
</div>
</div>

<div id="articulos">

   <?php
   if($total>0){
     for($i=0;$i<$total;$i+=4){//filas, cada 4 elementos hace una nueva linea
     ?>
     <div class="row">
       <?php for($k=$i;$k<$i+3 && $k<$total;$k++){//columnas
         $articulo = $params['art'][$k];?>
         <div class="productos col-xs-4">
           <figure class="thumbnail center">
             <img class="img-responsive" src="foto.php?productId=<?= $articulo['id'] ?>">
           <figcaption>
             <a href="index.php?ctl=verArticulo&id=<?php echo $articulo['id'] ?>">
                 <b><?= strtoupper(substr($articulo['nombre'],0,35)); ?></b>
            </a>
            <div class="detalleProducto">
             <span class="precioDetalle precio"><?= number_format ( $articulo['PVP'], 2) ?>€ </span>
               <?php if($articulo['stock'] > 0) {?>
                 <form class="cantidadDetalle right" action='index.php?ctl=anadirCarrito' method='post'>
                   <input type='hidden' name='id' value='<?= $articulo['id'];?>'>
                   <input id='cantidad' type='hidden' name='cantidad' value='1'>
                   <input type='submit' name='añadir' value='Comprar'>
                 </form>
               <?php }elseif ($articulo['stock']<=0){ ?>
                 <p class='red'>Próximamente</p>
                 <?php }?>
          </div>
         </figcaption>
         </figure>
         </div>
    <?php } ?>
   </div>
 <?php }
 }else{?>
   <h3>No hay articulos de "<?=$params['infoFamilia']->getNombre()?>" disponibles en estos momentos. </h3>
 <?php } ?>

</div>

 <?php $contenido = ob_get_clean();

 include __DIR__ . '/../layout/base.php' ?>
