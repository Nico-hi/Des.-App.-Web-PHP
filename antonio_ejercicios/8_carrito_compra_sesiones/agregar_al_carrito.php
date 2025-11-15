<?php
// Iniciamos o reanudamos la sesión actual
session_start();

// Verificamos si el usuario está logueado y si se ha proporcionado un producto para agregar al carrito
if (isset($_SESSION['usuario']) && isset($_GET['producto'])) {
    // Obtenemos el nombre del producto de la solicitud GET
    $producto = $_GET['producto'];

    // Verificamos si la variable de sesión 'carrito' no está inicializada
    if (!isset($_SESSION['carrito'])) {
        // Si no está inicializada, la inicializamos como un array vacío
        $_SESSION['carrito'] = array();
    }

    // Agregamos el producto al final del array 'carrito'
    array_push($_SESSION['carrito'], $producto);
}

// Redirigimos al usuario de vuelta a la página de inicio
header('Location: index.php');

// Detenemos la ejecución del script de forma inmediata
exit;
?>
