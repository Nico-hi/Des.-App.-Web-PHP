<!-- Accedemos navegando a http://localhost/tareasphp/con_BBDD/8_carrito_compra_sesiones/index.php -->

<?php
// Iniciamos la sesión para mantener la persistencia de datos entre páginas
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página de inicio</title>
</head>
<body>
    <h1>Bienvenido a nuestra tienda en línea</h1>
    <!-- Si ha he iniciado sesión, existirá $_SESSION['usuario'], 
    dado que lo habré definido antes en el formulario de login.php-->
    <?php if (isset($_SESSION['usuario'])): ?>
        <!-- Si el usuario está autenticado, mostramos un saludo personalizado -->
        <p>Hola, <?php echo $_SESSION['usuario']; ?> <br><br>
        <a href="logout.php">Cerrar sesión</a></p>

        <!-- Lista de productos disponibles -->
        <h2>Productos</h2>
        <ul>
            <!-- Enlaces para agregar productos al carrito con parámetros de producto -->
            <li>Producto 1 - $10 <a href="agregar_al_carrito.php?producto=Producto1">Agregar al carrito</a></li>
            <li>Producto 2 - $15 <a href="agregar_al_carrito.php?producto=Producto2">Agregar al carrito</a></li>
        </ul>
            <!-- Enlace para ver el carrito de compras -->
    <p><a href="ver_carrito.php">Ver carrito de compras</a></p>

    <?php else: ?>
        <!-- Si el usuario no está autenticado, mostramos un enlace para iniciar sesión -->
        <p><a href="login.php">Iniciar sesión</a> para agregar productos al carrito.</p>
    <?php endif; ?>


</body>
</html>

