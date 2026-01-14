<?php
require_once "./../dao/usuarioDAO.php";
session_start();
header("Content-Type: application/json");
$username = $_POST["usernameLogin"];
$password = $_POST["passwordLogin"];

$dao = new UsuarioDAO();
$result = $dao->login($username, $password);
// echo json_encode($result);
if ($result) {
    $_SESSION['usuario'] = $usuario;
    echo json_encode(['login' => true, 'usuario' => $usuario]);
} else {
    echo json_encode(['login' => false]);
}