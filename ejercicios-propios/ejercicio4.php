<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio4</title>
</head>

<body>

    <?php
    $name = htmlspecialchars($_GET['name_2']);
    file_put_contents(__DIR__ . '/mensaje.txt', date('Y-m-d H:i:s') . " se subio al archivo el $name <br>", FILE_APPEND);
    if (file_exists(__DIR__ . '/mensaje.txt')) {
        $filas = file_get_contents(__DIR__ . "/mensaje.txt", false);
        echo $filas;
    }

    ?>


    <?php
    // Pedir y añadir mensaje de forma segura
    $msg = htmlspecialchars($_GET['name_2'] ?? '', ENT_QUOTES, 'UTF-8');
    if ($msg) {
        file_put_contents(
            __DIR__ . '/mensajes.txt',
            date('Y-m-d H:i:s') . " : $msg\n",
            FILE_APPEND
        );
    }

    // Leer y mostrar, línea a línea:
    if (file_exists(__DIR__ . '/mensajes.txt')) {
        $lineas = file(__DIR__ . '/mensajes.txt', FILE_IGNORE_NEW_LINES);
        foreach ($lineas as $linea) {
            echo htmlentities($linea) . "<br>";
        }
    }
    ?>
</body>

</html>