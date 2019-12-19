<h1>Registrarse</h1>
<?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
    <div class='alert'><strong>Registro completado correctamente.</strong></div>
<?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <div class='alert alert-error'><strong>Registro fallido. Ingresa un correo diferente.</strong></div>
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>    

<form action="<?= base_url ?>/Usuario/save" method="POST">
    <label for="nombre">Nombre</label>
    <?php if (isset($_SESSION['loadname'])): ?>
        <input type="text" name="nombre" value=<?= $_SESSION['loadname'] ?> required/> 
        <?php Utils::deleteSession('loadname'); ?>
    <?php else: ?>
        <input type="text" name="nombre" required/> 
    <?php endif; ?>   
    <?php echo isset($_SESSION['errores']) ? Utils::showError($_SESSION['errores'], "nombre") : ''; ?>

    <label for="apellidos">Apellidos</label>
    <?php if(isset($_SESSION['loadapellidos'])): ?>
        <input type="text" name="apellidos" value=<?= $_SESSION['loadapellidos'] ?> required/> 
        <?php Utils::deleteSession('loadapellidos'); ?>
    <?php else: ?>
        <input type="text" name="apellidos" required/> 
    <?php endif; ?>  
    <?php echo isset($_SESSION['errores']) ? Utils::showError($_SESSION['errores'], "apellidos") : ''; ?>

    <label for="email">Correo</label>
    <?php if (isset($_SESSION['loademail'])): ?>
        <input type="email" name="email" value=<?= $_SESSION['loademail'] ?> required/> 
        <?php Utils::deleteSession('loademail'); ?>
    <?php else: ?>
        <input type="email" name="email" required/> 
    <?php endif; ?> 
    <?php echo isset($_SESSION['errores']) ? Utils::showError($_SESSION['errores'], "email") : ''; ?>

    <label for="password">Contraseña</label>
    <?php if (isset($_SESSION['loadpassword'])): ?>
        <input type="password" name="password" value=<?= $_SESSION['loadpassword'] ?> required/> 
        <?php Utils::deleteSession('loadpassword'); ?>
    <?php else: ?>
        <input type="password" name="password" required/> 
    <?php endif; ?> 
    <?php echo isset($_SESSION['errores']) ? Utils::showError($_SESSION['errores'], "password") : ''; ?>

    <input type="submit" value="Registrar">
</form>
<?php Utils::deleteError(); ?>
