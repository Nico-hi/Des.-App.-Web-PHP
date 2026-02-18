const ClimaDAO = require("../dao/ClimaDAO");

exports.obtenerClima = async (req, res) => {
    const ciudad = req.body.ciudad;

    try {
        const clima = await ClimaDAO.obtenerClima(ciudad);
        res.json(clima);

    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};
