// --- Al entrar en la página, pedimos info de la sesión ---
fetch("public/sesion.php")
    .then(r => r.json())
    .then(data => {
        if (!data.logeado) {
            // Si no hay sesión → de vuelta al login
            window.location.href = "index.html";
            return;
        }

        // Si hay sesión → saludamos
        document.getElementById("saludo").innerText =
            "Hola, " + data.usuario;
    });


// Insertar producto
document.getElementById("form-producto").addEventListener("submit", e => {
    e.preventDefault();
    fetch("public/productos.php", { method: "POST", body: new FormData(e.target) })
        .then(r => r.json())
        .then(lista => {
            let html = "";
            lista.forEach(obj => html += "<li>" + obj.mensaje + "</li>");
            document.getElementById("mensaje").innerHTML = html;
        });
});

// Logout
document.getElementById("btn-logout").addEventListener("click", () => {
    fetch("public/logout.php")
        .then(r => r.json())
        .then(data => {
            window.location.href = "index.html";
        });
});
