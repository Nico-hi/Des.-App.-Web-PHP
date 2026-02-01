const express = require("express");

//Importamos el módulo que sabe crear y gestionar sesiones en Express
const session = require("express-session");

const app = express();

app.use(express.urlencoded({ extended: true }));
app.use(express.json());

// Configuración de sesiones: express-session permite que el servidor recuerde al usuario
// entre peticiones HTTP usando una cookie de sesión. El "secret" se usa para firmar la
// cookie y evitar manipulaciones. resave:false evita guardar la sesión si no cambia, y
// saveUninitialized:false impide crear sesiones vacías hasta que se guarda información
// (por ejemplo, al hacer login con req.session.usuario).
app.use(session({
    secret: "secreto_simple",
    resave: false,
    saveUninitialized: false
}));

app.use(express.static("public"));

// Rutas
const productosRoutes = require("./routes/productosRoutes");

//indicamos fichero donde están las rutas para los casos de uso de autenticación
const authRoutes = require("./routes/authRoutes");

app.use("/productos", productosRoutes);
//colgamos de la raíz las rutas que tienen que ver con autenticación (podríamos haberlas 
// puesto como /auth o como las quisiéramos llamar)
app.use("/", authRoutes);

app.listen(3000, () => {
    console.log("Servidor escuchando en http://localhost:3000");
});
