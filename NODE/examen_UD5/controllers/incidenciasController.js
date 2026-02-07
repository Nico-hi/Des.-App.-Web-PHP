const IncidenciaDAO = require("../dao/IncidenciaDAO");

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
    const titulo = req.body.titulo;
    const descripcion = req.body.descripcion;
    const usuario_id = req.session.usuario.id;

    try {
        const id = await IncidenciaDAO.crear(titulo, descripcion, usuario_id);
        res.json({ id, titulo, descripcion });
    } catch (error) {
        res.status(500).json({ error: "Error al crear incidencia" });
    }
};

// Actualizar producto
exports.actualizar = async (req, res) => {
    const { id } = req.body;

    try {
        await IncidenciaDAO.actualizar(id);
        res.json({ ok: true, mensaje: "Incidencia resuelta correctamente" });

    } catch (error) {

        if (error.code === "NO_EXISTE") {
            return res.json({
                ok: false,
                mensaje: "El id introducido no existe"
            });
        }

        if (error.code === "YA_RESUELTA") {
            return res.json({
                ok: false,
                mensaje: "La incidencia ya estaba resuelta"
            });
        }

        res.status(500).json({
            ok: false,
            mensaje: "Error interno"
        });
    }
};


// Eliminar incidencia
exports.eliminar = async (req, res) => {
    const id = req.body.id;
    const usuario = req.session.usuario.id;
    try {
        await IncidenciaDAO.eliminar(id, usuario);
        res.json({ ok: true, mensaje: "Incidencia eliminada" });

    } catch (error) {
        if (error.code === "NO_EXISTE_O_NO_ASOCIADA") {
            return res.json({
                ok: false,
                mensaje: "La incidencia no existe o no la tienes asociada"
            });
        }

        res.status(500).json({ error: "Error al eliminar producto" });
    }
};

// Listar todos
exports.listar = async (req, res) => {
    try {
        const incidencias = await IncidenciaDAO.listar();
        res.json(incidencias);
    } catch (error) {
        res.status(500).json({ error: "Error al listar incidencias" });
    }
};
