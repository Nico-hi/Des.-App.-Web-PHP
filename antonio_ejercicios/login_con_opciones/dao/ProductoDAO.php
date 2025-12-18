<?php
require_once "../db/Database.php";

class ProductoDAO {

    public function insertar($nombre, $precio) {
        $conn = Database::getConnection();

        $stmt = $conn->prepare(
            "INSERT INTO productos (nombre, precio)
             VALUES (:n, :p)"
        );

        if (!$stmt) {
            $error = $conn->errorInfo();
            return [["mensaje" => "Error técnico sintáctico grave: " . $error[2]]];
        }

        $stmt->execute([":n"=>$nombre, ":p"=>$precio]);

        
        $error = $stmt->errorInfo();
        if ($error[0] !== "00000") {
        return [["mensaje" => "Error técnico: " . $error[2]]];
        }

        return [["mensaje" => "Producto insertado correctamente."]];

    }
}
