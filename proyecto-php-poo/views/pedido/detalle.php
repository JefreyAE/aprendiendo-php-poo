<?php if (isset($pedido)): ?>
    <h1>Detalle del pedido</h1>

    <?php if (isset($_SESSION['admin'])): ?>
        <h3>Cambiar estado del pedido:</h3>
        <form action="<?= base_url ?>Pedido/estado" method="post">
            <input type="hidden" value="<?=$pedido->id?>" name="pedido_id"/>
            <label for='estado'>Cambiar estado:</label>
            <select name="estado">
                <option value="confirm" <?= (($pedido->estado) == 'confirm' ? 'selected' : '');?>>Pendiente</option>
                <option value="preparation" <?= (($pedido->estado) == 'preparation' ? 'selected' : '');?>>En preparación</option>
                <option value="ready" <?= (($pedido->estado) == 'ready' ? 'selected' : '');?>>Preparado para enviar</option>
                <option value="sended" <?=(($pedido->estado) == 'sended' ? 'selected' : '');?>>Enviado</option>
            </select>
            
            <input type="submit" value="Cambiar estado"/>
        </form>       
        <br>
    <?php endif; ?>

    <h3>Datos del envio</h3>
    Provincia: <?= $pedido->provincia ?> <br/>
    Distrito: <?= $pedido->distrito ?><br/>
    Canton: <?= $pedido->canton ?><br/>
    Localidad: <?= $pedido->localidad ?><br/><br/>

    <h3>Datos del pedido</h3>
    Estado: <?= Utils::showStatus($pedido->estado)?> <br/>
    Número de pedido: <?= $id ?> <br/>
    Total a pagar: <?= $pedido->coste ?> colones<br/>
    <h4>Productos:</h4>                     <br/>

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
        <h3>Total a pagar: <?= $pedido->coste ?> colones</h3>
    </div>   
<?php endif; ?>
