<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Tienda de camisetas</title>
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css">

    </head>
    <body>
        <div id="container">
            <!-- Cabecera -->
            <header id="header">
                <div id="logo">
                    <img src="assets/img/camiseta.png" alt="camiseta Logo"/>
                    <a href="index.php">
                        Tienda de camisetas
                    </a>
                </div>
            </header>
            <!-- Menu -->
            <nav id="menu">
                <ul>
                    <li>
                        <a href="#">Inicio</a>
                    </li>
                    <li>
                        <a href="#">Categoria1</a>
                    </li>
                    <li>
                        <a href="#">Categoria2</a>
                    </li>
                    <li>
                        <a href="#">Categoria3</a>
                    </li>
                    <li>
                        <a href="#">Categoria4</a>
                    </li>              
                </ul>
            </nav>
            <div id="content">
                <!-- Barra Lateral -->
                <aside id="lateral">
                    <div id="login" class="block_aside">
                        <h3>Entrar a la web</h3>
                        <form actin="#" method="POST">
                            <label for="email">Email</label>
                            <input type="email" name="email">
                            <label for="password">Constraseña</label>
                            <input type="password" name="password">
                            <input type="submit" value="Enviar">
                        </form>
                        <ul>
                            <li><a href="#">Mis pedidos</a></li>
                            <li><a href="#">Gestionar pedidos</a></li>
                            <li><a href="#">Gestionar categorias</a></li>
                        </ul>
                    </div>
                </aside>
                <!-- Contenido central -->
                <div id="central">
                    <h1>Productos destacados</h1>
                    <div class="product">
                        <img src="assets/img/camiseta.png">
                        <h2>Camiseta Azul Ancha</h2>
                        <p>30 euros</p>
                        <a href="$" class="button">Comprar</a>
                    </div>
                    <div class="product">
                        <img src="assets/img/camiseta.png">
                        <h2>Camiseta Azul Ancha</h2>
                        <p>30 euros</p>
                        <a href="#" class="button">Comprar</a>
                    </div>
                    <div class="product">
                        <img src="assets/img/camiseta.png">
                        <h2>Camiseta Azul Ancha</h2>
                        <p>30 euros</p>
                        <a href="#" class="button">Comprar</a>
                    </div>

                </div>    
            </div>     
            <!-- Pie de página -->
            <footer id="footer">
                <p>Desarrollado por Jefrey Arias &copy; <?= date('Y'); ?> </p>
            </footer>
        </div>        
    </body>

</html>