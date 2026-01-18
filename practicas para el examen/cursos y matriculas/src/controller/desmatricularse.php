<?php 
require_once "./../dao/cursoDAO.php";
session_start();
header("Content-Type: application/json");
$dao = new CursoDAO();
$curso = $_POST["cursoId"];
$result= $dao->desmatricular($_SESSION["id"],$curso);
echo json_encode($result);