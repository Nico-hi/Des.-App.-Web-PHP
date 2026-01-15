<?php
require_once "../db/connection.php";
require_once "./../model/libro.php";

class favoritosDAO
{
    public function getFavoritos($usuarioId)
    {
        $libros = [];
        $salida = [];
        $conn = DataBase::getConnection();
        $stmt = $conn->prepare("select * from libros l where l.id in ( select f.libro_id  from favoritos f where f.usuario_id = :u)");
        $stmt->execute([
            ":u" => $usuarioId
        ]);
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $libros[] = new Libro($result['id'], $result['titulo'], $result['autor']);
        }
        foreach ($libros as $libro) {
            $salida[] = [
                'id' => $libro->getId(),
                'titulo' => $libro->getTitulo(),
                'autor' => $libro->getAutor(),
            ];
        }
        return $salida;
    }

    public static function add_favorito($usuarioId, $libroId)
    {
        try {
            $conn = DataBase::getConnection();
            $stmt = $conn->prepare("insert into favoritos (usuario_id,libro_id) values (:u,:l)");
            $stmt->execute([
                ":u" => $usuarioId,
                ":l" => $libroId,
            ]);

            if ($stmt)
                return ["add" => true, "message" => "libro agregado a favoritos"];
            return ["add" => false, "message" => "libro no fue agregado a favoritos"];
        } catch (PDOException $e) {
            $errorCode = $e->getCode();
            if ($errorCode == 23000)
                return ["" => false, "message" => "el libro ya fue agregado a favorios"];
            return ["" => false, "message" => "hubo un problema interno, intentelo mas tarde"];
        }

    }
    public static function del_favorito($usuarioId, $libroId)
    {
        $conn = DataBase::getConnection();
        $stmt = $conn->prepare("delete from favoritos where usuario_id = :u and libro_id = :l");
        $stmt->execute([
            ":u" => $usuarioId,
            ":l" => $libroId,
        ]);
        if ($stmt)
            return ["del" => true, "message" => "libro eliminado de favoritos"];
        return ["del" => false, "message" => "libro no fue eliminado de favoritos"];
    }
}