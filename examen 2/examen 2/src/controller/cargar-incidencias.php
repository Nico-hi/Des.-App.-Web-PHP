<?php 
require_once "./../dao/IncidenciasDAO.php";
header('Content-Type: application/json');
$dao = new IncidenciaDAO();
$result = $dao->cargarIncidencias();
// echo json_encode(["usuario"=>$usuario,"contrasena"=>$contrasena]);
echo json_encode($result);