<h1>Gestión de productos.</h1>
<a class="button button-small" href="<?=base_url?>Producto/create">
    Crear producto
</a>
<table >
    <tr>
        <th>Id</th>
        <th>Id-Categoria</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Oferta</th>
        <th>Fecha</th>
        <th>Imagen</th>
    </tr>
<?php while($producto = $productos->fetch_object()): ?>
    <tr>
        <td><?=$producto->id;?></td>
        <td><?=$producto->categoria_id;?></td>       
        <td><?=$producto->nombre;?></td>
        <td><?=$producto->descripcion;?></td>
        <td><?=$producto->precio;?></td>
        <td><?=$producto->stock;?></td>
        <td><?=$producto->oferta;?></td>
        <td><?=$producto->fecha;?></td>
        <td><?=$producto->imagen;?></td>
    </tr>
<?php endwhile; ?>
</table>