<?php

include_once 'includes/conexion.php';

// Obtener los datos del formulario

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibieron los datos de nombre y apellido.
    // Es buena práctica hacerlo para todos los valores que se usen
    if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        // Consulta SQL para verificar el usuario y la contraseña
        $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena'";
        $resultado = $conn->query($sql);

        // Verificar si se encontraron resultados
        if ($resultado->num_rows > 0) {
            // Inicio de sesión exitoso
            echo "<h2>Bienvenido, $usuario</h2>";
            echo "Tus datos personales son:<br>";
            $row = $resultado->fetch_assoc();
            echo "<li>" . $row['nombre'] . " ". $row['apellido'];
            echo "<li>" . $row['email'];

        } else {
        // Inicio de sesión fallido
        echo "<h2>Error: Usuario o contraseña incorrectos</h2>";
        }
    } else {
    echo "<p>No se recibieron datos válidos.</p>";
    }
}else {
echo "<p>No se recibieron datos de POST.</p>";
}

echo "<br>";
echo "<br>";
echo '<a href="index.php">Volver al formulario</a>';
// Cerrar conexión
$conn->close();
?>
