import { Router } from "express";
import {
  productosDB,
  productoNuevo,
  productoNombre,
} from "../controller/productos.controller.js";
const router = Router();

router.get("/productos", productosDB);
router.get("/producto/:nombre", productoNombre);
router.post("/producto/nuevo", productoNuevo);

export default router;
