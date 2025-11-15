<!-- Accedemos navegando a http://localhost/tareasphp/con_BBDD/10_gestion_cookies_vuelos/index.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscador de vuelos (con cookies)</title>
</head>
<body>
    <h2>Simulador de búsqueda de vuelos</h2>

    <form action="buscar.php" method="post">
        <label>Origen: </label>
        <input type="text" name="origen" required><br><br>

        <label>Destino: </label>
        <input type="text" name="destino" required><br><br>

        <label>Fecha: </label>
        <input type="date" name="fecha" required><br><br>

        <button type="submit">Buscar vuelo</button>
    </form>

    <p><a href="ver_cookies.php">Ver cookies guardadas</a></p>
</body>
</html>
