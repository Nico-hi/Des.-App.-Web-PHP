const multer = require("multer");
const ArchivosDAO = require("../dao/ArchivosDAO");

const storage = multer.diskStorage({
    destination: "uploads",
    filename: (req, file, cb) => {
        cb(null, file.originalname);
    }
});

const upload = multer({ storage });

exports.subir = [
    upload.single("archivo"),
    (req, res) => {
        res.json({ mensaje: "Archivo subido correctamente" });
    }
];

exports.listar = async (req, res) => {
    try {
        const archivos = await ArchivosDAO.listar();
        res.json(archivos);
    } catch {
        res.status(500).json({ error: "Error al listar archivos" });
    }
};

exports.descargar = (req, res) => {
    const nombre = req.params.nombre;

    if (!ArchivosDAO.existe(nombre)) {
        return res.status(404).json({ error: "Archivo no encontrado" });
    }

    res.download(ArchivosDAO.rutaCompleta(nombre));
};
