import { pool } from "./../db/connection.js";
class UserRepo {
  saveUser(usuario, contrasena, rol) {
    const sql = "insert into usuario (usuario,contrasena,role) values (?,?,?)";
    return pool
      .query(sql, [usuario, contrasena, rol])
      .then(([rows]) => rows.affectedRows);
  }
  getUser(usuario) {
    const sql = "select * from usuario where usuario = ?";
    return pool.query(sql, [usuario]).then(([rows]) => rows[0]);
  }
}

export default new UserRepo();
