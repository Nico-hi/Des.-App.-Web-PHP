window.addEventListener("DOMContentLoaded", () => {
  let session = document.getElementById("session"); // seccion llamada session
  let login = document.querySelector("#session .login"); // seccion llamada login
  let tienda = document.getElementById("tienda");
  let carrito = document.getElementById("carrito");

  let url = window.location.href.split("?role=")[1];
  let register = "";

  fetch(`http://localhost:3000/register?role=${url}`)
    .then((result) => result.json())
    .then((data) => {
      // console.log(data);
      let register = document.querySelector(`#session .${data.register}`);
      register.style.display = "block";

      if (data.register == "admin")
        document.querySelector("#tienda .t-admin").style.display = "block";
      return register;
    })
    .then((form) => {
      form.addEventListener("submit", (e) => {
        e.preventDefault();
        // console.log(e);

        let usuario = e.target.usuario.value;
        let contrasena = e.target.contrasena.value;

        // console.log(usuario,contrasena);

        fetch(
          `http://localhost:3000/sign-up/${form.className == "admin" ? form.className : ""}`,
          {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({ usuario, contrasena }),
          },
        )
          .then((result) => result.json())
          .then((data) => {
            // console.log(data);
            document.getElementById("messagereg").textContent = data.message;
          });
      });
    })
    .catch((error) => {
      console.log(error);
    });

  document.querySelector(`.login form`).addEventListener("submit", (e) => {
    e.preventDefault();
    // console.log(e);

    let usuario = e.target.usuario.value;
    let contrasena = e.target.contrasena.value;

    // console.log(usuario,contrasena);

    fetch(`http://localhost:3000/sign-in`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ usuario, contrasena }),
    })
      .then((result) => result.json())
      .then((data) => {
        // console.log(data);
        document.getElementById("messagelog").textContent = data.message;
        if (data.login) {
          tienda.style.display = "block";
          session.style.display = "none";
          cargarProductos();
        }
      });
  });

  document.querySelector(".salir").addEventListener("click", (e) => {
    e.preventDefault();
    fetch(`http://localhost:3000/log-out`)
      .then((result) => result.json())
      .then((data) => {
        if (data.logout) {
          tienda.style.display = "none";
          session.style.display = "block";
        }
      })
      .catch((error) => console.log(error));
  });

  document.querySelector(".carrito").addEventListener("click", (e) => {
    e.preventDefault();
  });
}); // fin de DOMContentloaded
