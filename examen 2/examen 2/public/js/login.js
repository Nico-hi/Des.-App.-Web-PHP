window.addEventListener("DOMContentLoaded", () => {
  // ventanas a visualizar
  let incidencias = document.getElementById("incidencias");
  let login = document.getElementById("login");

  // funcion de cargar incidencias -> muestra todas las incidencias
  function cargarIncidencias() {
    fetch("./../src/controller/cargar-incidencias.php")
      .then((result) => result.json())
      .then((data) => {
        let salida="";
        // console.log(data);
        salida += "<ul>";
        for (let incidencia of data) {
          salida += `<hr>
          <li>titulo: ${incidencia.titulo} </br>
          descripcion: ${incidencia.descripcion} </br>
          estado: ${incidencia.estado} </br>
          <button data-id=${incidencia.id} class='cambiar'>cambiar a resuelta</button>
          <button data-id=${incidencia.id} data-usuaioid=${incidencia.usuarioId} class='eliminar'>eliminar</button>
          </li> 
          <hr>`;
        }

        salida += "</ul>";
        document.getElementById("lista-incidencias").innerHTML = salida;
        // evento para el boton de cambio de estado
        document.querySelectorAll(".cambiar").forEach((e) => {
          e.addEventListener("click", () => {
            cambiar(e.dataset.id);
          });
        });
        // evento para el boton de eliminar
        document.querySelectorAll(".eliminar").forEach((e) => {
          e.addEventListener("click", () => {
            eliminar(e.dataset.id, e.dataset.usuaioid);
          });
        });
      });
  }

  // funcion de cambiar el estado de la incidencia
  function cambiar(id) {
    let fd = new FormData();
    fd.append("id", id);
    fetch("./../src/controller/cambiar-estado.php", {
      method: "POST",
      body: fd,
    })
      .then((result) => result.json())
      .then((data) => {
        alert(data.message);
        cargarIncidencias();
      });
  }
  // funcion de eliminar la incidencia
  function eliminar(id, usuarioId) {
    let fd = new FormData();
    fd.append("id", id);
    fd.append("usuarioId", usuarioId);
    fetch("./../src/controller/eliminar-incidencia.php", {
      method: "POST",
      body: fd,
    })
      .then((result) => result.json())
      .then((data) => {
        // console.log(data);

        alert(data.message);
        cargarIncidencias();
      });
  }

  // evento que pasara cuando el formulario de sesion se suba
  document.querySelector("#login>form").addEventListener("submit", (e) => {
    e.preventDefault();
    // console.log(e);
    let fd = new FormData(e.currentTarget);

    fetch("./../src/controller/login.php", {
      method: "POST",
      body: fd,
    })
      .then((result) => result.json())
      .then((data) => {
        console.log(data);

        if (data.login) {
          incidencias.style.display = "block";
          login.style.display = "none";
          document.getElementById("messagelogin").textContent = data.message;
          cargarIncidencias();
          return;
        }
        document.getElementById("messagelogin").textContent = data.message;
      });
  });

  // evento de cuando se haga click en salir
  document.getElementById("salir").addEventListener("click", (e) => {
    e.preventDefault();

    fetch("./../src/controller/logout.php")
      .then((result) => result.json())
      .then((data) => {
        incidencias.style.display = "none";
        login.style.display = "block";

        document.getElementById("messagelogin").textContent = data.message;
      });
  });

  // evento para cuando hagamos click en crear incidencia
  document
    .getElementById("crear-incidencia")
    .addEventListener("submit", (e) => {
      e.preventDefault();
      let fd = new FormData(e.currentTarget);
      fetch("./../src/controller/crear-incidencia.php", {
        method: "POST",
        body: fd,
      })
        .then((result) => result.json())
        .then((data) => {
          alert(data.message);
          cargarIncidencias();
        });
    });
});
