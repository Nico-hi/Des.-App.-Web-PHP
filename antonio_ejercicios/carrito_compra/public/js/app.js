// --------------------------------------------------
// Al entrar en la página: comprobamos sesión
// --------------------------------------------------
fetch("session.php")
  .then((r) => r.json())
  .then((data) => {
    if (!data.login) {
      // Si no hay sesión, no mostramos nada del carrito
      return;
    }

    document.getElementById("saludo").innerText = "Hola, " + data.usuario;

    // Podríamos poner perfectamente el código directamente aquí,
    // pero es mejor separarlo en funciones para no repetir código
    cargarCarrito();
  });

cargarProductos();

// --------------------------------------------------
// Cargar productos (fetch directo, función reutilizable)
// --------------------------------------------------
function cargarProductos() {
  fetch("productos.php")
    .then((r) => r.json())
    .then((lista) => {
      let html = "";

      lista.forEach((p) => {
        //creamos un botón para cada producto utilizando además un atributo
        //llamado data-* donde podemos poner lo que queramos en * y js lo podrá
        //luego buscar
        html +=
          "<li>" +
          p.nombre +
          " - " +
          p.precio +
          " € " +
          "<button class='btn-agregar' data-id='" +
          p.id +
          "'>" +
          "Añadir" +
          "</button>" +
          "</li>";
      });

      document.getElementById("productos").innerHTML = html;

      // Asignamos listeners DESPUÉS de pintar el HTML
      // Ponemos un event listener para cada botón de la lista creada
      // Agregamos al carrito en el caso de que se pulse ese botón, EL ELEMENTO
      // CUYO ID GUARDAMOS ANTES EN data-id
      document.querySelectorAll(".btn-agregar").forEach((btn) => {
        btn.addEventListener("click", () => {
          agregarAlCarrito(btn.dataset.id);
        });
      });
    });
}

// --------------------------------------------------
// Añadir producto al carrito
// --------------------------------------------------
function agregarAlCarrito(idProducto) {
  let fd = new FormData();
  //vemos un ejemplo en el que lo que metemos en el fetch
  //no viene de un formulario, lo metemos nosotros a mano con append
  fd.append("producto_id", idProducto);

  fetch("carrito_add.php", {
    method: "POST",
    body: fd, //aquí enviamos la información a PHP (el producto metido)
  })
    .then((r) => r.json())
    .then((result) => {
      if (result.login === false) {
        alert("No autorizado, inicie sesión.");
        return;
      }
      cargarCarrito();
    });
}

// --------------------------------------------------
// Cargar carrito
// --------------------------------------------------
function cargarCarrito() {
  fetch("carrito_list.php")
    .then((r) => r.json())
    .then((lista) => {
      let html = "";

      lista.forEach((p) => {
        html +=
          "<li>" +
          p.nombre +
          " - " +
          p.precio +
          "€ <button id ='eliminar' data-id='" +
          p.id +
          "'> eliminar </button></li>";
      });

      document.getElementById("carrito").innerHTML = html;
    });
}

// --------------------------------------------------
// Vaciar carrito (evento)
// --------------------------------------------------
document.getElementById("vaciar").addEventListener("click", () => {
  fetch("carrito_clear.php")
    .then((r) => r.json())
    .then((result) => {
      if (result.login === false) {
        alert("No autorizado, inicie sesión.");
        return;
      }
      cargarCarrito();
    });
});
// eliminar producto del carrito (evento)
document.getElementById("carrito").addEventListener("click", (e) => {
  let btn = e.target;
  if (btn.id !== "eliminar") {
    return;
  }
  let id = btn.dataset.id;
  let fd = new FormData();
  fd.append("producto_id", id);

  fetch("carrito_remove.php", {
    method: "POST",
    body: fd,
  })
    .then((r) => r.json())
    .then(() => cargarCarrito());
});

// Login
document.getElementById("form-login").addEventListener("submit", (e) => {
  e.preventDefault();

  fetch("login.php", { method: "POST", body: new FormData(e.target) })
    .then((r) => r.json())
    .then((data) => {
      if (data.login) {
        // Ocultamos login, mostramos app
        document.getElementById("zona-login").style.display = "none";
        document.getElementById("btn-logout").style.display = "block";

        // Saludamos
        document.getElementById("saludo").innerText = "Hola, " + data.usuario;

        // Cargamos productos y carrito
        cargarProductos();
        cargarCarrito();
      } else {
        document.getElementById("error-login").innerText =
          "Usuario o contraseña incorrectos.";
      }
    });
});

// --------------------------------------------------
// Logout (evento)
// --------------------------------------------------
document.getElementById("btn-logout").addEventListener("click", () => {
  fetch("logout.php")
    .then((r) => r.json())
    .then(() => {
      window.location.href = "index.html";
    });
});

// para la parte de registrar usuario

document.getElementById("form-register").addEventListener("submit", (e) => {
  e.preventDefault();
  console.log(e.target);

  let fd = new FormData(e.target);
  fetch("register.php", {
    method: "POST",
    body: fd,
  })
    .then((r) => r.json())
    .then((data) => {
      console.log(data);

      if (data.success) {
        document.getElementById("error-register").innerText =
          "Usuario registrado correctamente. Ya puedes iniciar sesión.";
      } else {
        document.getElementById("error-register").innerText =
          "Error al registrar el usuario. Inténtalo de nuevo.";
      }
    });
});
