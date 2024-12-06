<?php
    include_once __DIR__.'/../../../controllers/ProductController.php';

    $title = 'Agregar';
    $product = null;
    $route = SRC_URL.'/controllers/ProductController.php';

    if(isset($_GET['product_id'])) {
        $title = 'Editar';
        $id = filter_input(INPUT_GET, 'product_id', FILTER_SANITIZE_STRING);
        $product = show($id);
        $route.="?product_id=$id";
    }
?>
<!DOCTYPE html>
<html lang="Es">
<head>
        <meta charset="UTF-8">
        <title>Spectralook</title>
        
        <link rel="stylesheet" href="<?=ASSETS_URL?>/css/style.css">
        <script src="https://kit.fontawesome.com/fe8d3f6ced.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        
    </head>

<body class="body">
<a class="return" href="<?=SRC_URL?>/views/admin/products/index.php"><i class="fa-solid fa-right-to-bracket"></i></a>
<form class="form-container" id="productForm" action="<?=$route?>" method="POST" enctype="multipart/form-data">
    <h2 id="formTitle"><?=$title?> Producto</h2>
    <label for="productName">Nombre del Producto:</label>
    <input name="name" type="text" id="productName" class="colorInput" placeholder="Escribe el nombre del producto" value="<?=$product['name'] ?? ''?>">
    <label for="productDescription">Descripción:</label>
    <input name="details" type="text" id="productDescription" class="colorInput" placeholder="Escribe una descripción" value="<?=$product['details'] ?? ''?>">
    <label for="productPrice">Precio:</label>
    <input name="price" type="number" id="productPrice" class="colorInput" placeholder="Escribe el precio" value="<?=$product['price'] ?? ''?>">
    <div>
        <label for="thumbnail_image">Imagen de Miniatura</label>
        <input type="file" id="thumbnailImage" name="img_url" accept="image/*">
    </div>
    <div>
        <label for="recommendation">¿Producto recomendado?</label>
        <input type="checkbox" id="recommended" name="recommendation" value="1">
    </div>

    <div class="form-actions">
        <button type="submit" class="publish" id="publishBtn"><?=$title?></button>
        <button class="delete" id="deleteFormBtn">Eliminar</button>
    </div>
</form>