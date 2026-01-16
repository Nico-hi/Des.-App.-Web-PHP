// cargarLibros("prelibros");

// logica para registrar un usuario
document.querySelector("#registerForm").addEventListener("submit", (e) => {
  e.preventDefault();
  let fd = new FormData(e.currentTarget);
  fetch("./register.php", {
    method: "POST",
    body: fd,
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
      document.getElementById("salidaR").innerText = data.message;
    });
});

// logica para loguear un usuario
document.querySelector("#loginForm").addEventListener("submit", (e) => {
  e.preventDefault();

  let fd = new FormData(e.currentTarget);
  fetch("./login.php", {
    method: "POST",
    body: fd,
  })
    .then((response) => response.json())
    .then((data) => {
      // console.log(data);

      if (data.login) {
        document.getElementById("index").style.display = "block";
        document.getElementById("user-sesion").style.display = "none";
        document.querySelector(".prelibros").style.display = "none";
        cargarLibros("libros");
        // cargarFavoritos();
      }
      document.getElementById("salidaR").innerText = data.message;
    });
});

//logica para cerrar sesion
document.getElementById("logout").addEventListener("click", () => {
  fetch("./logout.php", {
    method: "POST",
  })
    .then((response) => response.json())
    .then((result) => {
      if (result.logout) {
        document.getElementById("index").style.display = "none";
        document.getElementById("user-sesion").style.display = "block";
        document.querySelector(".prelibros").style.display = "block";
      }
    });
});
//logica para cerrar sesion

//logica de los favoritos
document.getElementById("fav").addEventListener("click", () => {
  document.getElementById("favoritos").style.display = "block";
  document.getElementById("index").style.display = "none";
  cargarFavoritos();
});
// volver de favoritos
document.getElementById("volver").addEventListener("click", () => {
  document.getElementById("favoritos").style.display = "none";
  document.getElementById("index").style.display = "block";
  // cargarFavoritos();
});
