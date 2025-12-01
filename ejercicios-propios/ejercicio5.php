<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio5</title>
</head>

<body>
    <?php
    // Array de productos con nombre y precio
    $productos = [
        [
            "nombre" => "Camiseta",
            "precio" => 19.99
        ],
        [
            "nombre" => "Pantalon",
            "precio" => 34.50
        ],
        [
            "nombre" => "Zapatillas",
            "precio" => 59.90
        ],
        [
            "nombre" => "Gorra",
            "precio" => 12.00
        ]
    ];

    echo $productos."<br><br>";
    $producto_json = json_encode($productos);
    echo $producto_json . "<br><br>";

    $lista = json_decode($producto_json, true); // nos lo devuelve en objetos, en este caso array de arrays
    var_dump($lista);
    echo "<br><br>";
    foreach ($lista as $producto) {
        echo $producto['nombre'] . " ->" . $producto['precio'] . "<br>";
    }
    ?>
    <?php
    $productos = [
        ["nombre" => "Camiseta", "precio" => 19.99],
        ["nombre" => "Pantalon", "precio" => 34.50],
        ["nombre" => "Zapatillas", "precio" => 59.90],
        ["nombre" => "Gorra", "precio" => 12.00]
    ];

    // Mostrar como JSON legible para copiar
    $json = json_encode($productos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    echo "<pre>$json</pre>";

    // Decodificar y filtrar los caros
    $lista = json_decode($json, true);
    echo "Productos con precio mayor a 50:<ul>";
    foreach ($lista as $p) {
        if ($p['precio'] > 50) {
            echo "<li>{$p['nombre']} - {$p['precio']}€</li>";
        }
    }
    echo "</ul>";

    ?>
</body>

</html>