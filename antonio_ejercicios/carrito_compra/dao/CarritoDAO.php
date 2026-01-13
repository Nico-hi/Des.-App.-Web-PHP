<?php
require_once "../db/Database.php";
require_once "../model/Producto.php";

class CarritoDAO {

    public function agregar($usuario, $productoId) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare(
            "INSERT INTO carrito (usuario, producto_id)
             VALUES (:u, :p)"
        );
        $stmt->execute([
            ":u" => $usuario,
            ":p" => $productoId
        ]);
    }

    public function listar($usuario) {
    $conn = Database::getConnection();

    $stmt = $conn->prepare(
        "SELECT p.id, p.nombre, p.precio
         FROM carrito c
         JOIN productos p ON c.producto_id = p.id
         WHERE c.usuario = :u"
    );

    $stmt->execute([":u" => $usuario]);

    $lista = [];

    while ($fila = $stmt->fetch(mode: PDO::FETCH_ASSOC)) {
        $lista[] = new Producto(
            $fila["id"],
            $fila["nombre"],
            $fila["precio"]
        );
    }

    return $lista;
}


    public function vaciar($usuario) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare(
            "DELETE FROM carrito WHERE usuario = :u"
        );
        $stmt->execute([":u" => $usuario]);
    }

    public function eliminar($usuario, $productoId) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare(
            "DELETE FROM carrito 
             WHERE usuario = :u AND producto_id = :p
             LIMIT 1"
        );
        $stmt->execute([
            ":u" => $usuario,
            ":p" => $productoId
        ]);
    }
}
