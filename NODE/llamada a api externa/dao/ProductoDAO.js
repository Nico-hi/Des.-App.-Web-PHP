const axios = require("axios");

class ProductoDAO {

    static async buscarPorTexto(texto) {
        // Llamada a la API pública (documentación en https://fakestoreapi.com/docs)
        const response = await axios.get("https://fakestoreapi.com/products");
        const productos = response.data;

        // Filtrado local (simula el LIKE de SQL)
        const filtrados = productos.filter(p =>
            p.title.toLowerCase().includes(texto.toLowerCase())
        );

        // Normalizamos el formato para el frontend
        return filtrados.map(p => ({
            id: p.id,
            nombre: p.title,
            precio: p.price
        }));
    }
}

module.exports = ProductoDAO;
