let lista_incidencias = document.getElementById("lista-incidencias");

function cambiarEstado(id, estado) {
  // console.log(id, estado);

  fetch(`http://localhost:3000/incidencia/actualizar/${id}`, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ incidencia_id: id, estado: estado }),
  })
    .then((restult) => restult.json())
    .then((data) => {
      // console.log(data);
      cargarIncidencias();
    });
}

function eliminarIncidencia(id) {
  // console.log(id);

  fetch(`http://localhost:3000/incidencia/borrar/${id}`, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ incidencia_id: id }),
  })
    .then((restult) => restult.json())
    .then((data) => {
      // console.log(data);
      cargarIncidencias();
    });
}

function cargarIncidencias() {
  fetch("http://localhost:3000/incidencias")
    .then((restult) => restult.json())
    .then((data) => {
      // console.log(data.rows);
      let lista = "<ul>";
      data.rows.forEach((incidencia) => {
        lista += `<li style='margin-bottom:10px;'>
        <strong>titulo : </strong>${incidencia.titulo}</br>
        <strong>descripcion : </strong>${incidencia.descripcion}</br>
        <strong>estado : </strong>${incidencia.estado}</br>
        
        <button data-id=${incidencia.id} 
        data-estado =${incidencia.estado === "abierta" ? "resuelta" : "abierta"} class='cambiar-estado'> 
        cambiar a ${incidencia.estado === "abierta" ? "resuelta" : "abierta"} 
        </button>
        ${
          data.id === incidencia.usuario_id
            ? `<button data-id=${incidencia.id} class='eliminar-incidencia'>
             eliminar
             </button>`
            : ""
        }
        </li>`;
      });
      lista += "</ul>";
      //   console.log(lista);

      lista_incidencias.innerHTML = lista;

      document.querySelectorAll(".cambiar-estado").forEach((e) => {
        //  console.log(e);

        e.addEventListener("click", () => {
          //   e.preventDefault();
          cambiarEstado(e.dataset.id, e.dataset.estado);
        });
      });

      document.querySelectorAll(".eliminar-incidencia").forEach((e) => {
        //  console.log(e);

        e.addEventListener("click", () => {
          //   e.preventDefault();
          eliminarIncidencia(e.dataset.id);
        });
      });
    });
}

document.getElementById("crear-incidencia").addEventListener("submit", (e) => {
  e.preventDefault();
  let titulo = e.currentTarget.titulo.value;
  let descripcion = e.currentTarget.descripcion.value;
  let estado = e.currentTarget.estado.value;

  console.log(titulo, descripcion, estado);

  fetch("http://localhost:3000/incidencia/crear", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ titulo, descripcion, estado }),
  })
    .then((restult) => restult.json())
    .then((data) => {
      console.log(data);
      cargarIncidencias();
    });
});
