<?php 
require_once "./../dao/usuarioDAO.php";
session_start();
header("Content-Type: application/json");
$usuario = $_POST["usuario-l"];
$contrasena = $_POST["contrasena-l"];
// para verificar que los datos llegan desde el front
// echo json_encode(["usuario"=> $usuario,"contrasena"=> $contrasena,]);
$dao = new UsuarioDAO();
$result = $dao->login($usuario, $contrasena);
if($result['login']){
    $_SESSION["id"] = $result['id'];
    $_SESSION["usuario"] = $usuario;
}
echo json_encode($result);
