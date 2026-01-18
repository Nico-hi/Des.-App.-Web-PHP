<?php
class Usuario
{
    private $id;
    public $usuario;
    private $contrasena;

    public function __construct($id, $usuario, $contrasena)
    {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getContrasena()
    {
        return $this->contrasena;
    }
}