import bcrypt from "bcrypt";
import userRepo from "../repository/user.repository.js";
let numRegister = 0;
export const register = async (req, res) => {
  let { usuario, contrasena, admin, role } = req.body;

  if (admin === "admin" && numRegister === 0) {
    ++numRegister;
    role = "admin";
  } else {
    return res.status(401).json({
      message: "acceso no autorizado",
    });
  }

  const hash = await bcrypt.hash(contrasena, 10);
  let result = await userRepo.saveUser(usuario, hash, role);
  if (result === 1) {
    return res.json({
      register: true,
      message: "usuario registrado",
    });
  }
  return res.json({ register: false, message: "usuario no registrado" });
};

export const login = async (req, res) => {
  const { usuario, contrasena } = req.body;
  const userDB = await userRepo.getUser(usuario);
  if (await bcrypt.compare(contrasena, userDB.contrasena)) {
    req.session.usuario = {
      id: userDB.id,
      usuario: userDB.usuario,
    };

    return res.json({
      login: true,
      message: "usuario logueado",
    });
  }
  return res.json({
    login: false,
    message: "usuario no logueado",
  });
};
