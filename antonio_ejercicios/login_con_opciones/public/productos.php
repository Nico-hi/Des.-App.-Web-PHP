<?php
session_start();
header("Content-Type: application/json");
require_once "../dao/ProductoDAO.php";

if (!isset($_SESSION["usuario"])) {
    echo json_encode(["mensaje"=>"No autorizado"]);
    exit;
}

$dao = new ProductoDAO();
$resultado = $dao->insertar($_POST["nombre"], $_POST["precio"]);

echo json_encode($resultado);

