<?php
session_start();
require_once "../dao/usuarioDAO.php";

header("Content-Type: application/json");
$username = $_POST["usernameRegister"];
$password = $_POST["passwordRegister"];
// echo json_encode(["username"=>$username, "password"=>$password]);
$dao = new UsuarioDAO();
$result = $dao->regristrar($username, $password);

echo json_encode($result);
