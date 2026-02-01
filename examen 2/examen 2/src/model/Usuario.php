<?php 
class Usuario{
    private $id;
    public $nombre;
    public $email;
    private $contrasena;
    public function __construct($id, $nombre, $email, $contrasena)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
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