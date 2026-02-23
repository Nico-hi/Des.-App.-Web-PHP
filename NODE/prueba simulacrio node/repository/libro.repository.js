import { pool } from "../db/connection.js";
class LibroRepo {
	saveLibro(titulo, autor) {
		const sql = "INSERT INTO libros (titulo, autor) VALUES(?,?)";
		return pool.query(sql, [titulo, autor]).then(([rows]) => rows.affectedRows);
	}
	getLibros(pagina) {
		const sql = " SELECT * from libros limit 10 offset ?";
		return pool.query(sql, [10 * pagina]).then(([rows]) => rows || null);
	}

	searchLibros(text, pagina) {
		const like = `%${text}%`;
		const sql =
			"SELECT * FROM libros WHERE titulo LIKE ? OR autor LIKE ? LIMIT 10 OFFSET ?";
		return pool
			.query(sql, [like, like, 10 * pagina])
			.then(([rows]) => rows || []);
	}
}

export default new LibroRepo();
