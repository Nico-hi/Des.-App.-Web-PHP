<?php
session_start();
header("Content-Type: application/json");

require_once "../dao/CarritoDAO.php";

$dao = new CarritoDAO();
$dao->vaciar($_SESSION["usuario"]);

echo json_encode(["ok" => true]);
