<?php
require_once "./../dao/usuarioDAO.php";
session_start(); // esto es obligatorio ne cada uno porque sino no cargaria
header("Content-Type: application/json");
// aca sacamos el nombre de usuario y contraseña enviada desde el frontend
$username = $_POST["usernameLogin"];
$password = $_POST["passwordLogin"];
// echo json_encode(['username' => $username, 'password' => $password]);

$dao = new UsuarioDAO();
$result = $dao->login($username, $password);
// echo json_encode($result);
if ($result['login']) {
    $_SESSION['usuario'] = $username;
    $_SESSION['id'] = $result->getId();
    echo json_encode(['login' => true, 'usuario' => $username]);
} else {
    echo json_encode(['login' => false, "message"=> "hubo un problema de conexion"]);
}