import { pool } from "../db/connection.js";

class ProductoRepo {
  saveProducto(nombre, precio, descripcion) {
    const sql = "INSERT INTO productos (nombre, precio, descripcion) VALUES(?,?,?)";
    return pool.query(sql, [nombre, precio, descripcion]).then(([rows]) => rows.affectedRows);
  }

  getProductos() {
    const sql = "SELECT * FROM productos";
    return pool.query(sql, []).then(([rows]) => rows || null);
  }

  getProducto(nombre) {
    const sql = "SELECT * FROM productos WHERE nombre like ?";
    return pool.query(sql, [`%${nombre}%`]).then(([rows]) => (rows && rows.length ? rows[0] : null));
  }

}

export default new ProductoRepo();
