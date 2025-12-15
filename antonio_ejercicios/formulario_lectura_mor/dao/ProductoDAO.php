<?php
require_once "../db/Database.php";
require_once "../model/Producto.php";

class ProductoDAO
{

    public function buscar($texto)
    {
        $texto = "%$texto%";
        $conn = Database::getConnection();

        $stmt = $conn->prepare(
            "SELECT name_p, price_p 
             FROM product
             WHERE name_p LIKE :txt"
        );
        $stmt->execute([":txt" => $texto]);
        $lista = [];

        if ($stmt->rowCount() > 0) { // si el numero de filas es mayor que 0, es que encontro dicho producto
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lista[] = new Producto($fila["name_p"], $fila["price_p"]);
        }

        } else {// sino no encuentra ningun producto 
            $lista[] = [
                "status" => "error",
                "message" => "no se encontro dicho producto"
            ];
        }

        return $lista;
    }
}
