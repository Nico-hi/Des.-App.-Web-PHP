function fetchClima() {
  fetch("http://localhost:3000/clima")
    .then((r) => r.json())
    .then((data) => {
    //   console.log(data);
	  
      if (data.success) {
		  console.log(data.clima);
        document.getElementById("clima").innerHTML =
          `<p>🌤️ Madrid: ${data.clima.temperatura}°C - ${data.clima.descripcion}</p>`;
      }
    })
    .catch(console.error);
}

document.getElementById("login").addEventListener("submit", (e) => {
  e.preventDefault();
  const usuario = e.target.usuario.value;
  const contrasena = e.target.contrasena.value;
  fetch("http://localhost:3000/login", {
    headers: {
      "Content-Type": "application/json",
    },
    method: "POST",
    body: JSON.stringify({
      usuario,
      contrasena,
    }),
  })
    .then((result) => result.json())
    .then((data) => {
      console.log("inicio : ", data);
      if (!data.login) {
        document.getElementById("error").textContent = data.message;
        return;
      }

      fetchClima();

      if (data.role === "admin")
        document.getElementById("acciones").style.display = "block";
      document.getElementById("error").textContent = "";
      document.getElementById("session").style.display = "none";
      document.getElementById("clima").style.display = "block";
      document.getElementById("content").style.display = "block";
      document.querySelector("#content .name").textContent = data.usuario;
      cargarProductos();
    });
});

document.getElementById("nuevo_u").addEventListener("submit", (e) => {});

document.getElementById("logout").addEventListener("click", (e) => {
  e.preventDefault();
  fetch("http://localhost:3000/logout")
    .then((result) => result.json())
    .then((data) => {
      console.log(data);
      if (!data.logout) {
        document.getElementById("error").textContent = data.message;
        return;
      }
      document.getElementById("acciones").style.display = "none";
      document.getElementById("session").style.display = "block";
      document.getElementById("content").style.display = "none";
      document.getElementById("clima").style.display = "none";
    });
});

// registro de usuario (desde index)
document.getElementById("nuevo_u").addEventListener("submit", (e) => {
  e.preventDefault();
  const usuario = e.target.usuario_r.value;
  const contrasena = e.target.contrasena_r.value;
  const role =
    e.target.role && e.target.role.value ? e.target.role.value : "user";

  fetch("http://localhost:3000/register", {
    headers: { "Content-Type": "application/json" },
    method: "POST",
    body: JSON.stringify({ usuario, contrasena, role }),
  })
    .then((r) => r.json())
    .then((data) => {
      if (data.register) {
        document.getElementById("error_n").textContent = "Usuario registrado";
        return;
      }
      document.getElementById("error_n").textContent = data.message || "Error";
    })
    .catch((err) => {
      console.error(err);
      document.getElementById("error_n").textContent = "Error de conexión";
    });
});
