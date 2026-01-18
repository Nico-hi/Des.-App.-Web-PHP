window.addEventListener("DOMContentLoaded", () => {
  // esto es para saber si el usuario es admin o no
  //admin --> ?admin=true
  //no admin --> cualquier otra cosa
  let queryActual = window.location.search;
  //   console.log(queryActual);

  if (queryActual === "?admin=true") {
    document.getElementById("register-admin").style.display = "block";
    document.getElementById("register").style.display = "none";
  } else {
    document.getElementById("register-admin").style.display = "none";
    document.getElementById("register").style.display = "block";
  }

  // -----------------------------------------------
  // valores de las secciones a utilizar
  let acceso = document.getElementById("acceso");
  let cursos = document.getElementById("cursos");
  let matricula = document.getElementById("matricula");

  // acciones a realizar por los botones del usuario
  // al hacer click para iniciar sesion
  document.getElementById("login").addEventListener("submit", (e) => {
    e.preventDefault();
    let fd = new FormData(e.currentTarget);
    fetch("./../src/controller/log-in.php", {
      method: "POST",
      body: fd,
    })
      .then((result) => result.json())
      .then((data) => {
        document.getElementById("message-l").innerHTML = data.message;
        if (data.login) {
          acceso.style.display = "none";
          cursos.style.display = "block";
          cargarCursos();
        }
      });
  });
  // al hacer click para para registrar al usuario normal
  document.getElementById("register").addEventListener("submit", (e) => {
    e.preventDefault();
    let fd = new FormData(e.currentTarget);
    fetch("./../src/controller/register.php", {
      method: "POST",
      body: fd,
    })
      .then((result) => result.json())
      .then((data) => {
        console.log(data);
        document.getElementById("message-r").textContent = data.message;
      });
  });
  // al hacer click para registrar a un admin
  document.getElementById("register-admin").addEventListener("submit", (e) => {
    e.preventDefault();
    let fd = new FormData(e.currentTarget);
    fetch("./../src/controller/register-admin.php", {
      method: "POST",
      body: fd,
    })
      .then((result) => result.json())
      .then((data) => {
        console.log(data);
      });
  });

  // al hacer click para cerrar sesion
  document.getElementById("salir").addEventListener("click", () => {
    fetch("./../src/controller/log-out.php")
      .then((result) => result.json())
      .then((data) => {
        if (data.logout) {
          acceso.style.display = "block";
          cursos.style.display = "none";
        }
      });
  });
  
  // boton para mostrar las matriculas que hizo dicho usuario
  
  document.getElementById("matriculado").addEventListener("click", () => {
          matricula.style.display = "block";
          cursos.style.display = "none";     
          cargarMatricula();   
  });
  
  document.getElementById("regresar").addEventListener("click", () => {
          matricula.style.display = "none";
          cursos.style.display = "block";        
  });
});

