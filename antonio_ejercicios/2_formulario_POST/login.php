<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar Datos</title>
</head>
<body>
    <h2>Datos del Usuario:</h2>
    <?php
    //por si queremos ver lo que tiene $_POST
    //echo var_dump($_POST);
    // Verificar si se enviaron datos mediante POST, con GET esto no haría falta
    // porque por defecto se usa GET
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];

            // Mostrar los datos recibidos
            echo "<p>Nombre: $nombre</p>";
            echo "<p>Apellido: $apellido</p>";

    } else {
        echo "<p>No se recibieron datos mediante POST.</p>";
    }
    ?>
    <br>
    <a href="index.php">Volver al formulario</a>
</body>
</html>
