<?php
header("Content-Type: application/json");
require_once "../dao/ProductoDAO.php";

$dao = new ProductoDAO();
$todos_los_productos = $dao->listar();
echo json_encode($todos_los_productos);
