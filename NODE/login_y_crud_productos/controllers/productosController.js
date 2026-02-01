const ProductoDAO = require("../dao/ProductoDAO");

// Buscar productos
exports.buscar = async (req, res) => {
    const texto = req.body.texto;
    try {
        const productos = await ProductoDAO.buscarPorTexto(texto);
        res.json(productos);
    } catch (error) {
        res.status(500).json({ error: "Error al buscar productos" });
    }
};

// Crear producto
exports.crear = async (req, res) => {
    const nombre = req.body.nombre;
    const precio = req.body.precio;

    try {
        const id = await ProductoDAO.crear(nombre, precio );
        res.json({ id, nombre, precio });
    } catch (error) {
        res.status(500).json({ error: "Error al crear producto" });
    }
};

// Actualizar producto
exports.actualizar = async (req, res) => {
    const id = req.body.id;
    const nombre = req.body.nombre;
    const precio = req.body.precio;
    try {
        await ProductoDAO.actualizar(id, nombre, precio);
        res.json({ id, nombre, precio });
    } catch (error) {
        res.status(500).json({ error: "Error al actualizar producto" });
    }
};

// Eliminar producto
exports.eliminar = async (req, res) => {
    const id = req.body.id;
    try {
        await ProductoDAO.eliminar(id);
        res.json({ mensaje: "Producto eliminado" });
    } catch (error) {
        res.status(500).json({ error: "Error al eliminar producto" });
    }
};

// Listar todos
exports.listar = async (req, res) => {
    try {
        const productos = await ProductoDAO.listar();
        res.json(productos);
    } catch (error) {
        res.status(500).json({ error: "Error al listar productos" });
    }
};
