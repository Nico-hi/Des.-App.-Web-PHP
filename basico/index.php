<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
      <h2>Ejercicio 22:</h2>
<p>Crea un array asociativo que represente tres estudiantes, donde cada estudiante tenga un nombre, edad y calificación. Muestra por pantalla la calificación del estudiante “Carlos”.</p>
<?php
 $array_5=[
  ["nombre" => "carlos", "edad"=>15, "calificacion"=>6.5],
  ["nombre" => "juan", "edad"=>17, "calificacion"=>9.0],
  ["nombre" => "emiliano", "edad"=>16, "calificacion"=>4.0]
 ];
 echo "<br> el estudiante <b>". $array_5[0]['nombre']."</b> y su nota es <b>".$array_5[0]['calificacion']."</b>";

?>

<h2>Ejercicio 23:</h2>
<p>Dado un array bidimensional indexado que contiene números, calcula la suma de todos los elementos del array.</p>
<?php

$matriz = [
    [5, 10, 2], 
    [3, 8, 1],  
    [4, 6, 7]   
];

$suma_total;
foreach ($matriz as $fila){
foreach ($fila as $e){
  $suma_total+=$e;
}
}
echo "la suma total es $suma_total";

?>

<h2>Ejercicio 24:</h2>
<p>Tienes un array asociativo que representa ventas de productos por mes: <br>
$ventas = [<br>
"enero" => ["producto1" => 100, "producto2" => 200],<br>
"febrero" => ["producto1" => 150, "producto2" => 250],<br>
];<br>
Calcula el total de ventas por producto en todos los meses.</p>

<?php
$ventas = [
"enero" => ["producto1" => 100, "producto2" => 200],
"febrero" => ["producto1" => 150, "producto2" => 250],
];

$var1="producto1";
$var2="producto2";
$ventas_totales1=0;
$ventas_totales2=0;
foreach( $ventas as $f =>$g){

  $ventas_totales1+=$g[$var1];
  $ventas_totales2+=$g[$var2];

}
echo "las ventas totales de del <b>$var1</b> son <b>$ventas_totales1</b> <br> las ventas totales de del <b>$var2</b> son <b>$ventas_totales2</b> <br> ";
?>
<h2>Ejercicio 25:</h2>
<p>Crea un array asociativo con 4 empleados, cada uno con nombre, salario y departamento. Aumenta el salario en un 10% solo a los que pertenecen al departamento “IT”.</p>
<?php
$empleados = [
    // Empleado 1: Ana
    "Ana" => [
        "salario" => 45000,
        "departamento" => "Marketing"
    ],

    // Empleado 2: Carlos
    "Carlos" => [
        "salario" => 62000,
        "departamento" => "IT"
    ],

    // Empleado 3: Elena
    "Elena" => [
        "salario" => 38000,
        "departamento" => "Recursos Humanos"
    ],

    // Empleado 4: Pedro
    "Pedro" => [
        "salario" => 55000,
        "departamento" => "Ventas"
    ]
];
?>

<h2>Ejercicio 26:</h2>
<p>Dado un array asociativo de equipos de fútbol, donde cada equipo tiene un nombre y un array con los puntos obtenidos en 5 partidos, calcula el promedio de puntos por equipo y muestra solo los equipos cuyo promedio sea mayor o igual a 3.</p>
<?php

?>

</body>
</html>