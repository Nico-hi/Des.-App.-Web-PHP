<?php
#creamos una clase que sea referente a la tabla producto de la BBDD
class Producto {
    #creamos variables para dicha clase, en este caso solo hemos tomado 3
    # el id de dicho porducto
    # su nombre
    # su precio
    private $id;
    private $nombre;
    private $precio;
#creamos un constructor para instanciar un nuevo producto/objeto
    public function __construct($id, $nombre, $precio) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }
}
