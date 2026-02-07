/* 
    fetch(`http://localhost:3000/`)
      .then((result) => result.json())
      .then((data) => {})
      .catch((error) => console.log(error)); */
function cargarProductos() {
  fetch(`http://localhost:3000/productos`)
    .then((result) => result.json())
    .then((data) => {
      let lista =
        "<ul style='display:grid; grid-template-columns:repeat(5,1.5fr); gap:3rem'>";
      data.forEach((producto) => {
        lista += `<li style='font-size:.8rem;'>
            <b>ID : </b>${producto.id} <br>
            <b>NOMBRE : </b>${producto.nombre} <br>
            <b>CATEGORIA : </b>${producto.categoria} <br>
            <b>PRECIO : </b>${producto.precio} <br>
            <b>STOCK : </b>${producto.cantidad_stock}
            </li>`;
      });
      lista += "</ul>";

      document.querySelector(".t-normal").innerHTML = lista;
    })
    .catch((error) => console.log(error));
}

window.addEventListener("DOMContentLoaded", () => {
  document.querySelector(".t-admin form").addEventListener("submit", (e) => {
    e.preventDefault();
    let nombre = e.target.nombre.value;
    let categoria = e.target.categoria.value;
    let precio = e.target.precio.value;
    let stock = e.target.stock.value;
    console.log(nombre,categoria,precio,stock);
    
    fetch(`http://localhost:3000/producto/crear`, {
      headers: {
        "Content-Type": "application/json",
      },
      method: "POST",
      body: JSON.stringify({ nombre, categoria, precio, stock }),
    })
      .then((result) => result.json())
      .then((data) => {
        alert(data.message);
        if(data.created) cargarProductos()
      })
      .catch((error) => console.log(error));
  });
});
