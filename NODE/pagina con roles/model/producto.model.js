class Producto {
  #id;
  nombre;
  categoria;
  precio;
  cantidad_stock;

  constructor(id, nombre, categoria, precio, cantidad_stock) {
    this.#id = id;
    this.nombre = nombre;
    this.categoria = categoria;
    this.precio = precio;
    this.cantidad_stock = cantidad_stock;
  }

  getId() {
    return this.#id;
  }
  setId(id) {
    this.#id = id;
  }
}
export default Producto;
