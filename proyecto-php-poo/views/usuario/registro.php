<h1>Registrarse</h1>
<form action="index.php?controller=Usuario&action=save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required/> 
    
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" required/> 
    
    <label for="email">Correo</label>  
    <input type="email" name="email" required/> 
    
    <label for="password">Contraseña</label>
    <input type="password" name="passworde" required/> 
    
    <input type="submit" value="Registrar">
</form>
