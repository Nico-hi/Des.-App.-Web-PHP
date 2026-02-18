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
      console.log(data);
    })
    .catch();
});
