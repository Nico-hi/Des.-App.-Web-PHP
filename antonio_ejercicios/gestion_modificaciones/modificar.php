<?php

include "conexion.php";

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$precio = $_POST["precio"];

$sql = "UPDATE productos SET nombre='$nombre', precio='$precio' WHERE id=$id";

$respuesta = [];

if ($conexion->query($sql)) {
    if ($conexion->affected_rows > 0) {
        $respuesta[] = [
            "estado" => "ok",
            "mensaje" => "Producto modificado"
        ];
    } else {
        $respuesta[] = [
            "estado" => "error",
            "mensaje" => "No se encontró ningún producto con ese ID"
        ];
    }
} else {
    $respuesta[] = [
        "estado" => "error",
        "mensaje" => "Error SQL: " . $conexion->error
    ];
}

header("Content-Type: application/json");
echo json_encode($respuesta);
