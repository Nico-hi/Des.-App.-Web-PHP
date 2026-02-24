fetchClima(); // Llamar aquí, visible solo logueados

function fetchClima() {
  fetch("http://localhost:3000/clima", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ ciudad: "Madrid" }),
  })
    .then((r) => r.json())
    .then((data) => {
      if (data.success) {
        document.getElementById("clima").innerHTML =
          `<p>🌤️ Madrid: ${data.clima.temperatura}°C - ${data.clima.descripcion}</p>`;
      }
    })
    .catch(console.error);
}
