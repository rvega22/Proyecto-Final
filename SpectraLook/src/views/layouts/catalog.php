<?php
require_once __DIR__ . '/../../controllers/ProductController.php';
$products = index(); // Obtener todos los productos de la base de datos.
?>
<div class="centrarTitulo">
    <h2>Catálogo</h2>
</div>
<nav class="centrar_nav">
    <?php foreach ($products as $product): ?>
        <div class="target">
            <a href="<?= BASE_URL ?>/../src/views/public/products/details.php?product_id=<?= $product['id'] ?>">
                <img class="target_img centrar_img" src="<?= ASSETS_URL ?>/<?= htmlspecialchars($product['img_url']) ?>" alt="Imagen de <?= htmlspecialchars($product['name']) ?>">
                <h2 class="letra" id="tamanio"><?= htmlspecialchars($product['name']) ?></h2>
                <p class="alinear_texto">$ <?= htmlspecialchars($product['price']) ?></p>
            </a>
        </div>
    <?php endforeach; ?>
</nav>