const express = require("express");
const router = express.Router();
const productosController = require("../controllers/productosController");

// Middleware de protección
function soloLogueados(req, res, next) {
    if (req.session.usuario) {
        next();
    } else {
        res.status(401).json({ error: "No autorizado" });
    }
}

// Todas las rutas protegidas
router.post("/buscar", soloLogueados, productosController.buscar);
router.post("/crear", soloLogueados, productosController.crear);
router.post("/actualizar", soloLogueados, productosController.actualizar);
router.post("/eliminar", soloLogueados, productosController.eliminar);
router.get("/", soloLogueados, productosController.listar);

module.exports = router;
