import app from "./app.js";

const port = 3000;
app.listen(port, () => {
  console.log(`el servidor esta en http://localhost:${port}/`);
});
