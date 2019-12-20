<h1>Crear nueva categoria.</h1>

<form action="<?=base_url?>Categoria/save" method="POST">
    <label for="nombre">Nombre de la categoria</label>
    <input for="text" name="nombre" required>
    
    <input type="submit" value="Crear">
</form>