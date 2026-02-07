//modulo que instalamos para generación de hash
const bcrypt = require("bcrypt");
const UsuarioDAO = require("../dao/UsuarioDAO");

// Registro
exports.registro = async (req, res) => {
    const { usuario, password } = req.body;

    try {
        //generamos el hash a partir del password
        const hash = await bcrypt.hash(password, 10);
        //pedimos al DAO que inserte el usuario con su hash, no con la contraseña
        await UsuarioDAO.crear(usuario, hash);
        res.json({ mensaje: "Usuario registrado" });
    } catch (error) {
        //si ha fallado la sql porque ya existía ese usuario damos fallo distinto a un fallo técnico
        if (error.code === "ER_DUP_ENTRY") {
            res.json({ ok: false, mensaje: "El usuario ya existe" });
        } else {
            res.status(500).json({ ok: false, mensaje: "Error interno" });
        }
    }
};

// Login
exports.login = async (req, res) => {
    const { usuario, password } = req.body;

    try {
        const user = await UsuarioDAO.buscarPorUsuario(usuario);

        //si no nos devuelve nada la búsqueda, devolvemos error
        if (!user) {
            return res.json({ ok: false });
        }

        //y si nos devuelve una fila, pero el hash guardado no es de esa contraseña que acabamos de meter,
        //es que las contraseñas no eran la misma, por lo tanto también devolvemos error
        const correcto = await bcrypt.compare(password, user.password);
        if (!correcto) {
            return res.json({ ok: false });
        }

        // AQUÍ se informa quién es el usuario. PASO MÁS IMPORTANTE, EQUIVALENTE A LO QUE HACÍAMOS
        // CON $_SESSION EN PHP. Metemos los datos que queramos recuperar en req.session cada vez que iniciemos sesión
        req.session.usuario = {
            id: user.id,
            usuario: user.usuario
        };

        res.json({ ok: true });

    } catch (error) {
        res.status(500).json({ error: "Error en login" });
    }
};

// Logout
exports.logout = (req, res) => {
    //destruímos los datos de la sesión y volvemos
    req.session.destroy(() => {
        res.json({ mensaje: "Logout correcto" });
    });
};
