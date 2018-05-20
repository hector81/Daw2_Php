<?php ob_start(); include './app/config/nl2br2.php'; ?>
<script type="text/javascript" src="web/jsSelected/jsSelectProvincias.js"></script>
<script type="text/javascript" src="web/jsSelected/jsSelectedImagenesTienda.js"></script>

<form name="formularioInsercionTienda" class="formularioInsercionTienda" action="index.php?ctl=enviarDatosInsercionTienda"
  method="POST" style="text-align:left;"  enctype="multipart/form-data">
        <legend>Datos de la tienda a introducir</h1><br><br>
        <label for="nombreTienda">Nombre</label>
        <input type="text" value="" name="nombreTienda" id="nombreTienda" size="40"><br>
        <label for="provincia">Provincia</label>
        <select id="provincia" name="provincia" class="form-control" required>
  				        <option>Selecciona una provincia</option>
  			</select>
        <label for="municipio">Ciudad</label>
        <select id="municipio" name="municipio" class="form-control" required>
              <option>Selecciona un municipio</option>
			  </select>
        <label for="telefonoTienda">Telefono</label>
        <input type="text" value="" name="telefonoTienda" id="telefonoTienda" size="40"><br><br>
        <label for="direccionTienda">Dirección</label>
        <input type="text" value="" name="direccionTienda" id="direccionTienda" size="40"><br><br>

        <label for="imagenTienda">Subir imagen: </label>
        <input type="file" value="Seleccionar foto" accept="imagenTienda/*" name="imagenTienda" id="imagenTienda"><br>
        <input type="hidden" value="" name="imagenOriginal" id="imagenOriginal"><br><br>

        <label for="srcIframe">Sube el src del iframe</label>
        <input type="text" value="" name="srcIframe" id="srcIframe" size="40"><br><br>

        <input type="submit" value="Enviar datos tienda" name="boton" ><br><br>
  </form>

<?php $contenido = ob_get_clean() ?>
<?php include 'baseAdministrador.php' ?>
