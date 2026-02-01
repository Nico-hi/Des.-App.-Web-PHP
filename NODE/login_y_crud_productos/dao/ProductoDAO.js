const pool = require("../db/database");

class ProductoDAO {

    static async buscarPorTexto(texto) {
        const sql = `SELECT id, nombre, precio FROM productos WHERE nombre LIKE ?`;
        const [rows] = await pool.execute(sql, [`%${texto}%`]);
        return rows;
    }

    static async crear( nombre, precio ) {
        const sql = `INSERT INTO productos (nombre, precio) VALUES (?, ?)`;
        const [result] = await pool.execute(sql, [nombre, precio]);
        return result.insertId;
    }

    static async actualizar(id, nombre, precio) {
        const sql = `UPDATE productos SET nombre = ?, precio = ? WHERE id = ?`;
        await pool.execute(sql, [nombre, precio, id]);
    }

    static async eliminar(id) {
        const sql = `DELETE FROM productos WHERE id = ?`;
        await pool.execute(sql, [id]);
    }

    static async listar() {
        const sql = `SELECT id, nombre, precio FROM productos`;
        const [rows] = await pool.execute(sql);
        return rows;
    }
}

module.exports = ProductoDAO;
