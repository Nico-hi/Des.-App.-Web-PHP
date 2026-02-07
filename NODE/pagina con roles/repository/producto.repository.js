import { pool } from "./../db/database.js";
class productoRepository {
  getProducto(id) {
    const sql = "select * from productos where id = ? limit 1";
    return pool
      .query(sql, [id])
      .then(([rows]) => (rows && rows.length ? rows[0] : null));
  }
  getProductos() {
    const sql = "select * from productos";
    return pool
      .query(sql, [])
      .then(([rows]) => (rows && rows.length ? rows : null));
  }

  crear(nombre, categoria, precio, cantidad_stock) {
    const sql =
      "insert into productos(nombre, categoria, precio, cantidad_stock) values (?,?,?,?)";
    return pool
      .query(sql, [nombre, categoria, precio, cantidad_stock])
      .then(([result]) => (result && result.affectedRows ? true : false));
  }

  borrar(id) {
    const sql = "delete from productos where id = ?";
    return pool
      .query(sql, [id])
      .then(([result]) => (result && result.affectedRows ? true : false));
  }

}

export default new productoRepository();
