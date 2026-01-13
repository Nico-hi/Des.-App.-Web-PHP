<?php
class Usuario {
    private $usuario;

    public function __construct($usuario) {
        $this->usuario = $usuario;
    }

    public function getUsuario() {
        return $this->usuario;
    }
}
