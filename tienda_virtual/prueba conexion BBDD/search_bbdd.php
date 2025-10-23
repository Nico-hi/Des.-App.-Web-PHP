<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search PHP</title>
</head>
<body>
    <?php
    // Recoge valores del formulario
    $action = $_POST['action'] ?? '';
    $tabla = $_POST['valor_tabla'] ?? '';
    $select = $_POST['valor_vista'] ?? [];
    $condition = trim($_POST['condition'] ?? '');
    $values = trim($_POST['values'] ?? '');
    $set = trim($_POST['set'] ?? '');

    // Valida mínimo los campos base
    if ($action === '' || $tabla === '') {
        echo "No seleccionaste una opción o una tabla.<br>";
        echo '<a href="./index.php">regresar de pagina</a>';
        exit;
    }
    if (($action === "select" || $action === "delete") && empty($select)) {
        echo "Debes seleccionar al menos un campo.<br>";
        echo '<a href="./index.php">regresar de pagina</a>';
        exit;
    }

    // Resuelve alias tabla
    $table_query = ($tabla === "ambos") ? "usuario u join ventas v on u.id = v.id" : $tabla;
    $campos = is_array($select) ? implode(", ", $select) : $select;
    $sql = "";

    // Genera consultas SQL según la acción
    if ($action === "select") {
        $cond = $condition !== "" ? $condition : "1";
        $sql = "SELECT $campos FROM $table_query WHERE $cond";
    } elseif ($action === "insert") {
        if ($values === "") {
            echo "Debes rellenar los valores a insertar.<br>";
            echo '<a href="./index.php">regresar de pagina</a>';
            exit;
        }
        $sql = "INSERT INTO $table_query ($campos) VALUES ($values)";
    } elseif ($action === "delete") {
        $cond = $condition !== "" ? $condition : "1";
        $sql = "DELETE FROM $table_query WHERE $cond";
    } elseif ($action === "update") {
        if ($set === "") {
            echo "Debes rellenar el dato a actualizar (SET campo=valor).<br>";
            echo '<a href="./index.php">regresar de pagina</a>';
            exit;
        }
        $cond = $condition !== "" ? $condition : "1";
        $sql = "UPDATE $table_query SET $set WHERE $cond";
    } else {
        $sql = "Acción no reconocida.";
    }

    echo htmlspecialchars($sql);
    ?>
    <br>
    <a href="./index.php">regresar de pagina</a>
</body>
</html>
