const axios = require("axios");

class PokemonDAO {
    //aquí también metemos unos valores por defecto por si alguien llamara al DAO sin valores de entrada
    static async listarPokemons(limit = 10, offset = 0) {
        //llamamos a la pokeapi como se nos indica en la documentación
        const url = `https://pokeapi.co/api/v2/pokemon?limit=${limit}&offset=${offset}`;

        try {
            const response = await axios.get(url);

            return response.data.results.map(p => ({
                nombre: p.name,
                url: p.url
            }));

        } catch (error) {
            throw new Error("No se pudieron obtener los Pokémon");
        }
    }
}

module.exports = PokemonDAO;
