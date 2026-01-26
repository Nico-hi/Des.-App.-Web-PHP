const pool = require("../db/database");

class ProductoDAO {

    static async buscarPorTexto(texto) {
        const sql = `
            SELECT id, nombre, precio
            FROM productos
            WHERE nombre LIKE ?
        `;

        const [rows] = await pool.execute(sql, [`%${texto}%`]);
        return rows;
    } }

module.exports = ProductoDAO;
