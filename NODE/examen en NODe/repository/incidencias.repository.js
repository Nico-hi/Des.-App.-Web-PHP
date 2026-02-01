import Incidencias from "../model/incidencias.model.js";
import { pool } from "../db/database.js";
class IncidenciasRepo {
  getIncidencias() {
    let sql = "select * from incidencias";
    return pool.query(sql, []).then(([rows]) => rows);
  }

  getIncidencia(id) {
    let sql = "select * from incidencias where id = ? limit 1";
    return pool.query(sql, [id]).then(([rows]) => rows[0]);
  }

  crearIncidencia(titulo, descripcion, estado, usuario_id) {
    let sql =
      "insert into incidencias (titulo,descripcion,estado,usuario_id) values (?,?,?,?)";
    return pool
      .query(sql, [titulo, descripcion, estado, usuario_id])
      .then(([rows]) => {
        if (rows.affectedRows > 0) {
          return true;
        } else {
          return false;
        }
      });
  }

  eliminarIncidencia(id) {
    let sql = "DELETE FROM incidencias WHERE id = ?";
    return pool.query(sql, [id]).then(([rows]) => {
      if (rows.affectedRows > 0) {
        return true;
      } else {
        return false;
      }
    });
  }

  actualizarIncidencia(estado, id) {
    let sql =
      "UPDATE incidencias SET estado = COALESCE(?, estado) WHERE id = ?";
    return pool.query(sql, [estado, id]).then(([rows]) => {
      //   console.log(rows);

      if (rows.affectedRows > 0) {
        return true;
      } else {
        return false;
      }
    });
  }
}

export default new IncidenciasRepo();
