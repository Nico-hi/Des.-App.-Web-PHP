<?php
require_once "../dao/UsuarioDAO.php";
session_start();
header("Content-Type: application/json");

$usuario = $_POST['usuario'] ?? '';
$contrasena = $_POST['contrasena'] ?? '';

$usuarioDAO = new UsuarioDAO();
$resultado = $usuarioDAO->registrar($usuario, $contrasena);

echo json_encode($resultado);