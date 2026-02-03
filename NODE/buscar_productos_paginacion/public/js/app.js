// variable que guarda la página actual
let page = 1;

// número máximo de productos por página
// Esto es la base de la paginación (20 productos por vista)
const limit = 20;

// Referencias al DOM
const form = document.getElementById("formBusqueda");
const resultados = document.getElementById("resultados");

// span donde mostramos el número de página actual
const paginaActual = document.getElementById("paginaActual");

function buscarProductos() {
  // texto del input
  const texto = form.texto.value;

  // valores del select de ordenación
  const orden = form.orden.value;
  const direccion = form.direccion.value;

  // Ahora enviamos MÁS información al backend:
  // texto + orden + dirección + página + límite
  fetch("http://localhost:3000/productos/buscar", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      texto,
      orden,
      direccion,
      page, // página actual
      limit, // productos por página
    }),
  })
    .then((r) => r.json())
    .then((data) => {
      console.log(data);

      // limpiamos resultados
      resultados.innerHTML = "";

      // Ahora el backend devuelve un objeto:
      // { productos: [...], totalPages: X }
      data.productos.forEach((p) => {
        resultados.innerHTML += `<li>${p.nombre} - ${p.precio} €</li>`;
      });

      // mostramos la página actual en pantalla
      paginaActual.textContent = page;

      // lógica de paginación real
      // Desactivamos el botón "anterior" si estamos en la página 1
      document.getElementById("prev").disabled = page === 1;

      // Desactivamos el botón "siguiente" si ya estamos en la última página
      document.getElementById("next").disabled = page >= data.totalPages;
    });
}

// Al hacer una nueva búsqueda volvemos SIEMPRE a la página 1
form.addEventListener("submit", (e) => {
  e.preventDefault();
  page = 1; // reset de página
  buscarProductos();
});

// botón página anterior
document.getElementById("prev").addEventListener("click", () => {
  page--; // bajamos una página
  buscarProductos();
});

// botón página siguiente
document.getElementById("next").addEventListener("click", () => {
  page++; // subimos una página
  buscarProductos();
});
