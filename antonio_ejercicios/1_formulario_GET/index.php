<!-- accedemos navegando a http://localhost/tareasphp/con_BBDD/3_formulario_GET/index.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Búsqueda</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Formulario de Búsqueda</h2>
        <form action="mostrar_busqueda.php" method="GET">
        <!-- Formulario que enviará los datos por el método GET a "mostrar_busqueda.php" -->
        
        <!-- "form-group" para agrupar y aplicar estilo a cada campo -->
        <div class="form-group">
            <!-- El atributo "for" vincula la etiqueta con el input para mejorar la accesibilidad -->
            <label for="busqueda">Búsqueda:</label>
            <!-- Campo de texto donde el usuario escribe su búsqueda, es obligatorio rellenarlo -->
            <input type="text" id="busqueda" name="busqueda" placeholder="Ingrese su búsqueda" required>
        </div>

        <div class="form-group">
            <!-- Etiqueta para el campo de selección de categorías -->
            <label for="categoria">Categoría:</label>
            <!-- Menú desplegable para seleccionar una categoría -->
            <select id="categoria" name="categoria">
                <option value="">Seleccione una categoría</option> <!-- Opción predeterminada vacía -->
                <option value="Electrónica">Electrónica</option>
                <option value="Ropa">Ropa</option>
                <option value="Hogar">Hogar</option>
                <!-- Se pueden añadir más categorías según sea necesario -->
            </select>
        </div>

        <div class="form-group">
            <!-- Etiqueta para el campo de ordenación -->
            <label for="ordenar">Ordenar por:</label>
            <!-- Menú desplegable para elegir el criterio de ordenación -->
            <select id="ordenar" name="ordenar">
                <option value="nombre">Nombre</option> <!-- Ordenar alfabéticamente -->
                <option value="precio">Precio</option> <!-- Ordenar por precio -->
            </select>
        </div>

        <div class="form-group">
            <!-- Etiqueta para el campo de cantidad -->
            <label for="cantidad">Cantidad:</label>
            <!-- Input numérico con límites mínimo y máximo y valor inicial de 10 -->
            <input type="number" id="cantidad" name="cantidad" min="1" max="100" value="10">
        </div>

        <!-- Ejemplo sin el atributo "for" para mostrar la diferencia de enfoque al clicar -->
        <div class="form-group">
            <label>Cantidad2:</label> <!-- Sin "for", el clic no enfoca el input -->
            <input type="number" id="cantidad2" name="cantidad2" min="1" max="100" value="10">
        </div>

        <div class="form-group">
            <!-- Botón para enviar el formulario y realizar la búsqueda -->
            <button type="submit">Buscar</button>
            <!-- Botón para limpiar todos los campos del formulario -->
            <button type="reset">Limpiar</button>
        </div>
        </form>

    </div>
</body>
</html>
