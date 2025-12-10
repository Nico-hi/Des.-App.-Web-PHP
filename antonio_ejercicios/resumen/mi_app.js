window.addEventListener("DOMContentLoaded", () => {
  document.getElementById("filtro").addEventListener("submit", (e) => {
    e.preventDefault();// evitamos el comportamiento por defecto del formulario (recargar la pagina)
    // console.log(e);
    // enviamos los datos del formulario al servidor usando fetch()
    fetch("mi_buscador.php", {
      method: "POST",// usamos POST para enviar datos de manera segura
      body: new FormData(e.target)// creamos un objeto FormData con todos los campos del formulario
    })
      .then(r => r.json())// convertimos la respuesta del servidor a un objeto JS usando JSON
      .then(lista => {// aqui ya tenemos el objeto JS con los datos
        let html = "";
        lista.forEach((e) => {
          if (e.name_p && e.price_p) {// si tiene esos campos es que es un resultado valido
            html += `<li>${e.name_p} ===>  ${e.price_p}</li>`;
          } else {// si no, es un mensaje de error u otro tipo de informacion
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
