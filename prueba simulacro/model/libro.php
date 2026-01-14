<?php
class Libro{
    private $id;
    private $titulo;
    private $autor;

    public function __construct($id,$titulo,$autor){
        $this->id = $id;
        $this->titulo = $titulo;
        $this->autor = $autor;
    }
    public function getId(){
        return $this->id;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function getAutor(){
        return $this->autor;
    }
}