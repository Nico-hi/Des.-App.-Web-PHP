<?php
require_once "./../model/Usuario.php";
require_once "./../dao/UsuarioDAO.php";
header('Content-Type: application/json');
session_start();
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$dao = new UsuarioDAO();
$result = $dao->login($usuario, $contrasena);
// echo json_encode(["user" => $result->nombre, "id" => $result->getId()]);
if ($result) {
    $_SESSION['user'] = $result->nombre;
    $_SESSION['id'] = $result->getId();
    echo json_encode(["login" => true, "message" => "login correcto"]);
    exit;

}
echo json_encode(["login" => false, "message" => "login incorrecto"]);