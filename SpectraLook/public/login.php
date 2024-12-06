<?php
require_once __DIR__.'/../src/helpers/functions.php';
?>
<!DOCTYPE html>
<html lang="Es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=ASSETS_URL?>/css/style.css">
    <title>Registrarse SpectraLook</title>
    <script src="https://kit.fontawesome.com/fe8d3f6ced.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body class="gradiante_login">
    <a class="return" href="<?=BASE_URL?>/../src/views/public/welcome.php"><i class="fa-solid fa-right-to-bracket"></i></a>
    
    <main class="contenedor_login">
        <div class="logo_login">
            <a  href=""><i class="fa-solid fa-circle-user"></i></a>
        </div>

        <div>
            <h1 class="letra_login">Login</h1>
        </div>

        <!-- Formulario de login -->
        <form method="POST" action="<?=BASE_URL?>/../login-process">
        <div class="form_group main_icons">
            <a href=""><i class="fa-solid fa-user"></i></a>
            <h3>E-mail</h3>
        </div>

        <div class="form_group">
            <label for="email"></label>
                <input class="input_login"
                type="email"
                id="email"
                name="email"
                placeholder="Ingresa tu correo" required>
        </div>

        <div class="form_group main_icons">
            <a href=""><i class="fa-solid fa-lock"></i></a>
            <h3>Contraseña</h3>
        </div>

        <div class="form_group">
            <label for="Contraseña"></label>
                <input class="input_login"
                type="password"
                id="Contraseña"
                name="Contraseña"
                placeholder="Ingresa tu Contraseña" required>
        </div>

        <div class="button_tamanio">
        <button type="submit" class="button_base button_login">Iniciar sesión</button>
        </div>
        </form>

        <div class="extra_links">
            <a href="#">¿Olvido su contraseña?</a>
            <a href="sign_up.php">Crear cuenta</a>
        </div>
    </main>
    <br><br>
</body>
</html>