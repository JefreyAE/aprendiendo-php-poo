<h1>Gestión de productos.</h1>

<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
<div class='alert'><strong>Borrado completado correctamente.</strong></div>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'): ?>
<div class='alert alert-error'><strong>Borrado fallido.</strong></div>
<?php endif; ?>
<?php Utils::deleteSession('delete')?>

<a class="button button-small" href="<?=base_url?>Producto/create">
    Crear producto
</a>
<table >
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Oferta</th>
        <th>Fecha</th>
        <th>Imagen</th>
        <th>Acciones</th>
    </tr>
<?php while($producto = $productos->fetch_object()): ?>
    <tr>
        <td><?=$producto->id;?></td>    
        <td><?=$producto->nombre;?></td>
        <td><?=$producto->descripcion;?></td>
        <td><?=$producto->precio;?></td>
        <td><?=$producto->stock;?></td>
        <td><?=$producto->oferta;?></td>
        <td><?=$producto->fecha;?></td>
        <td><img src="<?=base_url?>uploads/images/<?=$producto->imagen;?>"></td>  
        <td>
            <a href="<?=base_url?>producto/edit&id=<?=$producto->id?>" class="button button-action">Editar</a>
            <a href="<?=base_url?>producto/delete&id=<?=$producto->id?>" class="button button-action button-red">Eliminar</a>
        </td>
    </tr>
    
<?php endwhile; ?>
</table>