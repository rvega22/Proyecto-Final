<?php
require_once __DIR__.'/../../helpers/functions.php';

?>

<!DOCTYPE html>
<html lang="Es">
<head>
        <meta charset="UTF-8">
        <title>Spectralook</title>
        
        <link rel="stylesheet" href="<?=ASSETS_URL?>/css/style.css">
        <script src="https://kit.fontawesome.com/fe8d3f6ced.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        
    </head>

<body class="body">
    
    <header>
        <div class="box_title">
            <a id="margin_footer_img" href="<?= BASE_URL ?>/../src/views/public/welcome.php"><i class="fa-solid fa-glasses"></i></a>
            <h1  class="h1"><a href="<?= BASE_URL ?>/../src/views/public/welcome.php">SpectraLook</a></h1>
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
            <a class="imagenes" href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
            <a class="imagenes" href="<?= BASE_URL ?>/login.php"><i class="fa-solid fa-user"></i></a>
            <a class="imagenes" href="<?= BASE_URL ?>/../src/views/public/shop/shopping_cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
            <a class="imagenes movil" href=""><i class="fa-solid fa-bars"></i></a>
        </div>
    </header>