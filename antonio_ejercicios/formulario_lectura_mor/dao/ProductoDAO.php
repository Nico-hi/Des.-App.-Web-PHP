<?php
require_once "../db/Database.php";
require_once "../model/Producto.php";

class ProductoDAO {

    public function buscar($texto) {
        $texto= "%$texto%";
        $conn = Database::getConnection();

        $stmt = $conn->prepare(
            "SELECT name_p, price_p 
             FROM product
             WHERE name_p LIKE :txt"
        );
        $stmt->execute([":txt" => $texto ]);

        $lista = [];

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lista[] = new Producto($fila["name_p"], $fila["price_p"]);
        }

        return $lista;
    }
}
