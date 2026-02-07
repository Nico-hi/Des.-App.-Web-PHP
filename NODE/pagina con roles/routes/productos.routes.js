import { Router } from "express";
import {
  borrar,
  crear,
  producto,
  productos,
} from "../controller/producto.controller.js";

const router = Router();

router.get("/productos", productos);
router.get("/producto/:id", producto);
router.post("/producto/crear/", crear);
router.post("/producto/borrar/:id", borrar);

export default router;
