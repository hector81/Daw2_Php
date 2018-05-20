<?php ob_start(); include './app/config/nl2br2.php'; ?>


<script type="text/javascript" src="web/jsSelected/jsSelectCategorias.js"></script>
<form class="formBusquedaLibroAvanzada" name="formBusquedaLibroAvanzada" method="POST" action="index.php?ctl=resultadosBusqueda">
      <div class="col-sm-12 col-md-6 col-lg-6">
        <label for="autores">Autores</label>
        <select id="autoresId" name="autoresId" class="form-control">
              <option value="">Selecciona un autor</option>
              <?php
                  foreach ($autores as $key => $value) {
                      echo '<option value="'.$value->getIdAutor().'">'.$value->getNombre().'</option>';
                  }
               ?>

        </select>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6">
        <label for="tiendas">Tiendas</label>
        <select id="tiendasId" name="tiendasId" class="form-control">
              <option value="">Selecciona una tienda</option>
              <?php
                  foreach ($tiendas as $key => $value) {
                      echo '<option value="'.$value->getIdTienda().'">'.$value->getNombre().'</option>';
                  }
               ?>

        </select>
      </div>

      <div class="col-sm-12 col-md-6 col-lg-6">
        <label for="editorial">Tiendas</label>
        <select id="editorialId" name="editorialId" class="form-control">
              <option value="">Selecciona una editorial</option>
              <?php
                  foreach ($editoriales as $key => $value) {
                      echo '<option value="'.$value->getIdEditorial().'">'.$value->getNombre().'</option>';
                  }
               ?>

        </select>
      </div>

      <div class="col-sm-12 col-md-6 col-lg-6">
        <label for="yearPublicacion">Año publicación</label>
        <select id="yearPublicacion" name="yearPublicacion" class="form-control">
              <option value="">Selecciona un año de publicación</option>
              <?php
                  foreach ($year as $key => $value) {
                      echo '<option value="'.$value.'">'.$value.'</option>';
                  }
               ?>

        </select>
      </div>

      <div class="col-sm-12 col-md-6 col-lg-6">
        <label for="categoria">Categorias</label>
            <select id="categoria" name="categoria" class="form-control">
                  <option>Cargando...</option>
            </select>
      </div>

      <div class="col-sm-12 col-md-6 col-lg-6">
        <label for="subcategoria">Subcategorias</label>
          <select id="subcategoria" name="subcategoria" class="form-control">
                  <option>- selecciona una subcategoria -</option>
          </select>
      </div>

      <button type="submit" class="btn btn-default">Enviar</button>

</form>



<?php $contenido = ob_get_clean() ?>
<?php include 'baseUsuario.php' ?>
