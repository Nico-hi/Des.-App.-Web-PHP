const express = require("express");
const app = express();

app.use(express.urlencoded({ extended: true }));
app.use(express.json());

app.use(express.static("public"));

const productosRoutes = require("./routes/productosRoutes");
app.use("/productos", productosRoutes);

app.listen(3001, () => {
    console.log("Servidor escuchando en http://localhost:3001");
});
