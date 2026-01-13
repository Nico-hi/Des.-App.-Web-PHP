<?php
require_once "../db/Database.php";
require_once "../model/Producto.php";

class ProductoDAO {

    public function listar() {
        $conn = Database::getConnection();
        $stmt = $conn->query("SELECT * FROM productos");

        $lista = [];
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lista[] = new Producto(
                $fila["id"],
                $fila["nombre"],
                $fila["precio"]
            );
        }
        return $lista;
    }
}
