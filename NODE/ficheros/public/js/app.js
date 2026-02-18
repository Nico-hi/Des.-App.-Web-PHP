const form = document.getElementById("formSubida");
const lista = document.getElementById("listaArchivos");

form.addEventListener("submit", e => {
    e.preventDefault();

    const formData = new FormData(form);

    fetch("http://localhost:3000/archivos/subir", {
        method: "POST",
        body: formData
    })
    .then(r => r.json())
    .then(res => {
        alert(res.mensaje);
        cargarArchivos();
        form.reset();
    });
});

function cargarArchivos() {
    fetch("http://localhost:3000/archivos")
        .then(r => r.json())
        .then(archivos => {
            let html = "";
            archivos.forEach(a => {
                html += `
                    <li>
                        ${a}
                        <a href="http://localhost:3000/archivos/descargar/${a}">
                            Descargar
                        </a>
                    </li>
                `;
            });
            lista.innerHTML = html;
        });
}

cargarArchivos();
