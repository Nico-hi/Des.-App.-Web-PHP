<?php
require_once "./../dao/IncidenciasDAO.php";
header('Content-Type: application/json');
session_start();
$dao = new IncidenciaDAO();
$id = $_POST['id'];
$result = $dao->cambiarEstado($id);
// echo json_encode(["usuario"=>$usuario,"contrasena"=>$contrasena]);
echo json_encode($result);