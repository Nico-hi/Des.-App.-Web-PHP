document.getElementById("register").addEventListener("submit", (e) => {
  e.preventDefault();
  const usuario = e.target.usuario.value;
  const contrasena = e.target.contrasena.value;
  const admin = "admin";
  console.log(usuario, contrasena);

  fetch("http://localhost:3000/register", {
    headers: {
      "Content-Type": "application/json",
    },
    method: "POST",
    body: JSON.stringify({
      usuario,
      contrasena,
      admin,
    }),
  })
    .then((result) => result.json())
    .then((data) => {
      console.log(data);
      if (data.register) {
        window.location.href = "http://localhost:3000/";
      }

      document.getElementById("error").textContent = data.message;
    })
    .catch();
});
