<?php if (isset($_SESSION['identity'])): ?>
    <h1>Dirección para el envio:</h1>
    <a href="<?= base_url ?>carrito/index">Ver los productos</a>
    <?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
        <!--<div class='alert'><strong>Pedido completado correctamente.</strong></div>-->
    <?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'failed'): ?>
        <div class='alert alert-error'><strong>Pedido fallido.</strong></div>
    <?php endif; ?>
    <?php Utils::deleteSession('pedido'); ?>    

    <form action="<?= base_url ?>/Pedido/add" method="POST">
        <label for="provincia">Provincia</label>
        <?php if (isset($_SESSION['loadprovincia'])): ?>
            <input type="text" name="provincia" value=<?= $_SESSION['loadprovincia'] ?> required/> 
            <?php Utils::deleteSession('loadprovincia'); ?>
        <?php else: ?>
            <input type="text" name="provincia" required/> 
        <?php endif; ?>   
        <?php echo isset($_SESSION['errores']) ? Utils::showError($_SESSION['errores'], "provincia") : ''; ?>

        <label for="canton">Cantón</label>
        <?php if (isset($_SESSION['loadcanton'])): ?>
            <input type="text" name="canton" value=<?= $_SESSION['loadcanton'] ?> required/> 
            <?php Utils::deleteSession('loadcanton'); ?>
        <?php else: ?>
            <input type="text" name="canton" required/> 
        <?php endif; ?>   
        <?php echo isset($_SESSION['errores']) ? Utils::showError($_SESSION['errores'], "canton") : ''; ?>    

        <label for="distrito">Distrito</label>
        <?php if (isset($_SESSION['loaddistrito'])): ?>
            <input type="text" name="distrito" value=<?= $_SESSION['loaddistrito'] ?> required/> 
            <?php Utils::deleteSession('loaddistrito'); ?>
        <?php else: ?>
            <input type="text" name="distrito" required/> 
        <?php endif; ?>   
        <?php echo isset($_SESSION['errores']) ? Utils::showError($_SESSION['errores'], "distrito") : ''; ?>    

        <label for="localidad">Localidad</label>
        <?php if (isset($_SESSION['loadlocalidad'])): ?>
            <input type="text" name="localidad" value=<?= $_SESSION['loadlocalidad'] ?> required/> 
            <?php Utils::deleteSession('loadlocalidad'); ?>
        <?php else: ?>
            <input type="text" name="localidad" required/> 
        <?php endif; ?>  
        <?php echo isset($_SESSION['errores']) ? Utils::showError($_SESSION['errores'], "localidad") : ''; ?>

        <label for="direccion">Dirección</label>
        <?php if (isset($_SESSION['loaddireccion'])): ?>
            <textarea name="direccion" required/><?= $_SESSION['loaddireccion'] ?></textarea>
        <?php Utils::deleteSession('loaddireccion'); ?>
        <?php else: ?>
            <textarea name="direccion" required/></textarea>
        <?php endif; ?> 
        <?php echo isset($_SESSION['errores']) ? Utils::showError($_SESSION['errores'], "direccion") : ''; ?>

    <input type="submit" value="Confirmar Pedido">
    </form>
    <?php Utils::deleteError(); ?>
<?php else: ?>
    <h1>Debes loguearte</h1>
    <p>Necesistas estar logueado en la web para poder realizar tu pedido.</p>
<?php endif; ?>

