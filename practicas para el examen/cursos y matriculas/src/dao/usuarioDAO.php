<?php
require_once "./../db/connection.php";
require_once "./../model/usuario.php";
class UsuarioDao
{
    public function getUsuario($usuario)
    {
        $conn = DataBase::getConnection();
        $stmt = $conn->prepare("select * from usuarios where usuario = :u");
        $stmt->execute([":u" => $usuario]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$result)
            return false;
        return new Usuario($result["id"], $result["usuario"], $result["contrasena"]);
    }
    public function Login($usuario, $contrasena)
    {
        $existe = $this->getUsuario($usuario);
        if (!$existe) {
            return ["login" => false, "message" => "el usuario/contrasena no coinciden"];
        }
        if (password_verify($contrasena, $existe->getContrasena())) {
            return ["login" => true, "message" => "el usuario fue logueado", "id" => $existe->getId()];
        }
        return ["login" => false, "message" => "el usuario no fue logueado"];
    }
    public function register($usuario, $contrasena)
    {
        if ($this->getUsuario($usuario)) {
            return ["login" => false, "message" => "el usuario ya existe"];
        }
        $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);
        $conn = DataBase::getConnection();
        $stmt = $conn->prepare("insert into usuarios (usuario,contrasena) values (:u,:c)");
        $result = $stmt->execute([
            ":u" => $usuario,
            ":c" => $contrasena_hash
        ]);

        if ($result) {
            return ["login" => true, "message" => "el usuario fue creado"];
        }
        return ["login" => false, "message" => "el usuario no fue creado"];
    }
    public function registerAdmin($usuario, $contrasena)
    {
        $conn = DataBase::getConnection();
        $stmt = $conn->prepare("");
    }

}