<?php
// Iniciamos o reanudamos la sesión actual
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de compras</title>
</head>
<body>
    <h2>Carrito de compras</h2>

    <?php 
    // Verificamos si el usuario no ha iniciado sesión
    if (!isset($_SESSION['usuario'])): ?>
        <p>Por favor <a href="login.php">inicia sesión</a> para ver tu carrito de compras.</p>
    <?php else: ?>
        <?php 
        // Verificamos si el carrito de compras no está vacío
        if (!empty($_SESSION['carrito'])): ?>
            <ul>
            <?php 
            // Obtenemos el número total de productos en el carrito
            $numProductos = count($_SESSION['carrito']);

            // Iteramos sobre el carrito de compras utilizando un bucle for con llaves
            for ($indice = 0; $indice < $numProductos; $indice++) { 
                echo "<li>" . $_SESSION['carrito'][$indice] . "</li>";
            }
        ?>
            </ul>
        <?php else: ?>
            <p>Tu carrito de compras está vacío.</p>
        <?php endif; ?>
    <?php endif; ?>

    <p><a href="index.php">Volver a la página de inicio</a></p>
</body>
</html>
