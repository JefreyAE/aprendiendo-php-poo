<h1>Gestionar categorias.</h1>

<?php while($cat = $categorias->fetch_object()): ?>
    <?= $cat->nombre; ?>
<?php endwhile; ?>

