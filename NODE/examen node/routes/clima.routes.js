import { Router } from "express";
import { obtenerClima } from "../controller/clima.controller.js";
const router = Router();

router.get("/", obtenerClima);

export default router;
