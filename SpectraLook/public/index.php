<?php

$request = $_SERVER['REQUEST_URI'];

// Remover parámetros GET de la URL
$request = strtok($request, '?');

// Switch para manejar las rutas
switch ($request) {
    // Página de inicio
    case '/':
        require_once __DIR__ . '/../src/views/public/welcome.php';
        break;

    // Rutas de administración de productos
    case '/admin/products':
        require_once __DIR__ . '/../src/views/admin/products/index.php';
        break;

    // Ruta para el carrito de compras
    case '/shop/shopping_cart':
        require_once __DIR__ . '/../src/views/public/shop/shopping_cart.php';
        break;

    // Detalles de productos
    case '/products/details':
        require_once __DIR__ . '/../src/views/public/products/details.php';
        break;

    // Login y registro
    case '/login':
        require_once __DIR__ . '/login.php';
        break;

    case '/register':
        require_once __DIR__ . '/registro.php';
        break;

    // Controlador de productos (por ejemplo)
    case '/products':
        require_once __DIR__ . '/../src/controllers/ProductsController.php';
        break;

    // Configuración
    case '/config':
        require_once __DIR__ . '/../src/config/config.php';
        break;

    // Página no encontrada
    default:
        http_response_code(404);
        // Puedes agregar una vista personalizada para 404
        require_once __DIR__ . '/../src/views/public/not_found/not_found.php';
        break;
}