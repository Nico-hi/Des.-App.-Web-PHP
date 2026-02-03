const express = require("express");
const router = express.Router();

const productosController = require("../controllers/productosController");

router.post("/buscar", productosController.buscar);

module.exports = router;
