import libroRepo from "./../repository/libro.repository.js";

export const librosDB = async (req, res) => {
	try {
		const q = (req.query.q || "").trim();
		const page = parseInt(req.query.page || "0", 10);
		const libros = await libroRepo.searchLibros(q, isNaN(page) ? 0 : page);
		return res.json({ page: isNaN(page) ? 0 : page, items: libros });
	} catch (error) {
		console.log(error);
		res.status(500).json({ error: "Internal server error" });
	}
};

export const librosAPI = async (req, res) => {
	try {
		const q = (req.query.q || "").trim() || "tolkien";
		const page = parseInt(req.query.page || "1", 10) || 1; // OpenLibrary pages start at 1
		const limit = 5;
		const url = `https://openlibrary.org/search.json?q=${encodeURIComponent(q)}&page=${page}&limit=${limit}`;
		const response = await fetch(url);
		if (!response.ok) throw new Error(`OpenLibrary error ${response.status}`);
		const data = await response.json();
		// Return docs and paging info
		return res.json({
			page,
			limit,
			numFound: data.numFound || 0,
			items: data.docs || [],
		});
	} catch (error) {
		console.log(error);
		res.status(500).json({ error: "Internal server error" });
	}
};

export const libroNuevo = async (req, res) => {
	try {
		const { titulo, autor } = req.body;
		if (!titulo || !autor)
			return res.status(400).json({ error: "titulo y autor obligatorios" });
		const result = await libroRepo.saveLibro(titulo, autor);
		if (result > 0) {
			return res.json({ register: true, message: "libro registrado" });
		}
		return res
			.status(500)
			.json({ register: false, message: "no se pudo registrar" });
	} catch (error) {
		console.log(error);
		res.status(500).json({ error: "Internal server error" });
	}
};
