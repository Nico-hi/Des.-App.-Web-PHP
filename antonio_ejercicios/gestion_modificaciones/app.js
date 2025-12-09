// FORM INSERTAR
document.getElementById("form-insertar").addEventListener("submit", e => {
    e.preventDefault();
    fetch("insertar.php", { method: "POST", body: new FormData(e.target) })
        .then(r => r.json())
        .then(lista => {
            let html = "";
            lista.forEach(obj => html += "<li>" + obj.mensaje + "</li>");
            document.getElementById("resultados").innerHTML = html;
        });
});

// FORM MODIFICAR
document.getElementById("form-modificar").addEventListener("submit", e => {
    e.preventDefault();
    fetch("modificar.php", { method: "POST", body: new FormData(e.target) })
        .then(r => r.json())
        .then(lista => {
            let html = "";
            lista.forEach(obj => html += "<li>" + obj.mensaje + "</li>");
            document.getElementById("resultados").innerHTML = html;
        });
});

// FORM BORRAR
document.getElementById("form-borrar").addEventListener("submit", e => {
    e.preventDefault();
    fetch("borrar.php", { method: "POST", body: new FormData(e.target) })
        .then(r => r.json())
        .then(lista => {
            let html = "";
            lista.forEach(obj => html += "<li>" + obj.mensaje + "</li>");
            document.getElementById("resultados").innerHTML = html;
        });
});
