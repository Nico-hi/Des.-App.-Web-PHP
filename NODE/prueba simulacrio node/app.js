import express from "express";
import session from "express-session";
import sessionRouters from "./routes/session.routes.js";
let app = express();
app.use(express.json());
app.use(
  session({
    secret: "secreto_simple",
    resave: false,
    saveUninitialized: false,
  }),
);
app.use(express.static("public"));
app.use("/", sessionRouters);

export default app;
