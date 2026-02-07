import User from "../model/user.model.js";
import bcrypt from "bcrypt";
import userRepository from "../repository/user.repository.js";
export const register = (req, res) => {
  const roles = ["user", "admin"];
  let { role } = req.query;
  // console.log("role ==> ",role);
  try {
    role = role && typeof role === "string" ? role.toLowerCase() : "";
    role = roles.includes(role) ? role : "user";
    return res.status(200).json({ register: role });
  } catch (error) {
    return res.status(500).json({ message: "hubo un error", error });
  }
};

export const signIn = async (req, res) => {
  try {
    let { usuario, contrasena } = req.body;
    // console.log(usuario,contrasena);

    let userDB = await userRepository.getUser(usuario);
    // console.log(userDB);

    if (!userDB) return res.status(404).json({ message: "usuario no existe" });

    let user = new User(userDB.id, userDB.usuario, userDB.contrasena,userDB.role);

    if (await bcrypt.compare(contrasena, user.getConstrasena())) {
      req.session.usuario = {
        id: user.getId(),
        usuario: user.usuario,
        role:user.role
      };
      return res.status(200).json({login:true, message: "usuario logueado" });
    }

    return res.status(409).json({login:false, message: "usuario o contrasena incorrecta" });
  } catch (error) {
    console.log(error);

    return res.status(500).json({login:false, message: "hubo un error", error });
  }
};

export const signUp = async (req, res) => {
  try {
    let { usuario, contrasena } = req.body;
    let userDB = await userRepository.getUser(usuario);
    if (userDB)
      return res.status(409).json({ register:false,message: "el usuario ya existe" });

    let contrasena_hash = await bcrypt.hash(contrasena, 10);
    // console.log(contrasena, contrasena_hash);

    const ok = await userRepository.registrar(usuario, contrasena_hash, 1);
    if (ok) return res.status(201).json({ register:true,message: "usuario registrado" });

    return res.status(500).json({ register:false,message: "no se pudo registrar el usuario" });
  } catch (error) {
    return res.status(500).json({ register:false,message: "hubo un error", error });
  }
};

export const signUpAdmin = async (req, res) => {
  try {
    let { usuario, contrasena } = req.body;
    let userDB = await userRepository.getUser(usuario);
    if (userDB)
      return res.status(409).json({ register:false,message: "el usuario ya existe" });
    let contrasena_hash = await bcrypt.hash(contrasena, 10);
    // console.log(contrasena, contrasena_hash);

    const ok = await userRepository.registrar(usuario, contrasena_hash, 2);
    if (ok) return res.status(201).json({ register:true,message: "usuario registrado" });

    return res.status(500).json({ register:false,message: "no se pudo registrar el usuario" });
  } catch (error) {
    return res.status(500).json({ register:false,message: "hubo un error", error });
  }
};

export const logUot = async (req, res) => {
  try {
    req.session.destroy()
    return res.status(200).json({ logout:true,message: "sesion cerrada" });
  } catch (error) {
    return res.status(500).json({ logout:false,message: "hubo un error", error });
  }
};
