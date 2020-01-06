<?php if (isset($_SESSION['idProduct'])): ?>
    <h1>Editar Producto.</h1>
    <?php $url = base_url . "Producto/save&id=".$_SESSION['idProduct']; ?>
    <?php $boton = "Modificar"; ?>
<?php else: ?>
    <h1>Crear nuevo Producto.</h1>
    <?php $url = base_url . "Producto/save"; ?>
    <?php $boton = "Crear"; ?>
<?php endif; ?>

<?php if (isset($_SESSION['regProduct']) && $_SESSION['regProduct'] == 'complete'): ?>
    <div class='alert'><strong>Registro completado correctamente.</strong></div>
<?php elseif (isset($_SESSION['regProduct']) && $_SESSION['regProduct'] == 'failed'): ?>
    <div class='alert alert-error'><strong>Registro fallido.</strong></div>
<?php endif; ?>
<?php Utils::deleteSession('regProduct'); ?>  

<?php if (isset($_SESSION['idProduct'])): ?>
    <?php $producto = Utils::showProducto($_SESSION['idProduct'])->fetch_object(); ?>
<?php endif; ?>     

<div class="form_container">
    <form action="<?= $url ?>" method="POST" enctype="multipart/form-data">

        <label for="nombre">Nombre del producto</label>
        <?php if (isset($_SESSION['idProduct'])): ?>
            <input type="text" name="nombre" value=<?= $producto->nombre ?> required/> 
        <?php elseif (isset($_SESSION['loadname'])): ?>
            <input type="text" name="nombre" value=<?= $_SESSION['loadname'] ?> required/> 
            <?php Utils::deleteSession('loadname'); ?>
        <?php else: ?>
            <input type="text" name="nombre" required>
        <?php endif; ?>   
        <?php echo isset($_SESSION['erroresProducto']) ? Utils::showError($_SESSION['erroresProducto'], "nombre") : ''; ?>

        <?php $categorias = Utils::showCategorias(); ?>
        <label for="nombre">Seleccione la categoria</label>
        <select for="text" name="categoria" >
            <?php while ($categoria = $categorias->fetch_object()): ?>  
                <?php if (isset($_SESSION['idProduct'])): ?>
                    <option value="<?= $categoria->id ?>" <?= $categoria->id == $producto->categoria_id ? 'selected' : '' ?>><?= $categoria->nombre ?></option>
                <?php else: ?>  
                    <option value="<?= $categoria->id ?>"><?= $categoria->nombre ?></option>
                <?php endif; ?>
            <?php endwhile; ?>
        </select>

        <label for="descripcion">Descripcion</label>
        <?php if (isset($_SESSION['idProduct'])): ?>
            <textarea name="descripcion" required/><?= $producto->descripcion ?> </textarea>
        <?php elseif (isset($_SESSION['loaddescripcion'])): ?>
            <textarea name="descripcion" required/><?= $_SESSION['loaddescripcion'] ?></textarea> 
            <?php Utils::deleteSession('loadname'); ?>
        <?php else: ?>
            <textarea name="descripcion" required></textarea>
        <?php endif; ?>   
        <?php echo isset($_SESSION['erroresProducto']) ? Utils::showError($_SESSION['erroresProducto'], "descripcion") : ''; ?>

        <label for="precio">Precio</label>
        <?php if (isset($_SESSION['idProduct'])): ?>
            <input type="number" name="precio" value=<?= $producto->precio ?> required/> 
        <?php elseif (isset($_SESSION['loadprecio'])): ?>
            <input type="number" name="precio" value=<?= $_SESSION['loadprecio'] ?> required/> 
            <?php Utils::deleteSession('loadprecio'); ?>
        <?php else: ?>
            <input type="number" name="precio" required>
        <?php endif; ?>   
        <?php echo isset($_SESSION['erroresProducto']) ? Utils::showError($_SESSION['erroresProducto'], "precio") : ''; ?>

        <label for="stock">Stock</label>
        <?php if (isset($_SESSION['idProduct'])): ?>
            <input type="number" name="stock" value=<?= $producto->stock ?> required/> 
        <?php elseif (isset($_SESSION['loadstock'])): ?>
            <input type="number" name="stock" value=<?= $_SESSION['loadstock'] ?> required/> 
            <?php Utils::deleteSession('loadstock'); ?>
        <?php else: ?>
            <input type="number" name="stock" required>
        <?php endif; ?>   
        <?php echo isset($_SESSION['erroresProducto']) ? Utils::showError($_SESSION['erroresProducto'], "stock") : ''; ?>

        <label for="oferta">Oferta</label>
        <?php if (isset($_SESSION['idProduct'])): ?>
            <input type="text" name="oferta" value=<?= $producto->oferta ?> required/> 
        <?php elseif (isset($_SESSION['loadoferta'])): ?>
            <input type="text" name="oferta" value=<?= $_SESSION['loadoferta'] ?> required/> 
            <?php Utils::deleteSession('loadoferta'); ?>
        <?php else: ?>
            <input type="text" name="oferta" required>
        <?php endif; ?>   
        <?php echo isset($_SESSION['erroresProducto']) ? Utils::showError($_SESSION['erroresProducto'], "oferta") : ''; ?>

        <label for="imagen">Imagen</label>
        <?php if (isset($_SESSION['idProduct']) && !empty($producto->imagen)): ?>
            <img src="<?= base_url ?>uploads/images/<?= $producto->imagen; ?>">
        <?php endif; ?>
        <input type="file" name="imagen" >

        <?php if (isset($_SESSION['idProduct'])): ?>
            <input type="hidden" value="<?= $producto->id ?>" name="id">
        <?php endif; ?>

        <input type="submit" value="<?= $boton ?>">
    </form>
    <?php Utils::deleteError() ?>
</div>