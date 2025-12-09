<?php
include "conexion.php";

$id = $_POST["id"];

$sql = "DELETE FROM productos WHERE id=$id";

$respuesta = [];

if ($conexion->query($sql)) {
    if ($conexion->affected_rows > 0) {
        $respuesta[] = [
            "estado" => "ok",
            "mensaje" => "Producto borrado"
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

