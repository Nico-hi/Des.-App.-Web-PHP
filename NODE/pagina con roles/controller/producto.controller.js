import Producto from "../model/producto.model.js";
import productoRepository from "../repository/producto.repository.js";

export const crear = async (req, res) => {
  try {
    let { nombre, categoria, precio, stock } = req.body;
    console.log(nombre, categoria, precio, stock);
     
    let ok = await productoRepository.crear(nombre, categoria, precio, stock);
    if (ok) return res.status(201).json({ created: true,message: " se creo el producto"  });
    return res.status(500).json({ created: false, message: "no se pudo crear el producto" });
  } catch (error) {
    console.log(error);
    
    return res.status(500).json({ message: "hubo un error", error });
  }
};

export const borrar = async (req, res) => {
  try {
    let { id } = req.params;
    let ok = await productoRepository.borrar(id);
    if (ok)
      return res
        .status(201)
        .json({ register: true, message: "producto eliminado" });

    return res
      .status(500)
      .json({ register: false, message: "no se pudo eliminar el producto" });
  } catch (error) {
    return res
      .status(500)
      .json({ register: false, message: "hubo un error", error });
  }
};

export const productos = async (req, res) => {
  try {
    let productos = await productoRepository.getProductos();
    if (productos) {
      const lista = productos.map((p) => {
        const prod = new Producto(
          p.id,
          p.nombre,
          p.categoria,
          p.precio,
          p.cantidad_stock
        );
        return {
          id: prod.getId(),
          nombre: prod.nombre,
          categoria: prod.categoria,
          precio: prod.precio,
          cantidad_stock: prod.cantidad_stock,
        };
      });
      return res.status(200).json(lista);
    }

    return res.status(404).json({ register: false, message: "productos no encontrados" });
  } catch (error) {
    return res
      .status(500)
      .json({ register: false, message: "hubo un error", error });
  }
};

export const producto = async (req, res) => {
  try {
    let { id } = req.params;    
    let producto = await productoRepository.getProducto(id);
    if (producto) {
      const prod = new Producto(
        producto.id,
        producto.nombre,
        producto.categoria,
        producto.precio,
        producto.cantidad_stock
      );
      return res.status(200).json({
        id: prod.getId(),
        nombre: prod.nombre,
        categoria: prod.categoria,
        precio: prod.precio,
        cantidad_stock: prod.cantidad_stock,
      });
    }
    return res.status(404).json({ message: "producto no encontrado" });
  } catch (error) {

    return res
      .status(500)
      .json({ logout: false, message: "hubo un error", error });
  }
};
