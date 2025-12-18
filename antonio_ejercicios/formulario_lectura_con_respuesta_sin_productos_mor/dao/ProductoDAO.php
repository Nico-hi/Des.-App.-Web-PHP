<?php
require_once "../db/Database.php";
require_once "../model/Producto.php";

class ProductoDAO {

    public function buscar($texto) {
        $conn = Database::getConnection();

        $stmt = $conn->prepare(
            "SELECT nombre, precio 
             FROM productos
             WHERE nombre LIKE :txt"
        );
        $stmt->execute([":txt" => "%$texto%"]);

        $lista = [];

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lista[] = new Producto($fila["nombre"], $fila["precio"]);
        }

        return $lista;
    }
}
