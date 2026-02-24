const API_BASE = "http://localhost:3000";

function renderProductos(data) {
  const list = document.getElementById("productos-list");
  list.innerHTML = "";
  console.log(data);

  // Normaliza: array o wrap single object
  let productos = Array.isArray(data)
    ? data
    : data && data.productos
      ? data.productos
      : data
        ? [data]
        : []; // [code:0]

  if (productos.length === 0) {
    list.innerHTML = "<p>No hay productos</p>";
    return;
  }

  if (data.error) {
    const el = document.createElement("div");
    el.innerHTML = `<strong>${data.error}</p>`;
    list.appendChild(el);
    return
  }
  productos.forEach((p) => {
    const el = document.createElement("div");
    el.innerHTML = `<strong>nombre: ${p.nombre}</strong> - precio: ${p.precio} <p>descripcion: ${p.descripcion || ""}</p> <br>`;
    list.appendChild(el);
  });
}

function cargarProductos() {
  fetch(`${API_BASE}/productos`)
    .then((r) => r.json())
    .then((json) => {
      const items = json.items || json;
      renderProductos(items);
    })
    .catch((e) => console.error(e));
}

// search button (use direct listener)
document.getElementById("btn-search").addEventListener("click", () => {
  const busqueda = document.getElementById("search").value.trim();
  let url =
    busqueda !== ""
      ? `${API_BASE}/producto/${busqueda}`
      : `${API_BASE}/productos`;
  fetch(url)
    .then((r) => r.json())
    .then((data) => {
      console.log("data : ", data);
      renderProductos(data.items || data);
    })
    .catch((err) => console.error(err));
});

document.getElementById("nuevo_producto").addEventListener("submit", (e) => {
  e.preventDefault();
  const nombre = e.target.nombre.value;
  const precio = parseFloat(e.target.precio.value || 0);
  const descripcion = e.target.descripcion.value;
  fetch(`${API_BASE}/producto/nuevo`, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ nombre, precio, descripcion }),
  })
    .then((r) => r.json())
    .then((data) => {
      if (data.register) {
        cargarProductos();
      } else {
        alert(data.message || "Error");
      }
    })
    .catch((err) => console.error(err));
});
