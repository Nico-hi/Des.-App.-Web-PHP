import { Router } from "express";
import {
	librosDB,
	librosAPI,
	libroNuevo,
} from "../controller/libros.controller.js";
const router = Router();

router.get("/admin", librosDB);
router.get("/user", librosAPI);
router.post("/register", libroNuevo);

export default router;
