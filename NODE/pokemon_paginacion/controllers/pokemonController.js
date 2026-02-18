const PokemonDAO = require("../dao/PokemonDAO");

exports.listar = async (req, res) => {
    //vemos un ejemplo de como con req.query podemos recoger parámetros
    // si no viene informado, por ejemplo si se conecta a nuestra API otro cliente que no seamos nosotros,
    // damos unos valores por defecto
    const limit = parseInt(req.query.limit) || 10;
    const offset = parseInt(req.query.offset) || 0;

    try {
        const pokemons = await PokemonDAO.listarPokemons(limit, offset);
        res.json(pokemons);

    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};
