<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>
    <h1>Carrito de Compras</h1>
    <table class="carrito">
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Acciones</th>
        </tr>
        <?php
        foreach ($_SESSION['carrito'] as $indice => $elemento):
            $producto = $elemento['producto']
            ?>
            <tr>

                <td>
                    <a href="<?= base_url ?>Producto/ver&id=<?= $producto->id ?>">
                        <?php if ($producto->imagen != null): ?>
                            <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class='img_carrito'>
                        <?php else: ?>
                            <img src="<?= base_url ?>assets/img/camiseta.png" class='img_carrito'>
                        <?php endif; ?>
                    </a>
                </td>

                <td>
                    <a href="<?= base_url ?>Producto/ver&id=<?= $producto->id ?>"><?= $producto->nombre; ?></a>
                </td>
                <td><?= $producto->precio ?></td>
                <td>

                    <?= $elemento['unidades']; ?>
                    <div class="updown-unidades">
                        <a href="<?= base_url ?>Carrito/up&indice=<?= $indice ?>" class="button">+</a>
                        <a href="<?= base_url ?>Carrito/down&indice=<?= $indice ?>" class="button ">-</a>
                    </div>
                </td>
                <td><a href="<?= base_url ?>Carrito/remove&indice=<?= $indice ?>" class="button button-carrito button-red">Quitar</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <div class="delete-carrito">
        <a href="<?= base_url ?>Carrito/delete_all" class="button button-red">Vaciar carrito</a>
    </div>
    <div class="total-carrito">
        <?php $stats = Utils::statsCarrito(); ?>
        <h3>Precio Total: <?= $stats['total'] ?> colones</h3>
        <a href="<?= base_url ?>Pedido/index" class="button button-pedido">Hacer pedido</a>
    </div>
<?php else: ?>
    <p>No hay productos para mostrar.</p>
<?php endif; ?>
