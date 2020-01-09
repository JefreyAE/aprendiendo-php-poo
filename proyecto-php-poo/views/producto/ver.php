<h1>Detalle del producto</h1>
<?php if (isset($producto)): ?>   
    <div id='detail-product'>
        <div class="image">
            <?php if ($producto->imagen != null): ?>
                <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>">
            <?php else: ?>
                <img src="<?= base_url ?>assets/img/camiseta.png">
            <?php endif; ?>
        </div>
        <div class="data">
            <h2 class="description"><?= $producto->nombre ?></h2>
            <p class="price"><?= $producto->precio ?> colones</p>
            <a href="<?=base_url?>Carrito/add&id=<?=$producto->id?>" class="button">Comprar</a>
        </div>
    </div>
<?php else: ?>
    <h1>El producto no existe.</h1>
<?php endif; ?>


