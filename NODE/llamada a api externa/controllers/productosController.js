const ProductoDAO = require("../dao/ProductoDAO");

exports.buscar = async (req, res) => {
    const texto = req.body.texto;

    try {
        const productos = await ProductoDAO.buscarPorTexto(texto);
        res.json(productos);

    } catch (error) {
        res.status(500).json({ error: "Error al buscar productos" });
    }
};
