<?php ob_start(); include './app/config/nl2br2.php'; ?>
               <h2>Localizador de librerías</h2>
               <div class="row">
                  <div class="col-xs-12 col-md-12 col-lg-12 content_home">
                     <!-- MAPA -->
                     <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <?php
                            foreach ($tiendaInicial as $key => $value) {
                              echo '<h2>'.$value->getNombre().'</h2>';
                              echo '<iframe src="'.$value->getSrcIframe().'" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
                            }
                            ?>
                        </div>
                     </div>
                     <!-- FIN MAPA -->
                     <hr>
                     <div class="row">
                        <div class="col-xs-12 col-md-12 col-lg-12 content_home">
                           <div class="col-md-12">
                              <h2>Listado de librerías</h2>
                           </div>
                           <!-- CAROUSEL de TIENDAS -->
                           <div class="carousel carousel_tiendas_btns" data-transition="slide"  data-autoplay data-interval="6000">
                              <!-- TIENDA -->
                              <?php
                                  foreach ($tiendaTotal as $key => $value) {
                                    echo '<div class="slag">';
                                       echo '<div class="thumbnail">';
                                          echo '<a href="index.php?ctl=verTiendasIndividual&idTienda='.$value->getIdTienda().'" ><img src="'.$value->getImagenTienda().'"
                                          alt="imagen de tienda" title="imagen de tienda" style="width:209px;height:139px;"></a>';
                                          echo '<div class="caption">';
                                             echo '<h4><a href="index.php?ctl=verTiendasIndividual&idTienda='.$value->getIdTienda().'" >'.$value->getNombre().'</a>';
                                             echo '</h4>';
                                             echo '<p class="mg_tiendas_p">Dirección : '.$value->getDireccion().'. Telefono : '.$value->getTelefono().'</p>';
                                          echo '</div>';
                                       echo '</div>';
                                    echo '</div>';
                                  }
                              ?>
                              <!-- TIENDA -->
                           </div>
                           <!-- CAROUSEL TIENDAS -->
                        </div>
                     </div>
                  </div>
                  <!-- tiendas -->
               </div>

<?php $contenido = ob_get_clean() ?>
<?php include 'baseInicio.php' ?>
