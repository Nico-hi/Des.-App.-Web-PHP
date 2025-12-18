<?php
header("Content-Type: application/json");
require_once "../dao/ProductoDAO.php";

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$precio = $_POST["precio"];

$dao = new ProductoDAO();
$respuesta = $dao->modificar($id, $nombre, $precio);

echo json_encode($respuesta);
