<?php
session_start();
header("Content-Type: application/json");

require_once "../dao/CarritoDAO.php";

if (!isset($_SESSION["usuario"])) {
    echo json_encode(["login" => false, "message" => "No autorizado, inicie sesión."]);
    exit;
}

$dao = new CarritoDAO();
$dao->vaciar($_SESSION["usuario"]);

echo json_encode(["ok" => true]);
