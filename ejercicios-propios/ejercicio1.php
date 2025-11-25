<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio1</title>
</head>

<body>
    <?php
    $arrar_asociativo_1 = array("nicolas" => 19, "nick" => 23, "santiago" => 17, "david" => 18, "alex" => 16);
    foreach ($arrar_asociativo_1 as $key => $value) {
        echo " el nombre es <b>$key</b> y su edad es <b>$value</b> <br>";
    }

    foreach ($arrar_asociativo_1 as $key => $value) {
        if ($value >= 18) {
            echo "clave => $key <br>";
        }
    }

    $arrar_asociativo_1['manuel'] = 28;

    $mayor_edad = 0;
    foreach ($arrar_asociativo_1 as $key => $value) {
        ($mayor_edad < $value) ? $mayor_edad = $value : '';
    }
    echo "mayor edad, valor => $mayor_edad <br>";
    ?>
<h2>saludas y cookies</h2>
    <form action="ejercicio2y3.php" method="get">
        <input type="text" name="name_1" id="name_1">
        <input type="submit" value="send">
    </form>
<h2>ficheros</h2>
        <form action="ejercicio4.php" method="get">
        <input type="text" name="name_2" id="name_2">
        <input type="submit" value="send">
    </form>
    <?php
// Creo el array con los nombres y edades
$usuarios = [
    "nicolas" => 19, 
    "nick" => 23,
    "santiago" => 17,
    "david" => 18, 
    "alex" => 16
];

// Mostrar todos y sus edades
foreach ($usuarios as $nombre => $edad) {
    echo "El nombre es <b>$nombre</b> y su edad es <b>$edad</b><br>";
}

// Imprimir SOLO los mayores o iguales a 18
echo "<br>Mayores de edad:<br>";
foreach ($usuarios as $nombre => $edad) {
    if ($edad >= 18) {
        echo "clave => $nombre<br>";
    }
}

// Añadir nuevo usuario
$usuarios['manuel'] = 28;

// Buscar el nombre del mayor de edad
$mayorNombre = "";
$mayorEdad = -1;
foreach($usuarios as $nombre => $edad){
    if($edad > $mayorEdad){
        $mayorEdad = $edad;
        $mayorNombre = $nombre;
    }
}
echo "<br>El usuario con mayor edad es $mayorNombre ($mayorEdad años)";

?>
</body>

</html>