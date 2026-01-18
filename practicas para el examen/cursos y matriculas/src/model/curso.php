<?php
class Curso
{
    private $id;
    public $curso;
    public $descripcion;

    public function __construct($id, $curso, $descripcion)
    {
        $this->id = $id;
        $this->curso = $curso;
        $this->descripcion = $descripcion;
    }

    public function getId()
    {
        return $this->id;
    }
}