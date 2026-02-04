<?php
header("Content-Type: application/json");
session_start();
if (isset($_SESSION)) {
    echo json_encode([
        "login" => true,
        "usuario" => $_SESSION["usuario"]
    ]);
} else {
    echo json_encode(["login" => false, "message" => "Error al iniciar sesion, intentelo mas tarde"]);
}


