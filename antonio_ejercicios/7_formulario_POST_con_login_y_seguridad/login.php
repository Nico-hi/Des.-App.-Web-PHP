<?php

include_once 'includes/conexion.php';

// Obtener los datos del formulario

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibieron los datos de nombre y apellido.
    // Es buena práctica hacerlo para todos los valores que se usen
    if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
        //evito ataque 
        $usuario = htmlspecialchars($_POST['usuario']);
        //SI PONGO un echo de la variable E INTRODUZCO EL VALOR 
        //<script>alert('hacked')</script> en el formulario,
        // o utilizo antes el htmlspecialchars o me saltará la alerta
        //echo "Usuario: " . $usuario;
        $contrasena_introducida = htmlspecialchars($_POST['contrasena']);

        // Consulta SQL para verificar el usuario y la contraseña
        $sql = "SELECT * FROM usuarios_hash WHERE usuario='$usuario'";
        $resultado = $conn->query($sql);
        // Verificar si se encontraron resultados
        if ($resultado->num_rows > 0) {
            //recupero el hash almacenado
            $row = $resultado->fetch_assoc();
            $hash_almacenado = $row["contrasena"];

            //vemos si el hash de la contraseña introducida coindice con el almacenado
            if (password_verify($contrasena_introducida, $hash_almacenado)) {    
                //Login exitoso
                echo "<h2>Bienvenido, $usuario</h2>";
                echo "¡Contraseña válida!";
            } else {
                //los hash no coindicen
                echo "<h2>Error: Usuario o contraseña incorrectos</h2>";
            }

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
