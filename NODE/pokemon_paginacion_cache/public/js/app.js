let limit = 10;
let offset = 0;

const lista = document.getElementById("lista");

function cargarPokemons() {
    //En este caso vemos un ejemplo de como le podemos pasar parámetros al backend por la url
    fetch(`http://localhost:3000/pokemons?limit=${limit}&offset=${offset}`)
        .then(r => r.json())
        .then(datos => {
            lista.innerHTML = "";

            datos.forEach(p => {
                lista.innerHTML += `<li>${p.nombre}</li>`;
            });
        });
}

document.getElementById("siguiente").addEventListener("click", () => {
    offset += limit;
    cargarPokemons();
});

document.getElementById("anterior").addEventListener("click", () => {
    if (offset >= limit) {
        offset -= limit;
        cargarPokemons();
    }
});

// Carga inicial
cargarPokemons();
