<?php
require_once "../db/connection.php";
require_once "../model/usuario.php";

class UsuarioDAO
{
    public function comprobarusuario($usuario)
    {
        try {
            $conn = DataBase::getConnection();
            $stmt = $conn->prepare("select * from usuarios where nombre = :n");
            $stmt->execute([
                "n" => $usuario,
            ]);
            $result = $stmt->fetch(mode: PDO::FETCH_ASSOC);
            return $result ? $result : false;
        } catch (Exception $e) {
            return ["success" => false, "message" => $e];

        }
    }
    public function regristrar($usuario, $password)
    {
        try {

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
        } catch (Exception $e) {
            return ["success" => false, "message" => $e];
        }
    }

    public function login($usuario, $password)
    {
        try {
            $result = $this->comprobarusuario($usuario);

            if (!$result)
                return null;

            if (!$result || !isset($result['password'])) {
                return ["login" => false, "message" => "Usuario o contraseña incorrectos"];
            }
            if (password_verify($password, $result['password'])) {
                return new Usuario($result['id'], $result['nombre']);
            }

            return null;

        } catch (Exception $e) {
            return ["success" => false, "message" => $e];

        }

    }

}