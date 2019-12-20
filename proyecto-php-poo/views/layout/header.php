<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Tienda de camisetas</title>
        <link rel="stylesheet" type="text/css" href="<?=base_url?>/assets/css/styles.css">

    </head>
    <body>
        <div id="container">
            <!-- Cabecera -->
            <header id="header">
                <div id="logo">
                    <img src="<?=base_url?>/assets/img/camiseta.png" alt="camiseta Logo"/>
                    <a href="index.php">
                        Tienda de camisetas
                    </a>
                </div>
            </header>
            <!-- Menu -->
             <?php $categorias = Utils::showCategorias() ?>
            <nav id="menu">
                <ul>
                    <li>
                        <a href="<?=base_url?>">Inicio</a>
                    </li>
                    <?php while($categoria = $categorias->fetch_object()): ?>
                    <li>
                        <a href="<?=base_url?>"><?=$categoria->nombre?></a>
                    </li>      
                    <?php endwhile;?>
                </ul>
            </nav>
            <div id="content">
