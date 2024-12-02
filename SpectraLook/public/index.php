<?php

$request = $_SERVER['REQUEST_URI'];

// Remover parámetros GET de la URL
$request = strtok($request, '?');

// Switch para manejar las rutas
switch ($request) {
    // Página de inicio
    case '/':
        require_once __DIR__ . '/src/views/public/welcome.php';
        break;

    // Rutas de administración de productos
    case '/admin/products':
        require_once __DIR__ . '/src/views/admin/procuts/index.php';
        break;

    // Ruta para el carrito de compras
    case '/shop/cart':
        require_once __DIR__ . '/src/views/public/shop/carrito.php';
        break;

    // Ruta para la página de ventas
    case '/shop/sale':
        require_once __DIR__ . '/src/views/public/shop/venta.php';
        break;

    // Detalles de productos
    case '/products/details':
        require_once __DIR__ . '/src/views/public/products/details.php';
        break;

    // Login y registro
    case '/login':
        require_once __DIR__ . '/src/views/public/login.php';
        break;

    case '/register':
        require_once __DIR__ . '/src/views/public/registro.php';
        break;

    // Controlador de carrera (por ejemplo)
    case '/careers':
        require_once __DIR__ . '/src/controllers/CareerController.php';
        break;

    // Configuración
    case '/config':
        require_once __DIR__ . '/src/config/config.php';
        break;

    // Página no encontrada
    default:
        http_response_code(404);
        // Puedes agregar una vista personalizada para 404
        echo '404 - Página no encontrada';
        break;
}