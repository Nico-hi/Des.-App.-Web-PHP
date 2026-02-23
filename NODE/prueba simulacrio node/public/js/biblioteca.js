function agregarLibro(e) {
	e.preventDefault();
	const titulo = e.target.titulo.value;
	const autor = e.target.autor.value;

	fetch("http://localhost:3000/libro/register", {
		method: "POST",
		headers: { "Content-type": "application/json" },
		body: JSON.stringify({ titulo, autor }),
	})
		.then((result) => result.json())
		.then((data) => {
			console.log(data);
			// refresh list after adding
			cargarLibros(currentRole);
			e.target.reset();
		});
}

function agregarUsuario(e) {
	const usuario = e.target.usuario_r.value;
	const contrasena = e.target.contrasena_r.value;
	const role = e.target.role.value;

	fetch("http://localhost:3000/register", {
		method: "POST",
		headers: { "Content-type": "application/json" },
		body: JSON.stringify({ usuario, contrasena, role }),
	})
		.then((result) => result.json())
		.then((data) => {
			console.log(data);
			document.getElementById("error_n").textContent = data.message;
		});
}

function cargarLibros(role) {
	currentRole = role;
	// start page 0 for admin, 1 for user (OpenLibrary)
	currentPage = role === "admin" ? 0 : 1;
	doFetchAndRender();
}

let currentRole = "user";
let currentPage = 0;

function doFetchAndRender() {
	const q = document.getElementById("search")?.value || "";
	const api =
		currentRole === "admin"
			? `http://localhost:3000/libro/admin?q=${encodeURIComponent(q)}&page=${currentPage}`
			: `http://localhost:3000/libro/user?q=${encodeURIComponent(q)}&page=${currentPage}`;

	fetch(api)
		.then((result) => result.json())
		.then((data) => {
			renderLibros(data);
		})
		.catch((err) => console.error(err));
}

function renderLibros(data) {
	const list = document.getElementById("libros-list");
	const pager = document.getElementById("libros-pagination");
	list.innerHTML = "";
	pager.innerHTML = "";

	const items = data.items || [];
	if (items.length === 0) {
		list.innerHTML = "<p>No hay resultados</p>";
		return;
	}

	for (const libro of items) {
		const div = document.createElement("div");
		const title =
			libro.titulo ||
			libro.title ||
			libro.book_title ||
			libro.name ||
			"Sin título";
		const author =
			libro.autor ||
			(Array.isArray(libro.author_name)
				? libro.author_name.join(", ")
				: libro.author_name) ||
			libro.author ||
			"Sin autor";
		div.innerHTML = `<strong>${title}</strong> — ${author}`;
		list.appendChild(div);
	}

	// pagination controls
	const prev = document.createElement("button");
	prev.textContent = "Anterior";
	prev.disabled = currentRole === "admin" ? currentPage <= 0 : currentPage <= 1;
	prev.addEventListener("click", () => {
		currentPage =
			currentRole === "admin"
				? Math.max(0, currentPage - 1)
				: Math.max(1, currentPage - 1);
		doFetchAndRender();
	});

	const next = document.createElement("button");
	next.textContent = "Siguiente";
	next.addEventListener("click", () => {
		currentPage = currentPage + 1;
		doFetchAndRender();
	});

	pager.appendChild(prev);
	const pg = document.createElement("span");
	pg.style.margin = "0 10px";
	pg.textContent = `Página ${currentPage}`;
	pager.appendChild(pg);
	pager.appendChild(next);
}

document.getElementById("nuevo_l").addEventListener("submit", (e) => {
	agregarLibro(e);
});

document.getElementById("nuevo_u").addEventListener("submit", (e) => {
	e.preventDefault();
	agregarUsuario(e);
});
