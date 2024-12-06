<?php
    include_once __DIR__.'/../../layouts/header.php';
    include_once __DIR__.'/../../../controllers/ProductController.php';

    $title = 'Agregar';
    $product = null;
    $route = SRC_URL.'/controllers/ProductController.php';

    if(isset($GET['product_id'])) {
        $title = 'Editar';
        $id = filter_input(INPUT_GET, 'product_id', FILTER_SANITIZE_STRING);
        $product = getAProduct($id);
        $toDelete = isset($_GET['toDelete']) ? $_GET['toDelete'] : 'false';
        $route.="?product_id=$id&toDelete=$toDelete";
    }
    echo $product;
?>

<form class="form-container" id="productForm" action="<?$route">
    <h2 id="formTitle"><?=$title?> Producto</h2>
    <label for="productName">Nombre del Producto:</label>
    <input type="text" id="productName" class="colorInput" placeholder="Escribe el nombre del producto" value="<?=$product['name'] ?? ''?>">
    <label for="productDescription">Descripción:</label>
    <input type="text" id="productDescription" class="colorInput" placeholder="Escribe una descripción" value="<?=$product['details'] ?? ''?>">
    <label for="productPrice">Precio:</label>
    <input type="number" id="productPrice" class="colorInput" placeholder="Escribe el precio" value="<?=$product['price'] ?? ''?>">
    <div>
        <label for="thumbnail_image">Imagen de Miniatura</label>
        <input type="file" id="thumbnailImage" name="thumbnailImage" accept="image/">
    </div>
    <div>
        <label for="recommended">¿Producto recomendado?</label>
        <input type="checkbox" id="recommended" name="recommended">
    </div>

    <div class="form-actions">
        <button class="publish" id="publishBtn">Publicar</button>
        <button class="delete" id="deleteFormBtn">Eliminar</button>
    </div>
</form>