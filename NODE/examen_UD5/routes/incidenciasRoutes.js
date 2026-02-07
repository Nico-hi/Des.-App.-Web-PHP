const express = require("express");
const router = express.Router();
const incidenciasController = require("../controllers/incidenciasController");

// Middleware de protección
function soloLogueados(req, res, next) {
    if (req.session.usuario) {
        next();
    } else {
        res.status(401).json({ error: "No autorizado" });
    }
}

// Todas las rutas protegidas
router.post("/crear", soloLogueados, incidenciasController.crear);
router.post("/actualizar", soloLogueados, incidenciasController.actualizar);
router.post("/eliminar", soloLogueados, incidenciasController.eliminar);
router.get("/", soloLogueados, incidenciasController.listar);

module.exports = router;
