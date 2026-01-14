<?php 
session_start();
header("Content-Type: application/json");
require_once "../dao/CarritoDAO.php";

if (!isset($_SESSION["usuario"])) {
    echo json_encode(["login"=> false,"message" => "No autorizado, inicie sesión."]);
    exit;
}

$productoId = $_POST["producto_id"];
$dao = new CarritoDAO();
$dao->eliminar($_SESSION["usuario"], $productoId);

echo json_encode(["ok" => true]);