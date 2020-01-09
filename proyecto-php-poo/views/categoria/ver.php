<?php if (isset($categoria)): ?>
    <h1><?= $categoria->nombre ?></h1>
    <?php if ($listProducts->num_rows != 0): ?>
        <?php while ($product = $listProducts->fetch_object()): ?>           
            <div class="product">
                <a href="<?php base_url ?>../Producto/ver&id=<?= $product->id ?>">
                    <?php if ($product->imagen != null): ?>
                        <img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>">
                    <?php else: ?>
                        <img src="<?= base_url ?>assets/img/camiseta.png">
                    <?php endif; ?>
                    <h2><?= $product->nombre ?></h2>
                    <h2><?= $product->cat_nombre ?></h2>
                </a>
                <p><?= $product->precio ?> euros</p>
                <a href="<?=base_url?>Carrito/add&id=<?=$product->id?>" class="button">Comprar</a>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No hay productos para mostrar.</p>
    <?php endif; ?>
<?php else: ?>
    <h1>La categoria no existe</h1>
<?php endif; ?>
