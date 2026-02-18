document.getElementById("formBusqueda").addEventListener("submit", e => {
    e.preventDefault();
    const texto = e.target.texto.value; // recoge el valor del input

    fetch("http://localhost:3000/productos/buscar", {
        method: "POST",
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ texto })
    })
    .then(r => r.json())
    .then(lista => {
        let html = "";
        lista.forEach(p => {
            html += `<li>${p.nombre} - ${p.precio} €</li>`;
        });
        document.getElementById("resultados").innerHTML = html;
    });
});
