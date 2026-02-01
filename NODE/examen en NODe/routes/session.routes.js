import { Router } from "express";
import { signIn, signUp, logOut } from "../controller/session.controller.js";
const router = Router();

router.post("/sign-in", signIn);
router.post("/sign-up", signUp);
router.post("/log-out", logOut);

export default router;
