document.getElementById("filtro").addEventListener("submit", e => {

    e.preventDefault();

    // Enviamos los datos del formulario al servidor usando fetch()
    fetch("public/buscador.php", {  // URL del script PHP que procesará los datos
        method: "POST",             // Usamos POST para enviar datos de manera segura
        body: new FormData(e.target) // Creamos un objeto FormData con todos los campos del formulario
    })

    // Convertimos la respuesta del servidor a un objeto JS usando JSON
    .then(r => r.json())

    .then(respuesta => {
        let html = ""; // Variable que almacenará el HTML que vamos a insertar dinámicamente

        if (respuesta.data.length === 0) {
            html = "<p>" + respuesta.mensaje + "</p>";
        } else {
            respuesta.data.forEach(p =>
                // Creamos un <li> para cada producto con nombre y precio
                html = html + "<li>" + p.nombre + " - " + p.precio + " Euros</li>"
            );
        }

        document.getElementById("resultados").innerHTML = html;
    });

});
