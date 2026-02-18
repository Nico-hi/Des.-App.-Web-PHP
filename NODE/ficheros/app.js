const express = require("express");
const app = express();

app.use(express.json());
app.use(express.urlencoded({ extended: true }));

app.use(express.static("public"));

const archivosRoutes = require("./routes/archivosRoutes");
app.use("/archivos", archivosRoutes);

app.listen(3000, () => {
    console.log("Servidor escuchando en http://localhost:3000");
});
