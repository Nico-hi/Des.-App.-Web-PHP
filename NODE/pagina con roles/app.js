import express from "express";
import session from "express-session";
import sessionRoute from "./routes/session.routes.js";
import productosRoute from "./routes/productos.routes.js";

const app = express();
app.use(session({
    secret: "secreto_simple",
    resave: false,
    saveUninitialized: false
}));
app.use(express.json());

app.use(express.static("public"));
app.use("", sessionRoute);
app.use("", productosRoute);

export default app;
