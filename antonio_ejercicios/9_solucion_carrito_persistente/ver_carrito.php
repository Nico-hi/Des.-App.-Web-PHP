<?php
// Iniciamos o reanudamos la sesión actual
session_start();
include_once 'includes/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compra</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h2>Carrito de compras</h2>

    <?php 
    // Verificamos si el usuario no ha iniciado sesión
    if (!isset($_SESSION['usuario'])): ?>
        <p>Por favor <a href="login.php">inicia sesión</a> para ver tu carrito de compras.</p>
    <?php else: ?>
        <?php 
        $usuario = $_SESSION['usuario'];
        // Verificamos si el carrito de compras no está vacío
        $sql = "SELECT * FROM carrito WHERE usuario = '$usuario'";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            for ($i = 0; $i < $resultado->num_rows; $i++) {
                $row = $resultado->fetch_assoc();
                echo "<p>{$row['producto']}</p>";
            }
            echo '<p><a href="vaciar_carrito.php">Vaciar carrito</a></p>';
        }
        else echo "<p>Tu carrito de compras está vacío.</p>";?>
        
    <?php endif; ?>

    <p><a href="index.php">Volver a la página de inicio</a></p><br><br>
    

</body>
</html>
