window.addEventListener("DOMContentLoaded", () => {
  let login = document.getElementById("login");
  let incidencias = document.getElementById("incidencias");

  document.querySelector("#sec-regis form").addEventListener("submit", (e) => {
    e.preventDefault();
    let usuario = e.currentTarget.usuario_r.value;
    let contrasena = e.currentTarget.contrasena_r.value;
    console.log(usuario, contrasena);

    fetch("http://localhost:3000/sign-up", {
      headers: { "Content-Type": "application/json" },
      method: "POST",
      body: JSON.stringify({ usuario, contrasena }),
    })
      .then((result) => result.json())
      .then((data) => {
        // console.log(data);
        document.getElementById("messageregis").textContent = data.message;
      });
  });
  document.querySelector("#sec-login form").addEventListener("submit", (e) => {
    e.preventDefault();
    let usuario = e.currentTarget.usuario_l.value;
    let contrasena = e.currentTarget.contrasena_l.value;
    // console.log(usuario, contrasena);
    fetch("http://localhost:3000/sign-in", {
      headers: { "Content-Type": "application/json" },
      method: "POST",
      body: JSON.stringify({ usuario, contrasena }),
    })
      .then((result) => result.json())
      .then((data) => {
        // console.log(data);
        document.getElementById("messagelogin").textContent = data.message;
        if (data.login) {
          login.style.display = "none";
          incidencias.style.display = "block";
          cargarIncidencias();
        }
      });
  });

  document.getElementById("salir").addEventListener("click", (e) => {
    // console.log('click');

    e.preventDefault();
    fetch("http://localhost:3000/log-out", {
      headers: { "Content-Type": "application/json" },
      method: "POST",
    })
      .then((result) => result.json())
      .then((data) => {
        // console.log(data);
        document.getElementById("messageloguot").textContent = data.message;
        if (data.log_out) {
          login.style.display = "block";
          incidencias.style.display = "none";
        }
      });
  });
});
