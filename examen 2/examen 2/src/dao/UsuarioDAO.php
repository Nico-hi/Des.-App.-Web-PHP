<?php
require_once "./../db/connection.php";
require_once "./../model/Usuario.php";

class UsuarioDAO
{

    public function getUser($usuario)
    {
        // return ["usuario"=>$usuario];
        $conn = DataBase::getConnection();
        $stmt = $conn->prepare("select * from usuarios where nombre = :u limit 1");
        $stmt->execute([
            ":u" => $usuario
        ]);

        $usuario1 = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$usuario1)
            return null;
        // return $usuario1;
        return new Usuario($usuario1['id'], $usuario1['nombre'], $usuario1['email'], $usuario1['contrasena']);

    }
    public function login($usuario, $contrasena)
    {
        $getUsuario = $this->getUser($usuario);
        if (!isset($getUsuario)) {
            return null;
        }
        if ($contrasena === $getUsuario->getContrasena()) {
            return $getUsuario;
        }
        return null;
    }
}