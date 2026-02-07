import { Router } from "express";
import {
  signIn,
  signUp,
  signUpAdmin,
  logUot,
  register
} from "../controller/session.controller.js";

const router = Router();

router.get("/register",register)
router.post("/sign-in", signIn);
router.post("/sign-up", signUp);
router.post("/sign-up/admin", signUpAdmin);
router.get("/log-out", logUot);

export default router;
