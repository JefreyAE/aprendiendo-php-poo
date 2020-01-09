<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
    <h1>Tu pedido se ha confirmado</h1>
    <p>
        Tu pedido a sido guardado con exito, una vez realices la transferencia 
        bancaria a la cuenta #xxx xxxxx con el coste del pedido, será procesado y enviado.
    </p>

    <br>
    <?php if (isset($pedido)): ?>
        <h3>Datos del pedido</h3>

        Número de pedido: <?= $pedido->id ?> <br/>
        Total a pagar: <?= $pedido->coste ?> colones<br/>
        Productos:                          <br/>

        <table class="carrito">
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidades</th>
            </tr>

            <?php while ($producto = $lista_productos->fetch_object()): ?>   
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
                    <td><?= $producto->unidades ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
        <br>
        <div class="total-carrito">
            <?php $stats = Utils::statsCarrito(); ?>
            <h3>Total a pagar: <?= $stats['total'] ?> colones</h3>
        </div>    

    <?php else: ?>
    <?php endif; ?>
<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>
    <h1>Tu pedido NO se ha confirmado</h1>
<?php endif; ?>
    
