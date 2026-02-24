import express from "express";
import session from "express-session";
import sessionRoutes from "./routes/session.routes.js";
import productoRoutes from "./routes/producto.routes.js";
import climaRoutes from "./routes/clima.routes.js";
import dotenv from "dotenv";
dotenv.config();
const app = express();
app.use(express.json());
app.use(
  session({
    secret: "secreto_simple",
    resave: false,
    saveUninitialized: false,
  }),
);
app.use(express.static("public"));
app.use("/", sessionRoutes); // ya funciona
app.use("/", productoRoutes);
app.use("/clima", climaRoutes);

export default app;
