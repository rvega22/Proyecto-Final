<?php

$request = $_SERVER['REQUEST_URI'];

// Remover parámetros GET de la URL
$request = strtok($request, '?');
define('BASE_PATH', '/Proyecto-Final/SpectraLook');

// Switch para manejar las rutas
switch ($request) {
    // Página de inicio
    case BASE_PATH . '/':
        require_once __DIR__ . '/../src/views/public/welcome.php';
        break;

    // Rutas de administración de productos
    case BASE_PATH . '/products':
        require_once __DIR__ . '/../src/views/admin/products/index.php';
        break;

    // Ruta para el carrito de compras
    case BASE_PATH . '/shopping_cart':
        require_once __DIR__ . '/../src/views/public/shop/shopping_cart.php';
        break;

    // Detalles de productos
    case BASE_PATH . '/details':
        require_once __DIR__ . '/../src/views/public/products/details.php';
        break;

    // Login y registro
    case BASE_PATH . '/login':
        require_once __DIR__ . '/login.php';
        break;

    case BASE_PATH . '/register':
        require_once __DIR__ . '/sign_up.php';
        break;
    
    //Controladores
    case BASE_PATH . '/login-process':
        require_once __DIR__ . '/../src/controllers/LoginController.php';
        break;

    case BASE_PATH . '/logout':
        require_once __DIR__ . '/../src/controllers/LogoutController.php';
        break;

    case BASE_PATH . '/register-process':
        require_once __DIR__ . '/../src/controllers/SignUpController.php';
        break;

    // Página no encontrada
    default:
        // Puedes agregar una vista personalizada para 404
        require_once __DIR__ . '/../src/views/public/not_found/not_found.php';
        break;
}