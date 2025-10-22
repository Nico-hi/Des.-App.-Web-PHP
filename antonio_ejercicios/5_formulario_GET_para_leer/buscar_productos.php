<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos Filtrados</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Productos Filtrados</h2>
        <?php
        // Incluir el archivo que contiene la configuración y conexión a la base de datos
        include 'includes/conexion.php';
        //echo var_dump($_GET);
        // Obtener los parámetros enviados por el usuario a través de la URL (método GET)
        $categoria = $_GET['categoria'];   // Categoría seleccionada por el usuario
        $precio_min = $_GET['precio_min']; // Precio mínimo ingresado en el filtro
        $precio_max = $_GET['precio_max']; // Precio máximo ingresado en el filtro

        // Construir la consulta SQL inicial sin filtros específicos
        $sql = "SELECT * FROM Productos WHERE 1"; // WHERE 1 permite añadir condiciones dinámicamente

        // Agregar filtro por categoría si el usuario no seleccionó 'Todas'
        if ($categoria !== 'Todas') {
            $sql = $sql . " AND categoria = '$categoria'"; // Filtrar productos por la categoría elegida
        }

        // Agregar filtro por precio mínimo si el usuario ingresó un valor
        if (!empty($precio_min)) {
             $sql = $sql . " AND precio >= $precio_min"; // Filtrar productos con precio mayor o igual al mínimo
        }

        // Agregar filtro por precio máximo si el usuario ingresó un valor
        if (!empty($precio_max)) {
             $sql = $sql . " AND precio <= $precio_max"; // Filtrar productos con precio menor o igual al máximo
        }

        // Ejecutar la consulta en la base de datos
        $result = $conexion->query($sql);

        // Verificar si la consulta devolvió resultados
        if ($result->num_rows > 0) {
            // Recorrer cada fila de los resultados utilizando un bucle for
            for ($i = 0; $i < $result->num_rows; $i++) {
                // Obtener la fila actual como un array asociativo
                $row = $result->fetch_assoc();
                echo var_dump($row);
                // Mostrar la información del producto en un párrafo
                echo "<p>{$row['nombre']} - {$row['categoria']} - {$row['precio']}</p>";
            }
        } else {
            // Mostrar un mensaje si no se encontraron productos que coincidan con los filtros
            echo "No se encontraron productos con los criterios seleccionados.";
        }

        // Cerrar la conexión con la base de datos para liberar recursos
        $conexion->close();
        ?>
    </div>
    <a href="index.php">Volver a inicio</a>
</body>
</html>
