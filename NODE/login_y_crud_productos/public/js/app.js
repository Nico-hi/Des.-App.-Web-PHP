// --- Elementos ---
const resultados = document.getElementById("resultados");
const formBusqueda = document.getElementById("formBusqueda");
const formInsertar = document.getElementById("formInsertar");
const formActualizar = document.getElementById("formActualizar");
const formEliminar = document.getElementById("formEliminar");

const formRegistro = document.getElementById("formRegistro");
const formLogin = document.getElementById("formLogin");
const crudDiv = document.getElementById("crud");

const btnLogout = document.getElementById("btnLogout");

// --- Mostrar productos ---
function mostrarProductos(lista) {
    resultados.innerHTML = "";
    lista.forEach(p => {
        resultados.innerHTML += `<li>ID: ${p.id} | ${p.nombre} - ${p.precio} €</li>`;
    });
}

// --- Registro ---
formRegistro.addEventListener("submit", e => {
    e.preventDefault();
    const usuario = e.target.usuario.value;
    const password = e.target.password.value;

    fetch("http://localhost:3000/registro", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ usuario, password })
    })
    .then(r => r.json())
    .then(res => {
        alert(res.mensaje);
        e.target.reset();
    });
});

// --- Login ---
formLogin.addEventListener("submit", e => {
    e.preventDefault();
    const usuario = e.target.usuario.value;
    const password = e.target.password.value;

    fetch("http://localhost:3000/login", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ usuario, password })
    })
    .then(r => r.json())
    .then(res => {
        if(res.ok){
            // si se hace login correcto se ocultan la parte de login y registro
            alert("Login correcto");
            formRegistro.style.display = "none";
            formLogin.style.display = "none";
            crudDiv.style.display = "block";
            // y se muestran todos los productos
            cargarTodos();
        } else {
            alert("Usuario o contraseña incorrectos");
        }
    });
});

// --- Logout ---
btnLogout.addEventListener("click", () => {
    fetch("http://localhost:3000/logout", {
        method: "POST"
    })
    .then(() => {
        //si hacemos logout se vuelven a mostrar únicamente los formularios
        //de registro y login
        crudDiv.style.display = "none";
        formLogin.style.display = "block";
        formRegistro.style.display = "block";
        resultados.innerHTML = "";
    });
});

// --- CRUD existente ---
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
