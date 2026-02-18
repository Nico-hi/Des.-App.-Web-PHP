document.getElementById("formClima").addEventListener("submit", e => {
    e.preventDefault();

    const ciudad = e.target.ciudad.value;

    fetch("http://localhost:3000/clima", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ ciudad })
    })
    .then(r => r.json())
    .then(datos => {
        if (datos.error) {
            document.getElementById("resultado").innerHTML = `<li>${datos.error}</li>`;
            return;
        }

        document.getElementById("resultado").innerHTML = `
            <li>Ciudad: ${datos.ciudad}</li>
            <li>Temperatura: ${datos.temperatura} ºC</li>
            <li>Descripción: ${datos.descripcion}</li>
        `;
    });
});
