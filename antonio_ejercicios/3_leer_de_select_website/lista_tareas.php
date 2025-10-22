<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tareas</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Lista de Tareas</h1>
    <ul>
        <?php
        include 'includes/conexion.php';

        // Realizar la consulta para obtener las tareas
        $sql = "SELECT * FROM tasks";
        $resultado = $conn->query($sql);
        // Iterar sobre los resultados y mostrar las tareas
        //VERSION WHILE:
        /*if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                echo "<li>" . $row['id'] . " " . $row['task'] . "</li>";
            }
        } else {
            echo "<li>No hay tareas</li>";
        }*/
        //VERSION FOR:
        for ($i = 0; $i < $resultado->num_rows; $i++) {
            $row = $resultado->fetch_assoc();
            //esta linea es solo para que veais en lo que se convierte $row
            var_dump($row);
            echo "<li>" . $row['id'] . " " . $row['task'] . "</li>";
        }
        ?>
    </ul>
    <br>
    <a href="index.php">Volver a inicio</a>
</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
