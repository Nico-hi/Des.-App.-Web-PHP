<?php

include_once 'includes/conexion.php';

// Obtener los datos del formulario

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibieron los datos de nombre y apellido.
    // Es buena práctica hacerlo para todos los valores que se usen
    if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
        $usuario = htmlspecialchars($_POST['usuario']);
        $contrasena = htmlspecialchars($_POST['contrasena']);

        // Genera un hash seguro de la contraseña utilizando bcrypt
        $hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

        // Inserta el usuario y el hash de la contraseña en la base de datos
        $sql = "INSERT INTO usuarios_hash (usuario, contrasena) VALUES ('$usuario', '$hash_contrasena')";
        $resultado = $conn->query($sql);
        // Se comprueba si ha ido bien la sql
        if ($resultado === TRUE) {
            echo "Nuevo registro creado con éxito";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
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
