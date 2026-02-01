const express = require("express");
const router = express.Router();
const productosController = require("../controllers/productosController");

router.post("/buscar", productosController.buscar);
router.post("/crear", productosController.crear);
router.post("/actualizar", productosController.actualizar);
router.post("/eliminar", productosController.eliminar);
router.get("/", productosController.listar);

module.exports = router;
