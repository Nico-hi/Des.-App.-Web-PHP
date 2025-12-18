<?php
// Indicamos que la respuesta será JSON
header("Content-Type: application/json");

// Cargamos la capa DAO
require_once "../dao/ProductoDAO.php";

// Recogemos el texto enviado por el FormData
// $_POST funciona porque fetch() envía FormData
$texto = $_POST["busqueda"];

// Creamos la instancia del DAO
$dao = new ProductoDAO();

// Llamamos al método buscar() para obtener los productos
$resultado = $dao->buscar($texto);

$respuesta = [
    "ok" => true,
    "data" => $resultado,
    "mensaje" => null
];

if (count($resultado) === 0) {
    $respuesta["mensaje"] = "No hay productos con ese filtro";
}

// Convertimos el array de objetos en JSON y lo enviamos al frontend
echo json_encode($respuesta);
