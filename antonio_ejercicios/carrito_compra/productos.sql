create database productos;
use productos;


CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL  auto_increment primary key,
  `usuario` varchar(30) NOT NULL,
  `contrasena` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `productos` (
  `id` int(11) NOT NULL auto_increment primary key,
  `nombre` varchar(100) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `cantidad_stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `carrito` (
  `id` int(11) NOT NULL auto_increment primary key ,
  `usuario` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
    CONSTRAINT fk_carrito_usuario
    FOREIGN KEY (usuario) REFERENCES usuarios(id),
  CONSTRAINT fk_carrito_producto
    FOREIGN KEY (producto_id) REFERENCES productos(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `productos` (`id`, `nombre`, `categoria`, `precio`, `cantidad_stock`) VALUES
(1, 'Teléfono móvil', 'Electrónica', 499.99, 50),
(2, 'Televisor LED', 'Electrónica', 799.99, 30),
(3, 'Laptop', 'Electrónica', 1099.99, 20),
(4, 'Tablet', 'Electrónica', 299.99, 40),
(5, 'Camiseta', 'Ropa', 19.99, 100),
(6, 'Pantalón vaquero', 'Ropa', 39.99, 80),
(7, 'Zapatos deportivos', 'Ropa', 59.99, 60),
(8, 'Vestido de fiesta', 'Ropa', 129.99, 40),
(9, 'Sofá', 'Hogar', 799.99, 10),
(10, 'Mesa de comedor', 'Hogar', 399.99, 20),
(11, 'Lámpara de pie', 'Hogar', 69.99, 30),
(12, 'Cocina eléctrica', 'Hogar', 299.99, 15),
(13, 'Aire acondicionado', 'Electrónica', 899.99, 8),
(14, 'Chaqueta de cuero', 'Ropa', 149.99, 25),
(15, 'Pijama de algodón', 'Ropa', 29.99, 50),
(16, 'Alfombra', 'Hogar', 49.99, 40),
(17, 'Cortinas', 'Hogar', 29.99, 60),
(18, 'Toallas de baño', 'Hogar', 9.99, 100),
(19, 'Cámara digital', 'Electrónica', 399.99, 25),
(20, 'Altavoces Bluetooth', 'Electrónica', 79.99, 50),
(21, 'hola como estas espero que muy bien ', NULL, 100000.00, NULL),
(22, '1', NULL, 1.00, NULL),
(23, '1', NULL, 1.00, NULL),
(24, '1', NULL, 1.00, NULL);




select * from productos;
select * from usuarios;
