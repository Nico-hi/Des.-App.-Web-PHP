<?php
// Iniciamos la sesión para mantener la persistencia de datos entre páginas
session_start();

// Imprimir la cabecera HTML
echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página de inicio</title>
</head>
<body>';

// Verificar si el usuario está autenticado
if (isset($_SESSION['usuario'])) {
    // Saludo personalizado
    echo '<h1>Bienvenido a nuestra tienda en línea</h1>';
    echo '<p>Hola, ' . $_SESSION['usuario'] . '<br><br>';
    echo '<a href="logout.php">Cerrar sesión</a></p>';

    // Lista de productos disponibles
    echo '<h2>Productos</h2>';
    echo '<ul>';
    echo '<li>Producto 1 - $10 <a href="agregar_al_carrito.php?producto=Producto1">Agregar al carrito</a></li>';
    echo '<li>Producto 2 - $15 <a href="agregar_al_carrito.php?producto=Producto2">Agregar al carrito</a></li>';
    echo '</ul>';

    // Enlace para ver el carrito de compras
    echo '<p><a href="ver_carrito.php">Ver carrito de compras</a></p>';
} else {
    // Si el usuario no está autenticado, mostramos un enlace para iniciar sesión
    echo '<h1>Bienvenido a nuestra tienda en línea</h1>';
    echo '<p><a href="login.php">Iniciar sesión</a> para agregar productos al carrito.</p>';
}

// Cerrar la etiqueta de cuerpo y HTML
echo '</body>
</html>';
?>
