function anadirFav(id) {
  let fd = new FormData();
  fd.append("libroId", id);
  fetch("add-favoritos.php", {
    method: "POST",
    body: fd,
  })
    .then((result) => result.json())
    .then((data) => {
      document.querySelector(".message-libros").textContent = data.message;
    });
}

function eliminarFav(id) {
  let fd = new FormData();
  fd.append("libroId", id);
  fetch("del-favoritos.php", {
    method: "POST",
    body: fd,
  })
    .then((result) => result.json())
    .then((data) => {
      document.querySelector(".message-favoritos").textContent = data.message;
    });
}

function cargarFavoritos() {
  let salida = document.querySelector(".favoritos");
  fetch("mostrar-favoritos.php")
    .then((result) => result.json())
    .then((libros) => {
      console.log(libros);

      let html = "<ul>";
      for (let libro of libros) {
        html += `<li>${libro.titulo} - ${libro.autor} <button class='del-favorito' data-id='${libro.id}'>No favoritos</button></li>`;
      }
      html += "</ul>";

      salida.innerHTML = html;
      document.querySelectorAll(".del-favorito").forEach((e) => {
        e.addEventListener("click", () => {
          eliminarFav(e.dataset.id);
          cargarFavoritos();
        });
      });
    })
    .catch((error) => {
      salida.textContent = "no se pudo cargar porque --> " + error;
    });
}

function cargarLibros() {
  let salida = document.querySelector(".libros");
  fetch("mostrar-libros.php")
    .then((result) => result.json())
    .then((libros) => {
      let html = "<ul>";
      for (let libro of libros) {
        html += `<li>${libro.titulo} - ${libro.autor} <button class='add-favorito' data-id='${libro.id}'>favoritos</button></li>`;
      }
      html += "</ul>";

      salida.innerHTML = html;
      document.querySelectorAll(".add-favorito").forEach((e) => {
        e.addEventListener("click", () => {
          anadirFav(e.dataset.id);
          cargarFavoritos();
        });
      });
    })
    .catch((error) => {
      salida.textContent = "no se pudo cargar" + error;
    });
}
