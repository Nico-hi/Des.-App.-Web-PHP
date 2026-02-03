const pool = require("../db/database");

class ProductoDAO {
  static async buscarConPaginacion(texto, orden, direccion, page, limit) {
    // OJO EL MÉTODO NORMAL NO IMPIDE USO DE INYECCIÓN DE SQL PARA ORDER BY!!!!
    // Aquí decimos, si en el orden entra algo que no sea exactamente nombre o precio,
    // ponemos nombre, y si en la dirección entra algo que no es asc o desc ponemos asc
    if (!["nombre", "precio"].includes(orden)) orden = "nombre";

    if (!["asc", "desc"].includes(direccion)) direccion = "asc";

    // Calculamos desde qué registro empezar según la página actual
    const offset = (page - 1) * limit;

    // Consulta principal que obtiene SOLO los productos de la página actual
    const sql = `
        SELECT id, nombre, precio
        FROM productos
        WHERE nombre LIKE ?
        ORDER BY ${orden} ${direccion}
        LIMIT ? OFFSET ?
    `;

    // Consulta auxiliar que cuenta cuántos productos hay en total
    const countSql = `
        SELECT COUNT(*) as total
        FROM productos
        WHERE nombre LIKE ?
    `;
    console.log(sql);
    console.log(countSql);

    // Ejecutamos la consulta principal pasando texto, límite y offset
    const [rows] = await pool.execute(sql, [`%${texto}%`, limit, offset]);
    console.log(rows);

    // Ejecutamos la consulta de conteo y extraemos el total de productos
    const [[{ total }]] = await pool.execute(countSql, [`%${texto}%`]);
    console.log(total);

    // Devolvemos los productos de la página y el total para calcular páginas
    return { productos: rows, total };
  }
}

// Exportamos el DAO para poder usarlo desde el controller
module.exports = ProductoDAO;
