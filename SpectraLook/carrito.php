  <?php
    include_once '../src/views/layouts/header.php';
            
  ?>

  <nav class="breadcrumbs">
    <a href="index.html"><i class="fa-solid fa-house"></i> Inicio /</a> 
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
        <a href="index.html" class="continue-shopping-button">Seguir comprando</a>
        <button  class="checkout-button" onclick="checkout()">Pagar</button>
      </div>
    </div>
  </div>

  </main>

  <?php
    include_once '../src/views/layouts/footer.php';
  ?>

<script src="index.js"></script>
</body>
</html>
