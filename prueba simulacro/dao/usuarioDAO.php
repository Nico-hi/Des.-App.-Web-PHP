<?php
require_once "../db/connection.php";
require_once "../model/usuario.php";

class UsuarioDAO
{
    public function comprobarusuario($usuario)
    {
        $conn = DataBase::getConnection();
        $stmt = $conn->prepare("select * from usuarios where nombre = :n");
        $stmt->execute([
            "n" => $usuario,
        ]);
        $result = $stmt->fetch(mode: PDO::FETCH_ASSOC);
        return $result ? $result : false;
    }
    public function regristrar($usuario, $password)
    {
        $conn = DataBase::getConnection();
        if ($password == null || $password == "") {
            return ["success" => false, "message" => "la contraseña no puede estar vacia"];
        }

        if ($this->comprobarusuario($usuario)) {
            return ["success" => false, "message" => "el usuario ya existe"];
        }

        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("insert into usuarios (nombre,password) values (:n,:p)");
        $result = $stmt->execute([
            "n" => $usuario,
            "p" => $password_hash
        ]);
        //  = $stmt->rowCount();
        if ($result) {
            return ["success" => true, "message" => "Usuario registrado exitosamente"];
        }
        return ["success" => false, "message" => $stmt->errorInfo()];
    }

    public function login($usuario, $password)
    {
        $result = $this->comprobarusuario($usuario);

        if (!$result) return null;

        if (password_verify($password, $result['password'])) {
            return new Usuario($result['id'], $result['nombre']);
        }
        
        return null;


    }

}