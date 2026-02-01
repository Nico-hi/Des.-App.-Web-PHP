const pool = require("../db/database");

class UsuarioDAO {

    static async crear(usuario, passwordHash) {
        const sql = `INSERT INTO usuarios (usuario, contrasena) VALUES (?, ?)`;
        await pool.execute(sql, [usuario, passwordHash]);
    }

    static async buscarPorUsuario(usuario) {
        const sql = `SELECT id, usuario, contrasena FROM usuarios WHERE usuario = ?`;
        const [rows] = await pool.execute(sql, [usuario]);
        return rows[0];
    }
}

module.exports = UsuarioDAO;
