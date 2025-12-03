<?php
include "conexion.php";

$texto = $_POST["busqueda"];

$sql = "SELECT nombre, precio FROM productos
        WHERE nombre LIKE '%$texto%'";

$result = $conexion->query($sql);

$salida = [];

while ($fila = $result->fetch_assoc()) {
    $salida[] = $fila;
}

// 1️⃣ Indicamos al navegador que la respuesta será JSON
header("Content-Type: application/json");

/*
🔹 Qué hace:
- Envía una cabecera HTTP al cliente.
- "Content-Type" le dice al navegador (o cualquier consumidor HTTP) 
  qué tipo de contenido se está enviando.
- En este caso, "application/json" indica que lo que sigue es JSON.

🔹 Por qué es importante:
- Permite que JavaScript (fetch o AJAX) interprete correctamente los datos recibidos.
- Sin esto, el navegador podría tratar la respuesta como texto plano,
  y r.json() en JS podría fallar o no comportarse como se espera.

🔹 Ventaja:
- Claridad en la comunicación cliente-servidor.
- Mejora interoperabilidad: otros sistemas o APIs saben qué esperar.
*/

// 2️⃣ Convertimos un array o objeto PHP a JSON y lo enviamos al cliente
echo json_encode($salida);

/*
🔹 Qué hace:
- json_encode() toma un array asociativo o un objeto PHP y lo convierte
  en un string JSON válido.
- echo envía ese string como respuesta al cliente (navegador, fetch, AJAX).

🔹 Ejemplo:
$salida = [
    ["nombre" => "Camiseta", "precio" => 15],
    ["nombre" => "Pantalón", "precio" => 25]
];
json_encode($salida) -> '[{"nombre":"Camiseta","precio":15},{"nombre":"Pantalón","precio":25}]'

🔹 Por qué es útil:
- Permite enviar datos estructurados desde PHP al cliente.
- Facilita que JS pueda recorrer la información con facilidad (forEach, map, etc.).
- Evita tener que generar HTML desde PHP para cada elemento.

🔹 Ventaja pedagógica:
- Refuerza la separación de responsabilidades:
  PHP = lógica y acceso a datos
  JS = presentación y actualización del DOM
- Permite hacer aplicaciones dinámicas tipo SPA sin recargar la página.

🔹 Problema que resuelve:
- Antes, el PHP habría generado directamente HTML y JS habría tenido que parsear texto.
- Ahora, se intercambian datos limpios, más seguros y fáciles de procesar.
*/

