<?php
header("Content-Type: application/json");
require_once "../dao/ProductoDAO.php";

$id = $_POST["id"];

$dao = new ProductoDAO();
$respuesta = $dao->borrar($id);

echo json_encode($respuesta);
