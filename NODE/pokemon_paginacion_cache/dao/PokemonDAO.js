const axios = require("axios");
const NodeCache = require("node-cache");

const cache = new NodeCache({ stdTTL: 60 });

class PokemonDAOConCache {
    static async listarPokemons(limit = 10, offset = 0) {
        const key = `pokemons-${limit}-${offset}`;

        if (cache.has(key)) {
            return cache.get(key);
        }

        const url = `https://pokeapi.co/api/v2/pokemon?limit=${limit}&offset=${offset}`;

        try {
            const response = await axios.get(url);

            const resultado = response.data.results.map(p => ({
                nombre: p.name,
                url: p.url
            }));

            cache.set(key, resultado);
            return resultado;

        } catch (error) {
            throw new Error("No se pudieron obtener los Pokémon");
        }
    }
}

module.exports = PokemonDAOConCache;
