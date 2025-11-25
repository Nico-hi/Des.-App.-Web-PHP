<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio2y3</title>
</head>
<body>
    <?php
        $name = htmlspecialchars($_GET['name_1']);
        echo "saludo => Hola $name  <br>";
        $nombre=$name;
        $valor=$_COOKIE[$name]??1;
        $time=0;
        $paht="/";
        if(!isset($_COOKIE[$name])){
            setcookie($nombre,$valor,$time,$paht);
        }else{
            $valor++;
            setcookie($nombre,$valor,$time,$paht);

        }
        echo "Bienvenido $name, accesos: $valor";
    ?>


    ?>

    <?php
    // Recogida de nombre del formulario, SIEMPRE escapa
    $name = htmlspecialchars($_GET['name_1'] ?? '', ENT_QUOTES, 'UTF-8');

    echo "saludo => Hola $name <br>";

    // Gestión de cookie de accesos por usuario (ojo valor inicial como string)
    $cookieName = "accesos_" . strtolower($name);
    $accesos = isset($_COOKIE[$cookieName]) ? (int) $_COOKIE[$cookieName] : 0;
    $accesos++;
    // Cookie que dura 1 día, en la raíz
    setcookie($cookieName, $accesos, time() + 86400, "/");

    echo "Bienvenido $name, accesos: $accesos";
    ?>
</body>
</html>