import express from "express";
import routerSession from "./routes/session.routes.js";
import routesIncidencias from './routes/incidencias.routes.js'
import session from "express-session";
let app = express();
// con esto nos permite leer cosas del body por ser json
app.use(express.json());

// esto nos sirve para leer los formularios que enviamos, pero de la forma rudimentaria
// app.use(express.urlencoded({ extended: true }));

// con esto hacemos que express use su conponente de sesion con un secreto,
app.use(
  session({
    secret: "secreto_simple",
    resave: false,
    saveUninitialized: false,
  }),
);

app.use(express.static("public"));


app.use("/", routerSession);
app.use("/", routesIncidencias);

app.listen(3000, () => {
  console.log("el servidor esta funcionando en el puerto 3000");
});
