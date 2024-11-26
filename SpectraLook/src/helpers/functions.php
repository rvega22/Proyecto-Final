<?php
    require_once __DIR__.'/../config/database.php';
    $config = require __DIR__.'/../config/config.php';
    define('BASE_URL', $config['base_url']);
    define('ASSETS_URL', $config['assets_url']);
    define('SRC_URL', $config['src_url']);
    define('PRODUCTS_CACHE_FILE',  __DIR__ .'/../cache/products.json');

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    function cache_products() 
    {
        $pdo = getPDO();

        try {
            $sql = "SELECT id, name, price, img_url, details FROM products";
            $stmt = $pdo->query($sql);
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //Si no existe, se crea el directorio
            if (!is_dir(__DIR__.'/../cache')) {
                mkdir(__DIR__.'/../cache', 0755, true);
            }

            //Se convierte a JSON y se agrega al archivo
            file_put_contents(CAREERS_CACHE_FILE, json_encode($products));
        } catch (PDOException $e) {
            error_log("Error al consultar la base de datos: " . $e->getMessage());
        }

    }

    function get_careers_from_cache()
    {
        $products = [];

        if (file_exists(CAREERS_CACHE_FILE)) {
            $products = json_decode(file_get_contents(PRODUCTS_CACHE_FILE), true);
        }

        if(count($products) == 0){
            cache_careers();
        }

        return json_decode(file_get_contents(PRODUCTS_CACHE_FILE), true);
    }


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

    function clean_post_inputs()
    {
        foreach ($_POST as $key => $value) {
            $_POST[$key] = trim($_POST[$key]);
            $_POST[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
        }
    }

    function set_success_message($message) 
    {
        $_SESSION['success'] = $message;
    }

    function set_error_message($message)
    {
        $_SESSION['errors'][] = $message;
    }

    function set_error_message_redirect($message)
    {
        $_SESSION['errors'][] = $message;
        redirectBack();
    }

    function redirect_back(){
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

?>