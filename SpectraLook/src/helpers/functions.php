<?php
    require_once __DIR__.'/../config/database.php';
    $config = require __DIR__.'/../config/config.php';
    define('BASE_URL', $config['base_url']);
    define('ASSETS_URL', $config['assets_url']);
    define('JS_URL', $config['js_url']);
    //define('SRC_URL', $config['src_url']);
    define('PRODUCTS_CACHE_FILE',  __DIR__ .'/../cache/products.json');

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    #region Productos
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
            file_put_contents(PRODUCTS_CACHE_FILE, json_encode($products));
        } catch (PDOException $e) {
            error_log("Error al consultar la base de datos: " . $e->getMessage());
        }

    }

    function get_products_from_cache()
    {
        $products = [];

        if (file_exists(PRODUCTS_CACHE_FILE)) {
            $products = json_decode(file_get_contents(PRODUCTS_CACHE_FILE), true);
        }

        if(count($products) == 0){
            cache_products();
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

    function getProductData($productId) 
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
    #endregion

    #region Usuarios
    function getUsers() 
    {
        $pdo = getPDO();

        try {
            // Consulta para obtener todos los usuarios
            $sql = "SELECT id, name, phone_number, email FROM users";
            $stmt = $pdo->query($sql);
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $users;
        } catch (PDOException $e) {
            error_log("Error al consultar los usuarios: " . $e->getMessage());
            return [];
        }
    }

    function deleteUsers($userId) {
        $pdo = getPDO();

        try {
            //Consulta para borrar un usuario usando su id
            $sql = "DELETE FROM users WHERE users.id = $userId";
            $stmt = $pdo->query($sql);
        } catch (PDOException $e) {
            error_log("Error al eliminar el usuario: " . $e->getMessage());
        }
    }

    function updateUser($userId, $name, $phone_number, $email) {
        $pdo = getPDO();

        try {
            //Consulta para editar un usuario usando su id
            $sql = "UPDATE users SET name='$name', phone_number = '$phone_number', email = '$password' users WHERE users.id = $userId";
            $stmt = $pdo->query($sql);
        } catch (PDOException $e) {
            error_log("Error al actualizar al usuario: " . $e->getMessage());
        }
    }

    function createUser($name, $phone_number, $email, $password) {
        $pdo = getPDO();
        $encryp_password = password_hash($password, PASSWORD_DEFAULT);
        try {
            $sql = "INSERT INTO users (name, phone_number, email, password) VALUES '$name', '$phone_number', '$email', '$encryp_password'";
            $stmt = $pdo->query($sql);
        } catch (PDOException $e) {
            error_log("Error al crear usuario: " . $e->getMessage());
        }
    }
    #endregion

    #region Carrito
    function createCart($userId, $productId)
    {
        $pdo = getPDO();
        $jsonProductsId = json_encode([$productId]);
        $jsonAmount = json_encode([1]);
        $product = getProductData($productId);
        try {
            // Consulta para insertar el carrito del usuario
            $sql = "INSERT INTO carrito (id_usuario, id_producto, cantidad, isPagado) VALUES (:userId, :productId, :jsonAmount, :isPagado)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':userId' => $userId,
                ':productId' => $productId,
                ':jsonAmount' => $jsonAmount,
                ':isPagado' => false
            ]);
            $sql2 = "UPDATE carrito SET total = total + :precio WHERE id_usuario = :userId";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->execute([
                ':precio' => $product["precio"],
                ':userId' => $userId
            ]);
            
        } catch (PDOException $e) {
            error_log("Error al crear el carrito: " . $e->getMessage());
        }
    }

    function getCart($userid) 
    {
        $pdo = getPDO();

        try {
            // Consulta para obtener los datos del carrito
            $sql = "SELECT * FROM carts WHERE carts.id_user = $userId";
            $stmt = $pdo->query($sql);
            $cart = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $cart;
        } catch (PDOException $e) {
            error_log("Error al consultar el carrito: " . $e->getMessage());
            return [];
        }
    }

    function addNewItemToCart($userId, $productId)
    {
        $pdo = getPDO();
        $cart = getCart();

        try {
            $sql = "UPDATE carrito SET id_producto = JSON_ARRAY_APPEND(id_producto, '$', :productoNuevo), cantidad = JSON_ARRAY_APPEND(cantidad, '$', :cantidadProducto) WHERE carrito.id_usuario = :idUsuario";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':productoNuevo' => $productId,
                ':cantidadProducto' => 1,
                ':idUsuario' => $userId
            ]);
        } catch (PDOException $e) {
            error_log("Error al agregar el producto al carrito: " . $e->getMessage());
        }
    }

    function deleteCartItem($userid, $productId) 
    {
        $pdo = getPDO();

        try {
            // Consulta para obtener los datos del carrito
            $sql = "SELECT  FROM carts WHERE carts.id_user = $userId";
            $stmt = $pdo->query($sql);
            $cart = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $cart;
        } catch (PDOException $e) {
            error_log("Error al consultar el carrito: " . $e->getMessage());
            return [];
        }
    }
    #endregion

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