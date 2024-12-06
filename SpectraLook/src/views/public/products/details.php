    <?php
        include_once __DIR__.'/../../layouts/header.php';
    ?>
    <?php
require_once __DIR__ . '/../../../controllers/ProductController.php';

// Obtener el ID del producto desde la URL
$product_id = filter_input(INPUT_GET, 'product_id', FILTER_SANITIZE_NUMBER_INT);

// Verificar que el ID del producto es válido
if (!$product_id) {
    die('Producto no encontrado.');
}

// Obtener información del producto desde la base de datos
$product = show($product_id);

if (empty($product)) {
    die('Producto no encontrado.');
}
?>

    <nav class="breadcrumbs">
        <a href="<?=BASE_URL?>/../src/views/public/welcome.php"><i class="fa-solid fa-house"></i> Inicio /</a> 
        <span><i></i>Detalles del producto</span>
    </nav>



    <main class="product-main">
        <div class="product-details-container">
            <!-- Imagen del Producto -->
            <div class="product-image-container">
                <img id="product-image" src="<?= ASSETS_URL ?>/<?= htmlspecialchars($product['img_url']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" />
            </div>
        
            <!-- Información del Producto -->
            <div class="product-info">
                <!-- Modelo -->
                <h1 id="product-title" class="product-title">Modelo: <?= htmlspecialchars($product['name']) ?></h1>
                <!-- Precio -->
                <p id="product-price" class="product-price">$<?= htmlspecialchars($product['price']) ?> | Envío gratis</p>
                <!-- Descripción -->
                <p id="product-description"><?= htmlspecialchars($product['details']) ?></p>
            </div>

                <!-- Contador -->
                <div class="quantity-selector">
                    <label class="quantity-selector">Cantidad: </label>
                    <button onclick="updateQuantity(-1)" class="quantity-button">-</button>
                    <span id="quantity" class="quantity-display">1</span>
                    <button onclick="updateQuantity(1)" class="quantity-button">+</button>
                </div>
            </div>
        </div>
    
        <!-- Detalles Inferiores -->
        <div class="product-details-section">
            <ul class="details-tabs">
                <li class="tab active" onclick="showTab('includes')"><strong>Incluye</strong></li>
                <li class="tab" onclick="showTab('details')"><strong>Detalles</strong></li>
                <li class="tab" onclick="showTab('warranty')"><strong>Garantía</strong></li>
            </ul>
        </div>
    </main>
    

     <!-- Promocion img,p -->
     <div class="promo-container">
        <div class="promo-image-wrapper">
            <img class="img-promo" src="<?=ASSETS_URL?>/img/img-promo.jpg" alt="Promoción">  
            <img class="promo-tag" src="<?=ASSETS_URL?>/img/Imagen_rebajas.png" alt="Etiqueta de descuento">
            <p class="promo-text">Aprovecha las ofertas excepcionales en nuestros mejores lentes para este regreso a clases.</p>
        </div>
    </div>
    
    <br><br><br><br>
    
    <?php
        include_once __DIR__. '/../../layouts/recomendation.php';
    ?>

    <?php
        include_once __DIR__.'/../../layouts/footer.php';
    ?>
    <script src="<?= JS_URL ?>/index.js"></script>
</body>
</html>
