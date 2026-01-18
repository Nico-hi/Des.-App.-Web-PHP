<?php
require_once "./../dao/cursoDAO.php";
header("Content-Type: application/json");
$dao = new CursoDAO();
$result = $dao->getCursos();
// echo json_encode($result);

echo json_encode($result);
    