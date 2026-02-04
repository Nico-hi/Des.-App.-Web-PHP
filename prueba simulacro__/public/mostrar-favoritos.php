<?php
session_start();
require_once "./../dao/favoritosDAO.php";
header("Content-Type: application/json");

if (!isset($_SESSION["usuario"])) {
    echo json_encode(["login" => false, "message" => "No autorizado, inicie sesión."]);
    exit;
}
$userId = $_SESSION["id"];
$dao = new favoritosDAO();

$result = $dao->getFavoritos($userId);
// var_dump($result);

echo json_encode($result);