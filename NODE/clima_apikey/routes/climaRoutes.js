const express = require("express");
const router = express.Router();
const climaController = require("../controllers/climaController");

router.post("/", climaController.obtenerClima);

module.exports = router;
