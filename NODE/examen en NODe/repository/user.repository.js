import { pool } from "../db/database.js";
class UserRespo {
  getUser(usuario) {
    console.log(usuario);

    let sql = `select * from usuarios where nombre = ? limit 1`;
    return pool.query(sql, [usuario]).then(([rows]) => {
      return rows.length > 0 ? rows[0] : null;
    });
  }
  createUser(usuario, contrasena) {
    // console.log(usuario, contrasena);

    let sql = `insert into usuarios (nombre, contrasena) values (?,?)`;
    return pool.query(sql, [usuario, contrasena]);
  }
}

export default new UserRespo();
