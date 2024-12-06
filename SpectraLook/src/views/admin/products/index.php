<?php
    include_once __DIR__.'/../../layouts/header.php';
    include_once __DIR__.'/../../../controllers/ProductController.php';
    $products = index();
?>

    
<h1 class="admin-prodc">Administrador de Productos</h1>


<div id="message" class="message"></div>
<button class="add-product-btn" id="addProductBtn"><a href="<?=BASE_URL?>/../src/views/admin/products/form.php">Agregar Producto</a></button>


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
        <?php foreach($products as $product): ?>
        <tr>
            <td><?=$product['name']?></td>
            <td><?=$product['details']?></td>
            <td><?=$product['price']?></td>
            <td><img src="../../../../public/assets/<?=$product['img_url']?>" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;" alt=""></td>
            <td><?= $product['recommendation'] == 1 ? 'Sí' : 'No' ?></td>
            <td>
                <a href="<?=BASE_URL?>/../src/views/admin/products/form.php?product_id=<?=$product['id']?>">Editar</a>
                <a href="<?=BASE_URL?>/../src/views/admin/products/form.php?delete_id=<?=$product['id']?> ">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
    include_once __DIR__.'/../../layouts/footer.php';
?>

 <script src="<?= JS_URL ?>/indexAdmin.js"></script>
</body>
</html>
