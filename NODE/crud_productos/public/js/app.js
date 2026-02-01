// Elementos
const resultados = document.getElementById("resultados");
const formBusqueda = document.getElementById("formBusqueda");
const formInsertar = document.getElementById("formInsertar");
const formActualizar = document.getElementById("formActualizar");
const formEliminar = document.getElementById("formEliminar");

// Mostrar productos en lista
function mostrarProductos(lista) {
    resultados.innerHTML = "";
    lista.forEach(p => {
        resultados.innerHTML += `<li>ID: ${p.id} | ${p.nombre} - ${p.precio} €</li>`;
    });
}

// --- Buscar ---
formBusqueda.addEventListener("submit", e => {
    e.preventDefault();
    const texto = e.target.texto.value;

    fetch("http://localhost:3000/productos/buscar", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ texto })
    })
    .then(r => r.json())
    .then(mostrarProductos);
});

// --- Insertar ---
formInsertar.addEventListener("submit", e => {
    e.preventDefault();
    const nombre = e.target.nombre.value;
    const precio = e.target.precio.value;

    fetch("http://localhost:3000/productos/crear", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ nombre, precio })
    })
    .then(() => {
        e.target.reset();
        cargarTodos();
    });
});

// --- Actualizar ---
formActualizar.addEventListener("submit", e => {
    e.preventDefault();
    const id = e.target.id.value;
    const nombre = e.target.nombre.value;
    const precio = e.target.precio.value;

    fetch(`http://localhost:3000/productos/actualizar`, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id, nombre, precio })
    })
    .then(() => {
        e.target.reset();
        cargarTodos();
    });
});

// --- Eliminar ---
formEliminar.addEventListener("submit", e => {
    e.preventDefault();
    const id = e.target.id.value;

    fetch(`http://localhost:3000/productos/eliminar`, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id })
    })
    .then(() => {
        e.target.reset();
        cargarTodos();
    });
});

// --- Listar todos ---
function cargarTodos() {
    fetch("http://localhost:3000/productos")
        .then(r => r.json())
        .then(mostrarProductos);
}

// Inicial
cargarTodos();
