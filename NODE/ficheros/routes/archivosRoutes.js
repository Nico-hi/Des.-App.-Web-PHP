const express = require("express");
const router = express.Router();

const archivosController = require("../controllers/archivosController");

router.get("/", archivosController.listar);
router.post("/subir", archivosController.subir);
router.get("/descargar/:nombre", archivosController.descargar);

module.exports = router;
