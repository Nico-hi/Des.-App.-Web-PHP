<?php 
require_once "./../dao/IncidenciasDAO.php";
header('Content-Type: application/json');
$dao = new IncidenciaDAO();
session_start();
$id = $_SESSION['id'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$estado = $_POST['estado'];


// echo json_encode(["id"=>$id,'titulo'=>$titulo,'desc'=>$descripcion,'estado'=>$estado]);

$result = $dao->crearIncidencia($titulo, $descripcion, $estado, $id);
echo json_encode($result);