<!DOCTYPE html>
<html lang="sp">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cuestionario</title>
        <link rel="stylesheet" href="style.css">
        <script src="https://kit.fontawesome.com/fe8d3f6ced.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    </head>
    
    <body class="gradiante_login">
        <a class="return" href="login.html"><i class="fa-solid fa-right-to-bracket"></i></a>
        <div class="box_cuestionario"> 
            <form action="submit" method="post">
                <h2 id="letra_titulos">Registrarse</h2>
                <label for="name">Nombre</label>
                    <input 
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Ingresa tu nombre"
                    required>
                
                <label for="Email">Email</label>
                    <input 
                    type="email"
                    id="Email"
                    name="Email"
                    placeholder="Ingrese su Email"
                    required>
                <label for="Contraseña">Contraseña</label>
                <input 
                    type="password"
                    id="Contraseña"
                    name="Descripcion"
                    placeholder="Ingrese su contraseña"
                    required>
                <div class="contenedor_boton">
                    <button class="button_base tamanio_boton_registrarse" type="submit">Registrarse</button>
                </div>
            </form>
        </div>
        <br><br><br><br><br>
    </body>
</html>