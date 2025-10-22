<!-- accedemos navegando a http://localhost/tareasphp/con_BBDD/4_formulario_GET_para_leer/index.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Productos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Buscar Productos</h2>
        <form action="buscar_productos.php" method="GET">
            <label for="categoria">Categoría:</label>
            <select name="categoria" id="categoria">
                <option value="Todas">Todas</option>
                <option value="Electrónica">Electrónica</option>
                <option value="Ropa">Ropa</option>
                <option value="Hogar">Hogar</option>
                <!-- Agrega más opciones según tus categorías -->
            </select>

            <label for="precio_min">Precio mínimo:</label>
            <input type="number" name="precio_min" id="precio_min" step="0.01" min="0">

            <label for="precio_max">Precio máximo:</label>
            <input type="number" name="precio_max" id="precio_max" step="0.01" min="0">

            <button type="submit">Buscar</button>
        </form>
    </div>
</body>
</html>
