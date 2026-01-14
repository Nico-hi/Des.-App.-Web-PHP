<?php
session_start();
header("Content-Type: application/json");

require_once "../dao/CarritoDAO.php";

if (!isset($_SESSION["usuario"])) {
    echo json_encode(["error" => "No autorizado"]);
    exit;
}

$productoId = $_POST["producto_id"];

$dao = new CarritoDAO();
$result= $dao->agregar($_SESSION["usuario"], $productoId);

echo json_encode(["ok" => $result["result"]]);
# , 'dao'=> $dao ,"idp"=>$productoId, "idu"=> $_SESSION["usuario"]]
