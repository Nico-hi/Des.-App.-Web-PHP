<?php
class Usuario {
    private $id;
    private $usuario;

    public function __construct($id, $usuario) {
        $this->id = $id;
        $this->usuario = $usuario;
    }

    public function getUsuario() {
        return $this->usuario;
    }
}
