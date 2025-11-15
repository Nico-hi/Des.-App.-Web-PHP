<?php
// Iniciamos o reanudamos la sesión actual
session_start();

// Incluimos el archivo de conexión a la base de datos
include_once 'includes/conexion.php';

// Verificamos si la solicitud es de tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenemos los datos del formulario
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Consultamos la base de datos para verificar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena'";
    $resultado = $conn->query($sql);

    // Verificamos si se encontró algún usuario con las credenciales proporcionadas
    if ($resultado->num_rows > 0) {
        // PASO CLAVE -> Si las credenciales son válidas, establecemos la sesión del usuario
        $_SESSION['usuario'] = $usuario;
        // Redirigimos al usuario a la página de inicio
        header('Location: index.php');
        // Detenemos la ejecución del script
        exit;
    } else {
        // Si las credenciales son incorrectas, mostramos un mensaje de error
        $error = "Usuario o contraseña incorrectos.";
    }
}
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
    <h2>Iniciar sesión</h2>
    <!-- Mostramos un mensaje de error si las credenciales son incorrectas 
, que querrá decir que vengo del código de arriba de este archivo-->
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <!-- Formulario para iniciar sesión -->
    <form action="login.php" method="post">
        <label for="usuario">Usuario:</label><br>
        <input type="text" id="usuario" name="usuario"><br>
        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena"><br><br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
