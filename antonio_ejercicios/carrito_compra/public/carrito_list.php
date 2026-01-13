<?php
session_start();
header("Content-Type: application/json");

require_once "../dao/CarritoDAO.php";

if (!isset($_SESSION["usuario"])) {
    echo json_encode([]);
    exit;
}

$dao = new CarritoDAO();
$lista_productos = $dao->listar($_SESSION["usuario"]);
echo json_encode($lista_productos);
