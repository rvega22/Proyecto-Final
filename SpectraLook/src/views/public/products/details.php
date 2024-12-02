    <?php
        include_once '../../layouts/header.php';
    ?>

    <nav class="breadcrumbs">
        <a href="index.html"><i class="fa-solid fa-house"></i> Inicio /</a> 
        <span><i></i>Detalles del producto</span>
    </nav>



    <main class="product-main">
        <div id="product-container" class="product-details">
            <div class="product-image-container">
                <img id="product-image" src="default-image.jpg" alt="Imagen del Producto" />
            </div>
    
            <!-- Información del Producto -->
            <div class="product-info">
                <!-- Modelo -->
                <h1 id="product-title" class="product-title"> Modelo: Nombre del Producto</h1>
                <!-- Precio -->
                <p id="product-price" class="product-price">$0.00  | Envio gratis</p>
    
                <!-- Selección de Colores -->
                <div class="product-colors">
                    <p>Color:</p>
                    <div class="color-options">
                        <div class="color-circle" style="background-color: #f0b7e3;" onclick="selectColor('#ff0000')"></div>
                        <div class="color-circle" style="background-color: #cba1f0;" onclick="selectColor('#00ff00')"></div>
                        <div class="color-circle" style="background-color: #8ed6ea;" onclick="selectColor('#0000ff')"></div>
                    </div>
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
        include_once '../../layouts/recomendation.php';
    ?>

    <?php
        include_once '../../layouts/footer.php';
    ?>
    <script src="<?= JS_URL ?>/index.js"></script>
</body>
</html>
