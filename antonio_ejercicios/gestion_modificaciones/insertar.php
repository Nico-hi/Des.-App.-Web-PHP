<?php

include "conexion.php";

$nombre = $_POST["nombre"];
$precio = $_POST["precio"];


$sql = "INSERT INTO productos (nombre, precio) VALUES ('$nombre', '$precio')";

$respuesta = [];

if ($conexion->query($sql)) {
    $respuesta[] = [
        "estado" => "ok",
        "mensaje" => "Producto insertado correctamente (nombre: " . $nombre . ")"
    ];
} else {
    $respuesta[] = [
        "estado" => "error",
        "mensaje" => "Error SQL: " . $conexion->error
    ];
}

header("Content-Type: application/json");

echo json_encode($respuesta);
