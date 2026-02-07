const pool = require("../db/database");

class IncidenciaDAO {

    static async buscarPorTexto(texto) {
        const sql = `SELECT id, nombre, precio FROM productos WHERE nombre LIKE ?`;
        const [rows] = await pool.execute(sql, [`%${texto}%`]);
        return rows;
    }

    static async crear( titulo, descripcion, usuario_id ) {
        const sql = `INSERT INTO incidencias (titulo, descripcion, estado, usuario_id) VALUES (?, ?, ?, ?)`;
        const [result] = await pool.execute(sql, [titulo, descripcion, 'abierta', usuario_id]);
        return result.insertId;
    }

    static async actualizar(id) {
        const sql = `UPDATE incidencias SET estado = 'resuelta' WHERE id = ?`;
        const [result] = await pool.execute(sql, [id]);

        if (result.affectedRows === 0) {
        const error = new Error("La incidencia no existe");
        error.code = "NO_EXISTE";
        throw error;
        }

        if (result.changedRows === 0) {
            const error = new Error("La incidencia ya estaba resuelta");
            error.code = "YA_RESUELTA";
            throw error;
        }

    return true;
        
    }

    static async eliminar(id, usuario) {
        const sql = `DELETE FROM incidencias WHERE id = ? and usuario_id = ?`;
        const [result] = await pool.execute(sql, [id, usuario]);
        if (result.affectedRows === 0) {
        const error = new Error("La incidencia no existe o no la tienes asociada");
        error.code = "NO_EXISTE_O_NO_ASOCIADA";
        throw error;
        }
        return true;
    }

    static async listar() {
        const sql = `SELECT id, titulo, descripcion, estado, usuario_id FROM incidencias`;
        const [rows] = await pool.execute(sql);
        return rows;
    }
}

module.exports = IncidenciaDAO;
