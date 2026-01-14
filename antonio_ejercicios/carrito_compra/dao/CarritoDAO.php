<?php
require_once "../db/Database.php";
require_once "../model/Producto.php";

class CarritoDAO
{

    public function agregar($usuario, $productoId)
    {
        try {
            // sacamos el id del usuario
            $conn = Database::getConnection();
            $stmt = $conn->prepare("select id from usuarios where usuario=:u");
            $stmt->execute([
                ":u" => $usuario
            ]);
            $result = $stmt->fetch(mode: PDO::FETCH_ASSOC);

            // insertamos el producto en el carrito con el id del usuario
            $stmt = $conn->prepare(
                "INSERT INTO carrito (usuario, producto_id)
             VALUES (:u, :p)"
            );
            $result = $stmt->execute([
                ":u" => $result['id'],
                ":p" => $productoId
            ]);

            if ($result) {
                return ["result" => "ok"]; # , "message"=> $stmt
            } else {
                return ["result" => "false"]; #  ,"message"=> $stmt->errorInfo()
            }
        } catch (PDOException $e) {
            return ["result" => $e->getMessage()];
        }
    }

    public function listar($usuario)
    {
        try {
            $conn = Database::getConnection();
            // sacamos el id
            $conn = Database::getConnection();
            $stmt = $conn->prepare("select id from usuarios where usuario=:u");
            $stmt->execute([
                ":u" => $usuario
            ]);
            $result = $stmt->fetch(mode: PDO::FETCH_ASSOC);
            // sacamos los productos del carrito

            $stmt = $conn->prepare(
                "SELECT p.id, p.nombre, p.precio
         FROM carrito c
         JOIN productos p ON c.producto_id = p.id
         WHERE c.usuario = :u"
            );

            $stmt->execute([":u" => $result['id']]);

            $lista = [];

            while ($fila = $stmt->fetch(mode: PDO::FETCH_ASSOC)) {
                $lista[] = new Producto(
                    $fila["id"],
                    $fila["nombre"],
                    $fila["precio"]
                );
            }

            return $lista;
        } catch (PDOException $e) {
            return ["result" => $e->getMessage()];
        }
    }


    public function vaciar($usuario)
    {
        try {
            $conn = Database::getConnection();
            $stmt = $conn->prepare(
                "DELETE FROM carrito WHERE usuario = :u"
            );
            $stmt->execute([":u" => $usuario]);
        } catch (PDOException $e) {
            return ["result" => $e->getMessage()];
        }
    }

    public function eliminar($usuario, $productoId)
    {
        try {
            $conn = Database::getConnection();

            // sacamos el id
            $conn = Database::getConnection();
            $stmt = $conn->prepare("select id from usuarios where usuario=:u");
            $stmt->execute([
                ":u" => $usuario
            ]);
            $result = $stmt->fetch(mode: PDO::FETCH_ASSOC);
            // eliminamos el producto del carrito
            $stmt = $conn->prepare(
                "DELETE FROM carrito 
             WHERE usuario = :u AND producto_id = :p
             LIMIT 1"
            );
            $stmt->execute([
                ":u" => $result['id'],
                ":p" => $productoId
            ]);
        } catch (PDOException $e) {
            return ["result" => $e->getMessage()];
        }
    }
}
