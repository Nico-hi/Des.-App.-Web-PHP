const express = require("express");
const app = express();

app.use(express.urlencoded({ extended: true }));
app.use(express.json());
app.use(express.static("public"));

const pokemonRoutes = require("./routes/pokemonRoutes");
app.use("/pokemons", pokemonRoutes);

app.listen(3000, () => {
    console.log("Servidor escuchando en http://localhost:3000");
});
