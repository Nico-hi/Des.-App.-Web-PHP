<?php
require_once "./../dao/IncidenciasDAO.php";
header('Content-Type: application/json');
session_start();

$dao = new IncidenciaDAO();
$id = $_POST['id'];
$usuarioId = $_POST['usuarioId'];
$id_actual = $_SESSION['id'];
$result = $dao->eliminarIncidencia($id,$usuarioId,$id_actual);
// echo json_encode(["usuario"=>$usuario,"contrasena"=>$contrasena]);
echo json_encode($result);