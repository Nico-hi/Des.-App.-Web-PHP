<!-- Accedemos navegando a http://localhost/tareasphp/con_BBDD/6_formulario_POST_con_login/index.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Iniciar sesión</h2>
    <form action="login.php" method="POST">
        <label for="usuario">Usuario:</label><br>
        <input type="text" id="usuario" name="usuario" required><br>
        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena" required><br><br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
