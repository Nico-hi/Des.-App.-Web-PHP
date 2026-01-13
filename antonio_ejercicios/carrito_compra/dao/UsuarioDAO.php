<?php
require_once "../db/Database.php";
require_once "../model/Usuario.php";

class UsuarioDAO
{

    public function login($usuario, $contrasena)
    {
        $conn = Database::getConnection();

        $stmt = $conn->prepare(
            "SELECT usuario, contrasena
             FROM usuarios
             WHERE usuario = :u"
        );

        $stmt->execute([
            ":u" => $usuario
        ]);

        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($contrasena, $fila['contrasena'])) {
            return null;
        }

        if ($fila) {
            return new Usuario($fila["usuario"]);
        }

    }


    public function registrar($usuario, $contrasena)
    {
        $conn = Database::getConnection();

        if ($contrasena === '') {
            return (["success" => false, "message" => "La contraseña no puede estar vacía."]);

        }
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);


        // Verificar si el usuario ya existe
        $stmt = $conn->prepare(
            "SELECT COUNT(*) as count
             FROM usuarios
             WHERE usuario = :u"
        );
        $stmt->execute([":u" => $usuario]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila['count'] > 0) {
            return ["success" => false, "message" => "El usuario ya existe."];
        }

        // Insertar nuevo usuario
        $stmt = $conn->prepare(
            "INSERT INTO usuarios (usuario, contrasena)
             VALUES (:u, :c)"
        );

        $exito = $stmt->execute([
            ":u" => $usuario,
            ":c" => $contrasena
        ]);

        if ($exito) {
            return ["success" => true, "message" => "Usuario registrado exitosamente."];
        } else {
            return ["success" => false, "message" => "Error al registrar el usuario."];
        }
    }
}
