<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Resultados de Búsqueda</h2>
        <?php
        //Si quiero ver lo que contiene $_GET:
        var_dump($_GET);
        //var_dump($_REQUEST);
        //echo "<br>";
        //isset() se utiliza para verificar si las variables están definidas 
        //antes de intentar acceder a sus valores. 
        //Esto es importante para evitar errores
        if(isset($_GET['busqueda'])) {
            echo "<p>Búsqueda: {$_GET['busqueda']}</p>";
        }

        if(isset($_GET['categoria'])) {
            echo "<p>Categoría: {$_GET['categoria']}</p>";
        }

        if(isset($_GET['ordenar'])) {
            echo "<p>Ordenar por: {$_GET['ordenar']}</p>";
        }

        if(isset($_GET['cantidad'])) {
            echo "<p>Cantidad: {$_GET['cantidad']}</p>";
        }

        if(isset($_GET['cantidad2'])) {
            echo "<p>Cantidad2: {$_GET['cantidad2']}</p>";
        }
        ?>
    </div>
</body>
</html>
