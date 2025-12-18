<?php
session_start();
header("Content-Type: application/json");
require_once "../dao/UsuarioDAO.php";

$dao = new UsuarioDAO();
$usuario = $dao->login($_POST["usuario"], $_POST["contrasena"]);

if ($usuario) {
    $_SESSION["usuario"] = $usuario->getUsuario();
    echo json_encode(["estado"=>"ok", "mensaje"=>"Login correcto"]);
} else {
    echo json_encode(["estado"=>"error", "mensaje"=>"Credenciales incorrectas"]);
}
