<?php
// Iniciamos o reanudamos la sesión actual
session_start();
include_once 'includes/conexion.php';
// Verificamos si el usuario está logueado y si se ha proporcionado un producto para agregar al carrito
if (isset($_SESSION['usuario']) && isset($_GET['producto'])) {
    // Obtenemos el nombre del producto de la solicitud GET
    $producto = $_GET['producto'];
    $usuario = $_SESSION['usuario'];


    $sql = "INSERT INTO carrito values ('$usuario', '$producto')";
    $resultado = $conn->query($sql);
    //Aquí faltaría control de errores
}

// Redirigimos al usuario de vuelta a la página de inicio
header('Location: index.php');

// Detenemos la ejecución del script de forma inmediata
exit;
?>
