<?php 
require_once "./../dao/usuarioDAO.php";
session_start();
header("Content-Type: application/json");
$usuario = $_POST["usuario-r"];
$contrasena = $_POST["contrasena-r"];
$dao = new UsuarioDAO();
$result = $dao->register($usuario, $contrasena);
// echo json_encode([$usuario, $contrasena]);
echo json_encode($result);