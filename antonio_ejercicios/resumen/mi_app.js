window.addEventListener("DOMContentLoaded", () => {
  document.getElementById("filtro").addEventListener("submit", (e) => {
    e.preventDefault();
    console.log(e);
    
    fetch("mi_buscador.php", {
      method: "POST",
      body: new FormData(e.target)
    })
      .then(r => r.json())
      .then(lista => {
        let html = "";
        lista.forEach((e) => {
          if (e.name_p && e.price_p) {
            html += `<li>${e.name_p} ===>  ${e.price_p}</li>`;
          } else {
            html += `<li>${e.status} ===>  ${e.message}</li>`;
          }
        });
        document.getElementById("resultados").innerHTML = html;
      })
      .catch((error) => {
        console.log(error);
      });
  });
});
