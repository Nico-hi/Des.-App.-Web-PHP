<?php
require_once "../db/Database.php";
#traemos s
require_once "../model/Producto.php";# no es necesario por ahora pero lo dejamos ahi por si acaso

class ProductoDAO {
    #ProductoDAO tendras dintinas acciones que tendra el producto
    public function insertar($nombre, $precio) {
        #la funcion insertar tendra dos parametros de entrada el cual sera un nombre y un precio
        $conn = Database::getConnection();

        $stmt = $conn->prepare(
            "INSERT INTO productos (nombre, precio) VALUES (:nombre, :precio)"
        );

        if (!$stmt) {
            $error = $conn->errorInfo();
            return [["mensaje" => "Error técnico sintáctico grave: " . $error[2]]];
        }

        $stmt->execute([":nombre" => $nombre, ":precio" => $precio]);

        $error = $stmt->errorInfo();
        if ($error[0] !== "00000") {
        return [["mensaje" => "Error técnico: " . $error[2]]];
        }

        return [["mensaje" => "Producto insertado correctamente."]];
    }

    public function modificar($id, $nombre, $precio) {
        $conn = Database::getConnection();

        $stmt = $conn->prepare(
            "UPDATE productos SET nombre = :nombre, precio = :precio WHERE id = :id"
        );

        if (!$stmt) {
            $error = $conn->errorInfo();
            return [["mensaje" => "Error técnico sintáctico grave: " . $error[2]]];
        }

        $stmt->execute([":nombre"=>$nombre, ":precio"=>$precio, ":id"=>$id]);

        $error = $stmt->errorInfo();
        if ($error[0] !== "00000") {
        return [["mensaje" => "Error técnico: " . $error[2]]];
        }

        if ($stmt->rowCount() > 0) {
            return [["mensaje" => "Producto modificado correctamente."]];
        } else {
            return [["mensaje" => "No se encontró el producto con ese ID."]];
        }
    }

    public function borrar($id) {
        $conn = Database::getConnection();

        $stmt = $conn->prepare(
            "DELETE FROM productos WHERE id = :id"
        );

        if (!$stmt) {
            $error = $conn->errorInfo();
            return [["mensaje" => "Error técnico sintáctico grave: " . $error[2]]];
        }

        $stmt->execute([":id"=>$id]);

        $error = $stmt->errorInfo();
        if ($error[0] !== "00000") {
        return [["mensaje" => "Error técnico: " . $error[2]]];
        }

        if ($stmt->rowCount() > 0) {
            return [["mensaje" => "Producto borrado correctamente."]];
        } else {
            return [["mensaje" => "No se encontró el producto con ese ID."]];
        }
    }
}
