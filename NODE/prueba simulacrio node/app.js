import express from "express";
import session from "express-session";
import sessionRoutes from "./routes/session.routes.js";
import librosRoutes from "./routes/libro.routes.js";
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
app.use("/", sessionRoutes);
app.use("/libro", librosRoutes);

export default app;
