<?php if ($gestion): ?>
    <h1>Gestión de pedidos</h1>
<?php else: ?>
    <h1>Mis Pedidos</h1>
<?php endif; ?>

<table class="carrito">
    <tr>
        <th># de pedido</th>
        <th>Coste</th>
        <th>Fecha</th>
        <th>Estado</th>
    </tr>
    <?php
    while ($pedido = $lista_pedidos->fetch_object()):
        ?>
        <tr>
            <td><a href="<?= base_url ?>Pedido/detalle&id=<?= $pedido->id ?>"><?= $pedido->id ?></a></td>
            <td><?= $pedido->coste ?> colones</td>
            <td><?= $pedido->fecha ?></td>
            <td><?= $pedido->estado ?></td>
        </tr>
    <?php endwhile; ?>
</table>
<br>







