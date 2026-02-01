import bcrypt from "bcrypt";
import UserRespo from "./../repository/user.repository.js";
import User from "./../model/user.model.js";

export const signIn = async (req, res) => {
  // console.log(req.body);

  let { usuario, contrasena } = req.body;
  // console.log(usuario, contrasena);

  let user = await UserRespo.getUser(usuario);
  if (!user)
    return res.status(404).json({
      login: false,
      message: "user not found",
    });

  // console.log("user BBDD => ", user);

  let userSign = new User(user.id, user.usuario, user.contrasena);

  //verificamos la contrasena

  // console.log(bcrypt.compare(contrasena, userSign.getContrasena()));

  if (await bcrypt.compare(contrasena, userSign.getContrasena())) {
    req.session.usuario = {
      id: userSign.getId(),
    };
    // console.log(userSign.getId());
    req.session.save((err) => {
      if (err) {
        console.error("Error saving session:", err);
        return res.status(500).json({ login: false, message: "Error sesión" });
      }
      return res.status(200).json({
        login: true,
        message: "user logued",
      });
    });
  } else {
    return res.status(200).json({
      login: false,
      message: "user or password wrong",
    });
  }
};

export const signUp = async (req, res) => {
  // console.log(req.body);

  let { usuario, contrasena } = req.body;
  // console.log(usuario, contrasena);

  if (await UserRespo.getUser(usuario))
    return res.status(409).json({
      register: false,
      message: "user already exists",
    });

  let password_hash = await bcrypt.hash(contrasena, 10);
  // console.log(password_hash);

  if (await UserRespo.createUser(usuario, password_hash)) {
    return res.status(200).json({
      register: true,
      message: "user registered",
    });
  }
  return res.status(500).json({
    register: true,
    message: "user not was registered",
  });
};

export const logOut = async (req, res) => {
  req.session.destroy((err) => {
    if (err) {
      console.error("Error al destruir sesión:", err);
      return res.status(500).json({ log_out: false, message: "Error logout" });
    }
  });
  return res
    .status(200)
    .json({ log_out: true, message: "logout successfully" });
};
