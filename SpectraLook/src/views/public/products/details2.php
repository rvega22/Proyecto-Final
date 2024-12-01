<?php 

include_once  __DIR__ .'/../layouts/header.php';
$product = getProductData();
?>
<?php if($product != null): ?>
<h2><?=$$product['name']?></h2>
<?php else: ?>
    <h2>No se encontró la carrera seleccionada.</h2>
    <a href="<?=BASE_URL?>">Volver al inicio</a>
<?php endif; ?>

<?php
include_once  __DIR__ .'/../layouts/footer.php';
?>