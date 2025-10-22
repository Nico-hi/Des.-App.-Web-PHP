<?php
include 'includes/conexion.php';
var_dump($_GET);
// Obtener la categoría de productos de la URL
$categoria = $_GET['categoria'];

// Preparar la consulta SQL dinámica basada en la categoría seleccionada
$sql = "SELECT * FROM productos WHERE categoria = '$categoria'";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
</head>
<body>
    <h1>Productos en la categoría <?php echo $categoria; ?></h1>
    <ul>
        <?php
        if ($resultado->num_rows > 0) {
            for ($i = 0; $i < $resultado->num_rows; $i++) {
                $row = $resultado->fetch_assoc();
                echo "<li>" . $row['categoria'] . " " . $row['nombre'] . "</li>";
            }
        } else {
            echo "<li>No hay tareas</li>";
        }
        // VERSIÓN CON WHILE
        // if ($resultado->num_rows > 0) {
        //     while ($row = $resultado->fetch_assoc()) {
        //         echo "<li>" . $row['nombre'] . "</li>";
        //     }
        // } else {
        //     echo "<li>No hay productos en esta categoría</li>";
        // }

        
        ?>
    </ul>
</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>



