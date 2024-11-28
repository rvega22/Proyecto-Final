    <?php
        include_once '../src/views/layouts/header.php';
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
            <img class="img-promo" src="img/img-promo.jpg" alt="Promoción">  
            <img class="promo-tag" src="img/Imagen_rebajas.png" alt="Etiqueta de descuento">
            <p class="promo-text">Aprovecha las ofertas excepcionales en nuestros mejores lentes para este regreso a clases.</p>
        </div>
    </div>
    
    <nav class="centrar_nav">
        <h3 class="titulos_espacio letra_recomendaciones">Recomendaciones</h3>
        <div class="target">
            <a href="detalles.html?nombre=LOOK+BASE-HOT&precio=3200&imagen=img/Imagen_lentes_3.png&descripcion=Unos+lentes+increíbles+para+ti">
                <img class="target_img centrar_img" src="img/Imagen_lentes_3.png" alt="Imagen de lentes" width="100%">
                <h2 class="letra" id="tamanio">LOOK BASE-HOT</h2>
                <p class="alinear_texto">$ 3200</p>
            </a>
        </div>
    
        <div class="target">
            <a href="detalles.html?nombre=X8+SPECTRA+MODERN&precio=2299&imagen=img/Imagen_lentes_4.png&descripcion=Lentes+modernos+y+sofisticados">
                <img class="target_img centrar_img" src="img/Imagen_lentes_4.png" alt="Imagen de lentes" width="100%">
                <h2 class="letra" id="tamanio">X8 SPECTRA MODERN</h2>
                <p class="alinear_texto">$ 2299</p>
            </a>
        </div>
    
        <div class="target">
            <a href="detalles.html?nombre=WAYFARER+ONE&precio=4499&imagen=img/Imagen_lentes_5.png&descripcion=Clásico+diseño+con+tecnología+avanzada">
                <img class="target_img centrar_img" src="img/Imagen_lentes_5.png" alt="Imagen de lentes" width="100%">
                <h2 class="letra" id="tamanio">WAYFARER ONE</h2>
                <p class="alinear_texto">$ 4499</p>
            </a>
        </div>
    
        <div class="target">
            <a href="detalles.html?nombre=LOOK+BASE-HOT&precio=3200&imagen=img/Imagen_lentes_3.png&descripcion=Unos+lentes+increíbles+para+ti">
                <img class="target_img centrar_img" src="img/Imagen_lentes_3.png" alt="Imagen de lentes" width="100%">
                <h2 class="letra" id="tamanio">LOOK BASE-HOT</h2>
                <p class="alinear_texto">$ 3200</p>
            </a>
        </div>

        <div class="target">
            <a href="detalles.html?nombre=X8+SPECTRA+MODERN&precio=2299&imagen=img/Imagen_lentes_4.png&descripcion=Lentes+modernos+y+sofisticados">
                <img class="target_img centrar_img" src="img/Imagen_lentes_4.png" alt="Imagen de lentes" width="100%">
                <h2 class="letra" id="tamanio">X8 SPECTRA MODERN</h2>
                <p class="alinear_texto">$ 2299</p>
            </a>
        </div>
    </nav>

    <script src="index.js"></script>
    <?php
        include_once '../src/views/layouts/footer.php';
    ?>
</body>
</html>
