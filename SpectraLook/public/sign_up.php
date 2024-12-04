<?php
require_once __DIR__.'/../src/helpers/functions.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - SpectraLook</title>
    <link rel="stylesheet" href="<?=ASSETS_URL?>/css/style_sign_up.css">
    <script src="https://kit.fontawesome.com/fe8d3f6ced.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body class="body-login">
    <div class="login-container">
        <div class="login-image">
            <img src="https://img.ltwebstatic.com/images3_spmp/2024/06/11/d5/171810087314405f830ac097d13c98a84c800246ac_thumbnail_720x.webp" 
                alt="Glasses" class="img">
        </div>
        
        <div class="login-content">
            <h2 class="title">Registro</h2>
            <form id="registro-formulario" onsubmit="validatePassword(event)">
                
                <label for="nombre">Nombre Completo</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre completo" autocomplete="name" required>
                
                <label for="email">Correo</label>
                <input type="email" id="email" name="email" placeholder="correo@gmail.com" autocomplete="email" required>
                
                <label for="telefono">Número de Teléfono</label>
                <input type="tel" id="telefono" name="telefono" placeholder="(012) 345 6789" autocomplete="tel" required>
                
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Contraseña" autocomplete="new-password" required>
                
                <label for="confirm-password">Confirmar Contraseña</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirmar contraseña" autocomplete="new-password" required>

                <p id="error-message" style="color: red;"></p>
                <button type="submit" class="button">Registrar</button>
                <button type="submit" class="button_cancel">Cancelar</button>
            </form>
        </div>
    </div>

    <script src="<?= JS_URL ?>/index.js"></script>
</body>
</html>