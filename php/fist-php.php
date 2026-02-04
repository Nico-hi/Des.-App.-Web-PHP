<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>php</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    
<?php
# asi abrimos lo de php dentro de un html
echo "<h1> este es un intento de php </h1>";

# PHP Add Array Items

# Para agregar un ítem a un array normal, usa la sintaxis de corchetes []
$fruits = array("Apple", "Banana", "Cherry");
$fruits[] = "Orange"; // Agrega "Orange" al final

# Para agregar un ítem a un array asociativo, usa corchetes con la clave
$cars = array("brand" => "Ford", "model" => "Mustang");
$cars["color"] = "Red"; // Agrega la clave "color" con valor "Red"

# Para agregar múltiples ítems a un array normal, usa array_push()
$fruits = array("Apple", "Banana", "Cherry");
array_push($fruits, "Orange", "Kiwi", "Lemon"); // Agrega 3 frutas

# Para agregar múltiples ítems a un array asociativo, usa el operador +=
$cars = array("brand" => "Ford", "model" => "Mustang");
$cars += ["color" => "red", "year" => 1964]; // Agrega dos claves nuevas

# PHP Delete Array Items

# Para eliminar un ítem de un array puedes usar array_splice() o unset()

# array_splice() elimina elementos desde un índice específico y reindexa el array automáticamente
$cars = array("Volvo", "BMW", "Toyota");
array_splice($cars, 1, 1); // Elimina el segundo elemento (BMW)

# unset() elimina el elemento pero NO reindexa el array
$cars = array("Volvo", "BMW", "Toyota");
unset($cars[1]); // Elimina BMW, pero deja un "hueco" en el índice

# Para eliminar múltiples elementos con array_splice()
$cars = array("Volvo", "BMW", "Toyota");
array_splice($cars, 1, 2); // Elimina BMW y Toyota

# Para eliminar múltiples elementos con unset()
$cars = array("Volvo", "BMW", "Toyota");
unset($cars[0], $cars[1]); // Elimina Volvo y BMW

# Eliminar elementos de un array asociativo con unset()
$cars = array("brand" => "Ford", "model" => "Mustang", "year" => 1964);
unset($cars["model"]); // Elimina la clave "model"

# También puedes usar array_diff() para crear un nuevo array sin ciertos valores
$cars = array("brand" => "Ford", "model" => "Mustang", "year" => 1964);
$newarray = array_diff($cars, ["Mustang", 1964]); // Elimina valores, no claves

# Eliminar el último elemento de un array con array_pop()
$cars = array("Volvo", "BMW", "Toyota");
array_pop($cars); // Elimina "Toyota"

# Eliminar el primer elemento de un array con array_shift()
$cars = array("Volvo", "BMW", "Toyota");
array_shift($cars); // Elimina "Volvo"

# PHP Sorting Arrays

# sort() ordena arrays en orden ascendente (alfabético o numérico)
$cars = array("Volvo", "BMW", "Toyota");
sort($cars); // ["BMW", "Toyota", "Volvo"]

$numbers = array(4, 6, 2, 22, 11);
sort($numbers); // [2, 4, 6, 11, 22]

# rsort() ordena arrays en orden descendente
rsort($cars); // ["Volvo", "Toyota", "BMW"]
rsort($numbers); // [22, 11, 6, 4, 2]

# asort() ordena arrays asociativos por valor en orden ascendente
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
asort($age);

# ksort() ordena arrays asociativos por clave en orden ascendente
ksort($age);

# arsort() ordena arrays asociativos por valor en orden descendente
arsort($age);

# krsort() ordena arrays asociativos por clave en orden descendente
krsort($age);

# Extras para repasar:

# tenemos tipos de array como el clave valor o los normales (los cuales aceptan todos los tipos de datos)
# si ponemos el & antes de la variable se tiene el llamado de la parte de la memoria en el cual se guarda
# entre los métodos tenemos el array_push($variable, valor); el $array += []; y el $array[] = valor;

?>

</body>
</html>