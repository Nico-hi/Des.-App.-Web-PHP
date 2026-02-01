<?php 
class Incidencias{
    private $id;
    public $titulo;
    public $descripcion;
    public $estado;
    private $usuarioId;
    public  function __construct($id,$titulo,$descripcion,$estado,$usuarioId) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->usuarioId = $usuarioId;
    }

        public function getId()
    {
        return $this->id;
    }
        public function getusUarioId()
    {
        return $this->usuarioId;
    }
}