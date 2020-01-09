<h1>Algunos de nuestros productos</h1>
<?php if (isset($list)): ?>
    <?php while ($product = $list->fetch_object()): ?>
        <div class="product">
            <a href="<?php base_url ?>Producto/ver&id=<?= $product->id ?>">
                <?php if ($product->imagen != null): ?>
                    <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>">
                <?php else: ?>
                    <img src="<?= base_url ?>assets/img/camiseta.png">
                <?php endif; ?>
                <h2><?= $product->nombre ?></h2>
            </a>
                <p><?= $product->precio ?> euros</p>
            <a href="<?=base_url?>Carrito/add&id=<?=$product->id?>" class="button">Comprar</a>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

