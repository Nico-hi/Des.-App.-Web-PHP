<?php
require_once "../db/connection.php";
require_once "../model/libro.php";
class LibroDAO
{
    private function getLibros()
    {
        $libros = [];
        $conn = DataBase::getConnection();
        $stmt = $conn->prepare("select * from libros where 1");
        $stmt->execute();
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $libros[] = new Libro($result['id'], $result['titulo'], $result['autor']);
        }
        return $libros;
    }

    public function listar()
    {
        $libros = $this->getLibros();
        $result = [];
        if (!$libros) return ["error" => "no pudimos encontrar libros"];
        
        foreach ($libros as $libro) {
        $result[] = [
            'id'     => $libro->getId(),
            'titulo' => $libro->getTitulo(),
            'autor'  => $libro->getAutor(),
        ];
    }
        return $result;
    }
}
