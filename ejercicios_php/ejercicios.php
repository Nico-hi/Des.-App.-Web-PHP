<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicios php</title>
</head>

<body>
    <h1>Aqui vamos a ver los ejercicios de php</h1>
    <h2>ejercicio 1</h2>
    <p>el primer ejercicio dar dos numeros y decir cual es mayor...</p>
    <?php
    $num1 = 2;
    $num2 = 5;

    if ($num1 > $num2) {
        echo "<p> el numero $num1  es mayor que el $num2 </p>";
    } else {
        echo "<p> el numero $num2  es mayor que el $num1 </p>";

    }
    ?>
    <h2>ejercicio 2</h2>

    <p>saber si un numero es positivo,negativo o cero</p>
    <label for="ejer2">ingresa un numero: </label>
    <input type="text" name="ejer2" id="ejer2">
    <button type="submit" name="enviar">Clasificar</button>
    <?php
    $first_num = 22;

    if ($first_num > 0) {
        echo "<p>el numero $first_num es positivo</p>";
    } elseif ($first_num < 0) {
        echo "<p>el numero $first_num es negativo</p>";

    } else {
        echo "<p>el numero $first_num es neuto o cero</p>";

    }

    ?>
    <h2>ejercicio 3</h2>
    <p>Dada una variable que contiene un número del 1 al 7, muestra en pantalla el día de la semana correspondiente.</p>
    <?php
    $week = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
    $day_week = 0;
    echo "el dia de la \" contando del 1 al 7 \" es $week[$day_week] con el dia numero " . $day_week + 1;

    ?>
    <h2>ejercicio 4</h2>
    <p>Dado un número que representa la edad de una persona, muestra en pantalla la categoría correspondiente:
        "Niño","Adolescente", "Adulto" o "Adulto mayor".</p>
    <?php
    $edad = 20;

    if ($edad < 0) {
        $categoria = "Edad Inválida. Introduce un número positivo.";
    } elseif ($edad > 0 && $edad <= 12) {
        $categoria = "Niño";
    } elseif ($edad > 12 && $edad <= 17) {
        $categoria = "Adolescente";
    } elseif ($edad > 17 && $edad <= 64) {
        $categoria = "Adulto";
    } else {
        $categoria = "Adulto mayor";
    }
    echo $categoria;
    ?>

    <h2>ejercicio 5</h2>
    <p>Crea un programa que realice una operación matemática simple (suma, resta, multiplicación o división) entre dos
        números y muestre el resultado.</p>
    <?php

    $num_1 = 3;
    $num_2 = 5;
    $suma = $num_1 + $num_2;
    $resta = $num_1 - $num_2;
    $division = $num_1 / $num_2;
    $multiplicacion = $num_1 * $num_2;
    echo "los dos numeros son $num_1 y $num_2 
    <br>la suma es $suma
    <br>la resta es $resta
    <br>la division es $division
    <br>la multiplicacion es $multiplicacion "
        ?>
    <h2>ejercicio 6</h2>
    <p>Escribe un programa que determine si un número es par o impar</p>
    <?php
    $numero_incognito = 2;
    if ($numero_incognito % 2 == 0) {
        echo "el numero $numero_incognito es par";
    } else {
        echo "el numero $numero_incognito es impar";
    }
    ?>
    <h2>ejercicio 7</h2>
    <p>Crea un programa que verifique si una palabra es un palíndromo (se lee igual de izquierda a derecha que de
        derecha a izquierda).</p>
    <?php
    $palabra = "olo";
    if ($palabra == strrev($palabra)) {
        echo "tu palabra $palabra es palindromo";
    } else {
        echo "tu palabra $palabra no es palindromo";
    }
    ?>
    <h2>ejercicio 8</h2>
    <p>Dada la calificación de un estudiante (de 0 a 10), muestra en pantalla la calificación en formato de letra
        (Suspenso, Aprobado, Bien, Notable, Sobresaliente)</p>
    <?php
    $nota = 2; // Ejemplo de calificación (puedes cambiarlo)
    $calificacion_letra = "";

    if ($nota >= 0 && $nota < 5) {
        $calificacion_letra = "Suspenso";
    } elseif ($nota >= 5 && $nota < 6) {
        $calificacion_letra = "Aprobado";
    } elseif ($nota >= 6 && $nota < 7) {
        $calificacion_letra = "Bien";
    } elseif ($nota >= 7 && $nota < 9) {
        $calificacion_letra = "Notable";
    } elseif ($nota >= 9 && $nota <= 10) {
        $calificacion_letra = "Sobresaliente";
    } else {
        $calificacion_letra = "Calificación no válida";
    }

    echo "La calificación numérica es: " . $nota . "<br>";
    echo "La calificación en formato de letra es: <strong>" . $calificacion_letra . "</strong>";

    ?>

</body>

</html>