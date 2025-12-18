<?php
header("Content-Type: application/json");
require_once "../dao/UsuarioDAO.php";

$dao = new UsuarioDAO();
$res = $dao->registrar($_POST["usuario"], $_POST["contrasena"]);

if ($res["ok"]) {
    echo json_encode(["mensaje"=>"Usuario registrado"]);
} else {
    echo json_encode(["mensaje"=>$res["mensaje"]]);
}
