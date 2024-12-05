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
            <th>Recomendado</th>
            <th>Imagen</th>
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
    <input type="text" id="productName" placeholder="Escribe el nombre del producto">
    <label for="productDescription">Descripción:</label>
    <input type="text" id="productDescription" placeholder="Escribe una descripción">
    <label for="productPrice">Precio:</label>
    <input type="number" id="productPrice" placeholder="Escribe el precio">

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
