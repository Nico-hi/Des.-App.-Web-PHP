<?php
require_once "../db/Database.php";
require_once "../model/Usuario.php";

class UsuarioDAO {

    public function registrar($usuario, $contrasena) {
        $conn = Database::getConnection();

        $stmt = $conn->prepare(
            "INSERT INTO usuarios (usuario, contrasena)
             VALUES (:u, :c)"
        );

        if (!$stmt) {
            return ["ok"=>false, "mensaje"=>"Error técnico"];
        }

        $hash = password_hash($contrasena, PASSWORD_DEFAULT);
        $stmt->execute([":u"=>$usuario, ":c"=>$hash]);

        if ($stmt->errorInfo()[0] !== "00000") {
            return ["ok"=>false, "mensaje"=>"Usuario ya existe"];
        }

        return ["ok"=>true];
    }

    public function login($usuario, $contrasena) {
        $conn = Database::getConnection();

        $stmt = $conn->prepare(
            "SELECT * FROM usuarios WHERE usuario = :u"
        );
        $stmt->execute([":u"=>$usuario]);

        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$fila || !password_verify($contrasena, $fila["contrasena"])) {
            return null;
        }

        return new Usuario($fila["id"], $fila["usuario"]);
    }
}
