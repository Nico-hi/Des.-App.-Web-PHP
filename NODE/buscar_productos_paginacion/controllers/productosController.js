const ProductoDAO = require("../dao/ProductoDAO");

exports.buscar = async (req, res) => {
    //esto pone unos valores por defecto, 
    // que son los que se rellenan si no vienen rellenos del front
    const {
        texto = "",
        orden = "nombre",
        direccion = "asc",
        page = 1,
        limit = 20
    } = req.body;

    console.log(req.body);
    
    try {
        const { productos, total } =
            await ProductoDAO.buscarConPaginacion(
                texto, orden, direccion, page, limit
            );

    // totalPages indica CUÁNTAS PÁGINAS hay en total
    // total = número TOTAL de productos que existen en la BD
    // limit = productos que mostramos por página (20)
    // total / limit = número de páginas (puede ser decimal)
    // Math.ceil(...) redondea HACIA ARRIBA para no perder la última página
        res.json({
            productos,
            totalPages: Math.ceil(total / limit)
        });

    } catch (error) {
        res.status(500).json({ error: "Error al buscar productos" });
    }
};
