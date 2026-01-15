<?php
session_start();
require_once "./../dao/favoritosDAO.php";
header("Content-Type: application/json");

if (!isset($_SESSION["usuario"])) {
    echo json_encode(["login" => false, "message" => "No autorizado, inicie sesión."]);
    exit;
}

$dao = new favoritosDAO();
$userId = $_SESSION["id"];
$libroId = $_POST["libroId"];
// echo json_encode(["user"=> $userId,"libro"=> $libroId]);

$result = $dao->del_favorito($userId, $libroId);

echo json_encode($result);