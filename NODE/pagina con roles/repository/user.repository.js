import { pool } from "./../db/database.js";
class userRepository {
  /**
   * 
   * @param {string} nombre del usuario 
   * @returns 
   */
  getUser(usuario) {
    const sql = "select * from usuarios u where u.usuario = ? limit 1";
    return pool
      .query(sql, [usuario])
      .then(([rows]) => (rows && rows.length ? rows[0] : null));
  }
/*     signIn(usuario, contrasena) {
      const sql = "";
      return pool.query(sql, []).then(([rows]) => {});
    } */

  /**
   * 
   * @param {string} nombre del usuario 
   * @param {string} contrasena del usuario 
   * @param {id} rol del usuario 1(user)/2(admin)
   * @returns 
   */
  registrar(usuario, contrasena, role) {
    const sql = "insert into usuarios(usuario,contrasena,role) values (?,?,?)";
    return pool
      .query(sql, [usuario, contrasena, role])
      .then(([result]) => (result && result.affectedRows ? true : false));
  }
}

export default new userRepository();
