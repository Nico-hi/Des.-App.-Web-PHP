<?php
require_once "./../dao/usuarioDAO.php";
session_start();
header("Content-Type: application/json");
$username = $_POST["usernameLogin"];
$password = $_POST["passwordLogin"];
// echo json_encode(['username' => $username, 'password' => $password]);

$dao = new UsuarioDAO();
$result = $dao->login($username, $password);
// echo json_encode($result);
if ($result) {
    $_SESSION['usuario'] = $username;
    $_SESSION['id'] = $result->getId();
    echo json_encode(['login' => true, 'usuario' => $username]);
} else {
    echo json_encode(['login' => false]);
}