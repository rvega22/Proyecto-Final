<?php 
require_once __DIR__.'/../helpers/functions.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    clean_post_inputs();
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $toDelete = filter_var($_GET['toDelete'] ?? false, FILTER_VALIDATE_BOOLEAN);
    if($id && !$toDelete) {
        editProduct($id);
    } elseif($id && $toDelete){
        deleteProduct($id);
    } else {
        createProduct();
    }
}

function deleteProduct($id)
{
    $pdo = getPDO();

    try {
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    } catch (PDOException $e) {
        error_log("Error al consultar los productos: " . $e->getMessage());
    }
}

function createProduct()
{
    $imageName = saveImage();

    $pdo = getPDO();

    try {
        $sql = "INSERT INTO products (name, price, img_url, details) VALUES (:name, :price, :img_url, :details)";
        $stmt = $pdo->prepare($sql);
        $data = [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'img_url' => $imageName != null ? 'img/'.$imageName : null,
            'details' => $_POST['details']
        ];

        $stmt->execute($data);
    } catch (PDOException $e) {
        error_log("Error al consultar los productos: " . $e->getMessage());
    }
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

function getAProduct($id) {
    $id = htmlspecialchars($id);

    if($id === null) {
        return [];
    }

    $pdo = getPDO();

    try {
        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$product) {
            return [];
        }

        return $product;
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        return [];
    }
}

function editProduct($id) {
    $pdo = getPDO();
    $product = getAProduct($id);
    $imageName = saveImage();

    try {
        $sql = "UPDATE product SET
                    id = :id,
                    name = :name,
                    price = :price,
                    img_url = :img_url,
                    details = :details";
        $stmt = $pdo->prepare($sql);
        $data = [
            'id' => $id,
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'img_url' => $imageName != null ? 'img/'.$imageName : $product['img_url'],
            'details' => $_POST['details']
        ];

        $stmt->execute($data);

        if ($imageName && $product['img_url']) {
            $oldImagePath = __DIR__ . '/../../../../public/assets/img/' . $product['image_url'];
            if (file_exists($oldImagePath)) 
                unlink($oldImagePath); // Elimina la imagen antigua.
        }
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
    }
}

function saveImage()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image'];

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