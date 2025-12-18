<?php
header("Content-Type: application/json");
require_once "../dao/ProductoDAO.php";

$nombre = $_POST["nombre"];
$precio = $_POST["precio"];

$dao = new ProductoDAO();
$respuesta = $dao->insertar($nombre, $precio);

echo json_encode($respuesta);
