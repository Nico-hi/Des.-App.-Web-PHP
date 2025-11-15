<?php
// Recibimos los datos del formulario
$origen = $_POST['origen'];
$destino = $_POST['destino'];
$fecha = $_POST['fecha'];

// Creamos una clave de búsqueda única, para que se guarde en un solo dato que en ese navegador 
// se ha buscado ya ese origen-destino
$clave_busqueda = $origen . "-" . $destino;

// Simulamos un precio inicial de 300 euros
$precio_base = 300;
$precio_final = $precio_base;

// Si ya existe la cookie, subimos el precio un 20%
if (isset($_COOKIE[$clave_busqueda])) {
    $precio_final = $precio_base * 1.20;
    $mensaje = "Has buscado este vuelo antes. El precio ha subido un 20%.";
} else {
    $mensaje = "Primera vez que buscas este vuelo.";
}

// Guardamos cookie durante 7 días
setcookie($clave_busqueda, "buscado", time() + (7 * 24 * 60 * 60), '/');
?>
<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de búsqueda</title>
</head>
<body>
    <h2>Resultado de tu búsqueda</h2>

    <p><strong>Origen:</strong> <?= htmlspecialchars($origen) ?></p>
    <p><strong>Destino:</strong> <?= htmlspecialchars($destino) ?></p>
    <p><strong>Fecha:</strong> <?= htmlspecialchars($fecha) ?></p>
    <p><strong>Precio:</strong> <?= $precio_final ?> €</p>

    <p><?= $mensaje ?></p>

    <a href="index.php">Volver al buscador</a><br>
    <a href="ver_cookies.php">Ver cookies</a>
</body>
</html>
