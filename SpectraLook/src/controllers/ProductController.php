<?php 
require_once __DIR__.'/../helpers/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    clean_post_inputs(); // Limpia las entradas del formulario para mayor seguridad.
    if(isset($_GET['product_id'])){ 
        update(filter_input(INPUT_GET, 'product_id', FILTER_SANITIZE_STRING));
    }else{
        store();
    }
}

function index()
{
    $pdo = getPDO(); // Obtiene la conexión PDO.

    try {
        $sql = "SELECT id, name, price, details, img_url, recommendation FROM products";
        $stmt = $pdo->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products; // Retorna las carreras.
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos". $e->getMessage());
        return [];
    }
}

function indexRecommended()
{
    $pdo = getPDO();

    try {
        $sql = "SELECT id, name, price, details, img_url, recommendation FROM products WHERE recommendation = :recommendation";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['recommendation' => 1]);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products; // Retorna los productos
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        return [];
    }
}

function show($id) 
{
    $id = htmlspecialchars($id);

    if ($id === null) {
        return [];
    }

    $pdo = getPDO();

    try {
        $sql = "SELECT * FROM products WHERE id = :id LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $productData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$productData) {
            return [];
        }

        return $productData;
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        return [];
    }
}

function delete($product_id) {
    $pdo = getPDO();  

    try {
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $product_id]);

        $product = show($product_id); 
        if ($product && isset($product['imagen'])) {
            $oldImagePath = __DIR__ . '/../../public/assets/img/' . $product['img_url'];
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);  
            }
        }

        set_success_message('Producto eliminado con éxito.');  
    } catch (PDOException $e) {
        error_log("Error al eliminar el producto: " . $e->getMessage());  
        set_error_message_redirect('No se pudo eliminar el producto.'); 
    }

    redirect_back();
}

if (isset($_GET['delete_id'])) {
    $product_id = filter_input(INPUT_GET, 'delete_id', FILTER_SANITIZE_NUMBER_INT);

    if ($product_id && is_numeric($product_id)) {
        delete($product_id);  
    }
}

function store() {
    $imageName = saveImage();
    $pdo = getPDO();
    $isRecommended = isset($_POST['recommended']) ? 1 : 0;
    try {
        $sql = "INSERT INTO products (name, price, img_url, details, recommendation) VALUES (:name, :price, :img_url, :details, :recommendation)";
        $stmt = $pdo->prepare($sql);
        $data = [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'img_url' => $imageName != null ? 'img/'.$imageName : null,
            'details' => $_POST['details'],
            'recommendation' => $isRecommended
        ];

        $stmt->execute($data);
        
        set_success_message('Se ha agregado el producto.');
        redirect_back();
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        set_error_message_redirect($e->getMessage());
    }
}

function update($id) {
    $pdo = getPDO();
    $product = show($id);
    $imageName = saveImage();
    $isRecommended = isset($_POST['recommended']) ? 1 : 0;

    try {
        $sql = "UPDATE products SET 
                    name = :name, 
                    price = :price,
                    img_url = :img_url,
                    details = :details,
                    recommendation = :recommendation
                WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $data = [
            'id' => $id,
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'img_url' => $imageName ? 'img/'.$imageName : $product['img_url'],
            'details' => $_POST['details'],
            'recommendation' => $isRecommended
        ];

        $stmt->execute($data);
        if ($imageName && $product['img_url']) {
            $oldImagePath = __DIR__ . '/../../public/assets/img/' . $product['img_url'];
            if (file_exists($oldImagePath)) 
                unlink($oldImagePath);
        }
        
        set_success_message('Se han guardado los cambios.');
        redirect_back();
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        set_error_message_redirect($e->getMessage());
    }

    
}

// Guarda una imagen en el servidor.
function saveImage()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['img_url']) && $_FILES['img_url']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['img_url'];

        // Validar tipo de archivo (solo imágenes).
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($image['type'], $allowedTypes)) {
            set_error_message_redirect('Solo se permiten imágenes JPEG, PNG o GIF.');
        }

        // Validar tamaño (máximo 2 MB).
        if ($image['size'] > 2 * 1024 * 1024) {
            set_error_message_redirect("El tamaño de la imagen no debe exceder los 2 MB.");
        }

        // Crear una carpeta para las imágenes si no existe.
        $uploadDir = __DIR__ . '/../../public/assets/img/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true); // Crea la carpeta con permisos.
        }

        // Generar un nombre único para la imagen.
        $imageName = uniqid('img_', true) . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);

        // Mover la imagen a la carpeta de destino.
        $imagePath = $uploadDir . $imageName;
        if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
            set_error_message_redirect("Error al mover la imagen.");
        }

        return $imageName; // Retorna el nombre de la imagen.
    }
    
    return null; // Si no se subió imagen, retorna null.
}