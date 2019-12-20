<h1>Gestionar categorias.</h1>
<a class="button button-small" href="<?=base_url?>Categoria/create">Crear categoria</a>
<table >
    <tr>
        <th>Número de Id</th>
        <th>Nombre de categoria</th>
    </tr>
<?php while($cat = $categorias->fetch_object()): ?>
    <tr>
        <td><?=$cat->id;?></td>
        <td><?=$cat->nombre;?></td>
    </tr>
<?php endwhile; ?>
</table>

