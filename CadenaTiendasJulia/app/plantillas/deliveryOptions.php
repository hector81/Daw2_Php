<?php ob_start(); ?>

<div class="">
  <form action="index.php?ctl=finalizePurchase" method='post'>

    <?php if(isset($_SESSION['message'])) { ?>
      <div class="msj-err"><?= $_SESSION["message"] ?></div>
    <?php } ?>

    <div class="">
      <fieldset>
        <legend>Método de pago</legend>
        <article class="">
          <h4><input type="radio" name="pago" value="paypal"> Paypal</h4>
        </article>
        <article class="">
          <h4><input type="radio" id='pago' name="pago" value="tarjeta" onchange="muestraTarjeta()"> Tarjeta de crédito </h4>
          <div id="muestraTarjeta" class="disabled">
            <div>
              <label >Número de tarjeta:</label><br/>
              <input type="text" name="numTarjeta" value="">
            </div><br>
            <div>
              <label >Fecha de vencimiento:</label><br/>
              <input type='number' name='anio' max="12" min="1"> /
              <input type='number' name='mes' max="2030" min="2017">
            </div>
          </div>
        </article>
        <div>
        </div>
      </fieldset>
    </div>
    <div class="">
      <fieldset>
        <legend>Método de entrega</legend>
        <div>
          <article class="">
            <h4><input type="radio" name="envio" value="domicilio"> Envío a domicilio </h4>
          </article>
          <article class="">
            <h4> <input type="radio" id='tienda' name="envio" value="tienda" onchange="muestraTiendas()"> Recogida en tienda </h4>
            <hr>
            <select id='listaTiendas' class="disabled" name="tiendas">
              <option value="1">Castellana (Madrid)</option>
              <option value="2">La Veleta (Las Rozas-Madrid)</option>
              <option value="3">Puerto Príncipe (Valladolid)</option>
              <option value="4">Campo Grande (Barcelona)</option>
              <option value="5">Vista Alegre (Igualada-Barcelona)</option>
              <option value="6">El Castillo (Almussafes-Valencia)</option>
            </select>
          </article>
        </div>
      </fieldset>
    </div>
    <div class="end-btn">
      <input type='submit' name='completar' value='Completar compra'>
    </div>
  </form>
</div>
<script type="text/javascript">
  function muestraTiendas(){  document.getElementById('listaTiendas').className = 'enabled';   }
  function muestraTarjeta(){  document.getElementById('muestraTarjeta').className = 'enabled';   }
</script>
<?php unset($_SESSION['message']); $contenido=ob_get_clean(); ?>
<?php include 'base.php'; ?>
