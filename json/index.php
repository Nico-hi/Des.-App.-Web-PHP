<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>json</title>
</head>

<body>


    <?php
    $peliculas = [
        [
            "nombre" => "Origen",
            "anio" => 0,
            "disponible" => true,
            "director" => [
                "nombre" => "Christopher Nolan",
                "nacionalidad" => "británico-estadounidense"
            ]
        ],
        [
            "nombre" => "Parásitos",
            "anio" => 2019,
            "disponible" => false,
            "director" => [
                "nombre" => "Bong Joon-ho",
                "nacionalidad" => "surcoreano"
            ]
        ],
        [
            "nombre" => "Roma",
            "anio" => 2018,
            "disponible" => true,
            "director" => [
                "nombre" => "Alfonso Cuarón",
                "nacionalidad" => "mexicano"
            ]
        ],
        [
            "nombre" => "El laberinto del fauno",
            "anio" => 2006,
            "disponible" => false,
            "director" => [
                "nombre" => "Guillermo del Toro",
                "nacionalidad" => "mexicano"
            ]
        ]

    ];
    $json = json_decode($peliculas);
    echo $json;


    ?>
</body>

</html>