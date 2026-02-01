import { Router } from "express";
import {
  getIncidencias,
  getIncidencia,
  crearIncidencia,
  borrarIncidencia,
  actualizarIncidencia,
} from "../controller/incidencias.controller.js";
const router = Router();
router.get("/incidencias",getIncidencias);
router.get("/incidencia/:id",getIncidencia);
router.post("/incidencia/crear",crearIncidencia);
router.post("/incidencia/borrar/:id",borrarIncidencia);
router.post("/incidencia/actualizar/:id",actualizarIncidencia);
// router.post("/incidencia/",);

export default router;
