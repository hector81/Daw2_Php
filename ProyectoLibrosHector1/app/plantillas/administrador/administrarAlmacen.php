<?php
ob_start();
include './app/config/nl2br2.php';
?>
<script type="text/javascript" src="web/jsSelected/jsSelectedTiendasAlmacen.js"></script>
<!-- <script type="text/javascript" src="web/jsSelected/jsSelectedTiendas.js"></script> -->
<!-- <script type="text/javascript" src="web/jsSelected/jsSelectCategorias.js"></script> -->

<form name="formularioAdministrarAlmacen" class="formularioAdministrarAlmacen" action="index.php?ctl=enviarDatosAlmacen"
  method="POST" style="text-align:left;">
        <legend>Datos de de busqueda</h1><br><br>
        <label for="provincia">Provincia</label>
        <select id="provincia" name="provincia" class="form-control" required>
  				        <option value="">Selecciona una provincia</option>
  			</select>
        <label for="municipio">Ciudad</label>
        <select id="municipio" name="municipio" class="form-control" required>
              <option value="">Selecciona un municipio</option>
			  </select>
        <label for="tienda">Tienda</label>
        <select id="tienda" name="tienda" class="form-control" required>
              <option value="">No hay tiendas en esa localidad</option>
			  </select>
        <label for="categoria">Categorias</label>
        <select id="categoria" name="categoria" class="form-control">
              <option value="">Selecciona una categoria</option>
        </select>
        <label for="subcategoria">Subcategorias</label>
        <select id="subcategoria" name="subcategoria" class="form-control">
                <option value="">Selecciona una subcategoria -</option>
        </select>

        <input type="submit" value="Enviar datos modificados" name="boton" ><br><br>
  </form>




<?php
$contenido = ob_get_clean()?>
<?php
include 'baseAdministrador.php';
?>
