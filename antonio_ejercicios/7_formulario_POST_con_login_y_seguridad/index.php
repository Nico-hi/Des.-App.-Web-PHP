<!-- Accedemos navegando a http://localhost/tareasphp/con_BBDD/7_formulario_POST_con_login_y_seguridad/index.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="form-container">
    <h2>Iniciar sesión</h2>
    <form action="login.php" method="POST">
        <label for="usuario">Usuario:</label><br>
        <input type="text" id="usuario" name="usuario" required><br>
        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena" required><br><br>
        <input type="submit" value="Iniciar sesión">
    </form>
    </div>

    <div class="form-container">
    <h2>Registrar nuevo usuario</h2>
    <form action="registrar.php" method="POST">
        <label for="usuario">Usuario:</label><br>
        <input type="text" id="usuario" name="usuario" required><br>
        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena" required><br><br>
        <input type="submit" value="Registrar">
    </form>
    </div>
</body>
</html>
