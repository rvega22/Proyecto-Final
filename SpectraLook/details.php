<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Detalles del producto</title>
        <link rel="stylesheet" href="/Examen_CSS/public/assets/css/style.css">
        <script src="https://kit.fontawesome.com/fe8d3f6ced.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    </head>

    <body class="body">
        <header>
            <div class="box_title">
                <a id="margin_footer_img" href=""><i class="fa-solid fa-glasses"></i></a>
                <h1 class="h1">SpectraLook</h1>
            </div>
        
            <div class="separacion">
                <nav class="centrado espaciado">
                    <a class="main_link letra" href="#">NOVEDADES</a>
                    <a class="link letra" href="#">LENTES DE SOL</a>
                    <a class="link letra" href="#">LENTES DE VISTA</a>
                    <li class="link"><a class="link letra" href="#">PERSONALIZADOS</a>
                        <ul class="submenu">
                            <li><a class="letras" href="#">De sol personalizados</a></li>
                            <li><a class="letras" href="#">Personalizados de sol para niños</a></li>
                            <li><a class="letras" href="#">Nuevos Wayfarer Reverse personalizables</a></li>
                            <li><a class="letras" href="#">De vista personalizados</a></li>
                            <li><a class="letras" href="#">Modelo ultima generacion</a></li>
                            <li><a class="letras" href="#">Modelo inteligente de lentes de sol</a></li>
                        </ul>
                    </li>
                </nav>
            </div>
        
            <div class="alineacion">
                <a class="imagenes" href=""><i class="fa-solid fa-magnifying-glass"></i></a>
                <a class="imagenes" href="login.html"><i class="fa-solid fa-user"></i></a>
                <a class="imagenes" href="carrito.html"><i class="fa-solid fa-cart-shopping"></i></a>
                <a class="imagenes movil" href=""><i class="fa-solid fa-bars"></i></a>
            </div>
        </header>

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
    <footer class="footer">
        <div class="bloque_footer">
            <a id="margin_footer_img" href="#"><i class="fa-solid fa-glasses"></i></a>
            <h1 id="margin_footer_text">SpectraLook</h1>
        </div>

        <div class="bloque_texto">
            <h4>Quienes somos</h4>
            <p id="tamaño_de_letra_footer">Acerca de nosotros</p>
            <p id="tamaño_de_letra_footer">Diseño</p>
            <p id="tamaño_de_letra_footer">Guia de tamaños</p>
            <p id="tamaño_de_letra_footer">Historia</p>
            <p id="tamaño_de_letra_footer">Privacidad</p>
        </div>

        <div class="bloque_texto">
            <h4>Informacion en línea</h4>
            <p id="tamaño_de_letra_footer">Garantias</p>
            <p id="tamaño_de_letra_footer">Terminos y condiciones</p>
            <p id="tamaño_de_letra_footer">Metodos de pago</p>
            <p id="tamaño_de_letra_footer">Guia de tamaños</p>
            <p id="tamaño_de_letra_footer">Privacidad</p>
            <p id="tamaño_de_letra_footer">Examenes de vista</p>
        </div>

        <div class="bloque_texto">
            <h4>Como te podemos ayudar</h4>
            <p id="tamaño_de_letra_footer">Contactos</p>
            <p id="tamaño_de_letra_footer">Privacidad</p>
            <p id="tamaño_de_letra_footer">Contactos</p>
            <p id="tamaño_de_letra_footer">Contactos</p>
            <p id="tamaño_de_letra_footer">Recibir soporte</p>
        </div>

        <div class="bloque_texto">
            <h4>Siguenos</h4>
            <a href=""><i class="fa-brands fa-square-facebook"></i></a>
            <a href=""><i class="fa-brands fa-square-instagram"></i></a>
            <a href=""><i class="fa-brands fa-tiktok"></i></a>
            <a href=""><i class="fa-brands fa-youtube"></i></a>
            <a href=""><i class="fa-brands fa-square-x-twitter"></i></a>
        </div>
    </footer>
</body>
</html>
