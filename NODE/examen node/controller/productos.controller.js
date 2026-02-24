import productoRepo from "./../repository/producto.repository.js";

export const productosDB = (req, res) => {
  productoRepo
    .getProductos()
    .then((productos) => res.json({ productos }))
    .catch((error) => {
      console.log(error);
      res.status(500).json({ error: "Internal server error" });
    });
};

export const productoNuevo = (req, res) => {
  const { nombre, precio, descripcion } = req.body;
  console.log(nombre, precio, descripcion);

  if (!nombre || precio == null)
    return res.status(400).json({ error: "nombre y precio obligatorios" });
  productoRepo
    .saveProducto(nombre, precio, descripcion || "")
    .then((result) => {
      if (result > 0) {
        return res.json({ register: true, message: "producto registrado" });
      }
      return res
        .status(500)
        .json({ register: false, message: "no se pudo registrar" });
    })
    .catch((error) => {
      console.log(error);
      res.status(500).json({ error: "Internal server error" });
    });
};

export const productoNombre = (req, res) => {
  const nombre = req.params.nombre || "";
  productoRepo
    .getProducto(nombre)
    .then((producto) => {
      if (!producto)
        return res.status(404).json({ error: "producto no encontrado" });
      return res.json(producto);
    })
    .catch((error) => {
      console.log(error);
      res.status(500).json({ error: "Internal server error" });
    });
};
