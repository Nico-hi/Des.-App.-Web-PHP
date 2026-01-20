<?php 
require_once "./../dao/cursoDAO.php";
session_start();
header("Content-Type: application/json");
$dao = new CursoDAO();
$result= $dao->eliminar($_SESSION["id"]);
echo json_encode($result);