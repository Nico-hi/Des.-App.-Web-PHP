<?php
// Iniciamos o reanudamos la sesión actual
session_start();
include_once 'includes/conexion.php';
// Verificamos si el usuario está logueado y si se ha proporcionado un producto para agregar al carrito
if (isset($_SESSION['usuario'])) {
    // Obtenemos el nombre del producto de la solicitud GET
    $usuario = $_SESSION['usuario'];


    $sql = "DELETE FROM carrito WHERE usuario = '$usuario'";
    $resultado = $conn->query($sql);
}

// Redirigimos al usuario de vuelta a la página de inicio
header('Location: ver_carrito.php');

// Detenemos la ejecución del script de forma inmediata
exit;
?>