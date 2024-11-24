<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Carrito</title>
    <link rel="stylesheet" href="style.css">
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

<script src="index.js"></script>
</body>
</html>
