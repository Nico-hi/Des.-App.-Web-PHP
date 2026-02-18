const pool = require("../db/database");
class ClimaBBDD {
  cargar(nombre) {
    let sql = `select * from climas where nombre = ?`;
    return pool.query(sql, [nombre]).then((result) => {
      // console.log(result);

      if (result[0].length !== 0) {
        return result[0];
      } else {
        return null;
      }
    });
  }

  agregar(nombre, tempertaruta, descripcion) {
    let sql = `insert into climas (nombre, tempertaruta, descripcion) values (?, ?, ?)`;
    return pool
      .query(sql, [nombre, tempertaruta, descripcion])
      .then((result) => {
        console.log(result);

        if (result.affectedRows === 1) {
          return true;
        }
        return false;
      });
  }
}

module.exports = new ClimaBBDD();
