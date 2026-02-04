<?php
require_once "./../dao/libroDAO.php";
header("Content-Type: application/json");

$dao = new LibroDAO();

$result = $dao->listar();
// var_dump($result);

echo json_encode($result);