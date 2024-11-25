<?php
    require_once __DIR__.'/../config/database.php';
    $config = require __DIR__.'/../config/config.php';
    define('BASE_URL', $config['base_url']);
    define('ASSETS_URL', $config['assets_url']);

    function getProducts() 
    {
        $pdo = getPDO();

        try {
            // Consulta para obtener todos los productos
            $sql = "SELECT id, name, price, img_url, details FROM products";
            $stmt = $pdo->query($sql);
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $products;
        } catch (PDOException $e) {
            error_log("Error al consultar los productos: " . $e->getMessage());
            return [];
        }
    }

    function getProductData($productId = null) 
    {
        // Si no se pasa el ID del producto como argumento, intenta obtenerlo de la URL ($_GET)
        if ($productId === null && isset($_GET['id'])) {
            $productId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        }

        if ($productId === null) {
            return [];
        }

        $pdo = getPDO();

        try {
            // Consulta para obtener un producto específico por su ID
            $sql = "SELECT * FROM products WHERE id = :id LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => $productId]);
            $productData = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$productData) {
                return []; // Producto no encontrado
            }

            return $productData;
        } catch (PDOException $e) {
            error_log("Error al consultar los datos del producto: " . $e->getMessage());
            return [];
        }
    }
?>