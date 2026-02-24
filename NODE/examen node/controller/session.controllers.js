import bcrypt from "bcrypt";
import userRepo from "../repository/user.repository.js";
let numRegister = 0;

export const register = async (req, res) => {
  let { usuario, contrasena, admin, role } = req.body;

  console.log(usuario, contrasena, admin, numRegister, role);
  if (admin && !role) {
    if (admin === "admin" && numRegister === 0) {
      ++numRegister;
      role = "admin";
    } else {
      return res.status(401).json({
        message: "acceso no autorizado",
      });
    }
  }

  const hash = await bcrypt.hash(contrasena, 10);
  const result = await userRepo.saveUser(usuario, hash, role);
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

  if (!userDB)
    return res.json({
      login: false,
      message: "inicio de sesion incorrecto",
    });
  if (await bcrypt.compare(contrasena, userDB.contrasena)) {
    req.session.usuario = {
      id: userDB.id,
      usuario: userDB.usuario,
      role: userDB.role,
      usuario: userDB.usuario,
    };

    // este .save() es lo importante para que la sesion se guarde
    return req.session.save((err) => {
      if (err)
        return res
          .status(500)
          .json({ login: false, message: "Error de sesión" });

      return res.json({
        login: true,
        message: "usuario logueado",
        role: req.session.usuario.role,
        usuario: req.session.usuario.usuario,
      });
    });
  }

  return res.json({
    login: false,
    message: "usuario no logueado",
  });
};

export const logout = async (req, res) => {
  req.session.destroy((err) => {
    if (err)
      return res
        .status(500)
        .json({ logout: false, message: "Error de sesión" });

    return res.json({
      logout: true,
      message: "usuario deslogueado",
    });
  });
};
