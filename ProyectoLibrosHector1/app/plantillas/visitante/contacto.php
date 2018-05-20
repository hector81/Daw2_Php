<?php ob_start(); include './app/config/nl2br2.php'; ?>
   <h2>Contacta con nosotros</h2>
   <!-- libro -->
   <div class="row">
      <div class="col-xs-12 col-md-12 col-lg-12 content_home">
         <p class="contact_exp grey_txt"> Fusce imperdiet rutrum porttitor. Integer lacinia libero ligula, quis maximus arcu gravida vitae. Suspendisse potenti. Aliquam pretium vitae neque a semper. Pellentesque pharetra lacus mi, ac consequat libero lobortis et.</p>
         <p class="contact_exp grey_txt">  Duis nec sapien ut ipsum tincidunt dictum id ac urna. In volutpat fermentum neque, vel volutpat est. Maecenas quam ligula, fringilla at tellus non, pharetra scelerisque tortor. Phasellus lobortis mi a magna euismod, sit amet mattis urna mollis. Proin ac purus enim. Phasellus interdum ullamcorper dui quis tristique. Curabitur venenatis efficitur nunc, quis varius massa dignissim at. Sed sit amet est eu ante malesuada facilisis.</p>
      </div>
      <form id="form" data-toggle="validator">
         <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
               <label for="inputName" class="control-label" data-placement="top">Nombre</label>
               <input type="text" class="form-control" id="inputName" placeholder="Introducir nombre" data-placement="top" required>
            </div>
         </div>
         <div class="col-sm-12 col-md-6 col-lg-6">
            <label for="inputEmail" class="control-label">Email</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="Introducir email" required>
         </div>
         <div class="col-sm-12 col-md-12 col-lg-12">
            <label for="areaComment">Comentarios:</label>
            <textarea class="form-control" rows="5" id="areaComment" placeholder="Escribir comentarios" required></textarea>
            <p class="lead centered_item"><button type="submit" id="enviar" class="btn btn-default btn_contacto"><i class="fa fa-envelope-o" aria-hidden="true"></i>  Enviar</button></p>
         </div>
      </form>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
   </div>



<?php $contenido = ob_get_clean() ?>
<?php include 'baseInicio.php' ?>
