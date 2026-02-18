const express = require("express");
require("dotenv").config();

const app = express();

app.use(express.urlencoded({ extended: true }));
app.use(express.json());
app.use(express.static("public"));

const climaRoutes = require("./routes/climaRoutes");
app.use("/clima", climaRoutes);

app.listen(3000, () => {
    console.log("Servidor escuchando en http://localhost:3000");
});
