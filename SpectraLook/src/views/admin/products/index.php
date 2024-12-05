<?php
    include_once __DIR__.'/../../layouts/header.php';
            
?>

    
<h1 class="admin-prodc">Administrador de Productos</h1>


<div id="message" class="message"></div>
<button class="add-product-btn" id="addProductBtn">Agregar Producto</button>


<table class="product-list" id="productList">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Recomendado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <!-- Los productos se agregarán dinámicamente aquí -->
    </tbody>
</table>


<div class="form-container" id="productForm">
    <h2 id="formTitle">Agregar Producto</h2>
    <label for="productName">Nombre del Producto:</label>
    <input type="text" id="productName" class="colorInput" placeholder="Escribe el nombre del producto">
    <label for="productDescription">Descripción:</label>
    <input type="text" id="productDescription" class="colorInput" placeholder="Escribe una descripción">
    <label for="productPrice">Precio:</label>
    <input type="number" id="productPrice" class="colorInput" placeholder="Escribe el precio">
    <div>
        <label for="thumbnail_image">Imagen de Miniatura</label>
        <input type="file" id="thumbnailImage" name="thumbnailImage" accept="image/*">
    </div>
    <div>
        <label for="recommended">¿Producto recomendado?</label>
        <input type="checkbox" id="recommended" name="recommended">
    </div>

    <div class="form-actions">
        <button class="publish" id="publishBtn">Publicar</button>
        <button class="delete" id="deleteFormBtn">Eliminar</button>
    </div>
</div>

<?php
    include_once __DIR__.'/../../layouts/footer.php';
?>

 <script src="<?= JS_URL ?>/indexAdmin.js"></script>
</body>
</html>
