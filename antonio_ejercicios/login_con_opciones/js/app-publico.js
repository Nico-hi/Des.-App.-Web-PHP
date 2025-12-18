// Registro
document.getElementById("form-registro").addEventListener("submit", e => {
    e.preventDefault();
    fetch("public/registro.php", {
        method: "POST",
        body: new FormData(e.target)
    })
    .then(r => r.json())
    .then(data => {
        document.getElementById("mensaje").innerText = data.mensaje;
    });
});

// Login
document.getElementById("form-login").addEventListener("submit", e => {
    e.preventDefault();
    fetch("public/login.php", {
        method: "POST",
        body: new FormData(e.target)
    })
    .then(r => r.json())
    .then(data => {
        document.getElementById("mensaje").innerText = data.mensaje;

        if (data.estado === "ok") {
            // Redirigimos al panel PRIVADO
            window.location.href = "panel.html";
        }
    });
});