<?php
session_start();
include_once "../dao/UsuarioDAO.php";

header("Content-Type: application/json");

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$dao = new UsuarioDAO();

if ($dao->login($usuario, $contrasena)) {
    $_SESSION['usuario'] = $usuario;
    echo json_encode(['login' => true, 'usuario' => $usuario]);
} else {
    echo json_encode(['login' => false]);
}
