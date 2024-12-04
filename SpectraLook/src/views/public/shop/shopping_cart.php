  <?php
    include_once __DIR__.'/../../layouts/header.php';
            
  ?>

  <nav class="breadcrumbs">
    <a href="../welcome.php"><i class="fa-solid fa-house"></i> Inicio /</a> 
    <span class="current-page"><i class="fa-solid fa-cart-shopping"></i> Carrito</span>
  </nav>

  <!-- Los productos del carrito -->
  <div class="cart-page">
    <div class="cart-container">
      <!-- Productos del carrito aquí -->
    </div>

    <div class="cart-summary">
      <h2>Resumen del Pedido</h2>
      <p>Total: $<span id="cart-total">0.00</span></p>
      <div class="cart-buttons">
        <a href="<?=BASE_URL?>/../src/views/public/welcome.php" class="continue-shopping-button">Seguir comprando</a>
        <button  class="checkout-button" onclick="checkout()">Pagar</button>
      </div>
    </div>
  </div>



  <?php
    include_once __DIR__. '/../../layouts/footer.php';
  ?>

  

<script src="<?= JS_URL ?>/index.js"></script>
</body>
</html>
