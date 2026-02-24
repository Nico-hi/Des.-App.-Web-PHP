-- create database examen_node;
-- use examen_node;

create table
    usuario (
        id int auto_increment primary key,
        usuario varchar(50) unique not null,
        contrasena varchar(255) not null,
        role varchar(10)
    );

create table
    if not exists productos (
        id int auto_increment primary key,
        nombre varchar(100) not null,
        precio decimal(10, 2) default 0.00,
        descripcion text,
        created_at timestamp default current_timestamp
    );

create table
    if not exists climas (
        id int auto_increment primary key,
        nombre varchar(100) not null,
        temperatura varchar(50),
        descripcion varchar(255),
        created_at timestamp default current_timestamp
    );

INSERT INTO productos (nombre, precio, descripcion) VALUES
('iPhone 15 Pro', 1199.00, 'Smartphone Apple última generación, titanio, 256GB'),
('MacBook Air M3', 1299.00, 'Portátil Apple 13.6 pulgadas, 16GB RAM, 512GB SSD'),
('Samsung Galaxy S25', 999.00, 'Smartphone Android premium, cámara 200MP, 12GB RAM'),
('Nike Air Max 90', 139.90, 'Zapatillas deportivas clásicas, color blanco/negro'),
('Cafetera Nespresso Vertuo', 179.00, 'Cafetera de cápsulas con tecnología Centrifusion'),
('Auriculares Sony WH-1000XM5', 399.00, 'Cancelación de ruido líder, 30h batería'),
('Televisor LG OLED 55"', 1499.00, 'Pantalla OLED 4K, Dolby Vision, webOS'),
('Mancuerna 10kg', 45.00, 'Mancuerna profesional para entrenamiento'),
('Colchón viscoelástico 90x190', 299.00, 'Colchón de 25cm grosor, firmeza media'),
('Mascarilla FFP2 50ud', 19.95, 'Pack 50 unidades homologadas, 3 capas'),
('Leche entera 2L', 1.49, 'Leche pasteurizada fresca de vaca'),
('Pan de molde 750g', 1.79, 'Pan de molde integral sin corteza'),
('Cerveza Mahou 24x33cl', 19.90, 'Pack 24 latas cerveza clásica Mahou'),
('Vino Rioja Crianza', 8.95, 'Botella 75cl, 12 meses en barrica'),
('Jabón Dove 4x100g', 3.95, 'Pack 4 pastillas crema hidratante'),
('Dentífrico Colgate Total', 4.50, 'Tubos 125ml protección 24h'),
('Shampoo Pantene Pro-V', 3.25, 'Botella 300ml reparación profunda'),
('Servilletas 12 rollos', 2.99, 'Servilletas blancas 3 capas, 100h/rollo'),
('Bombilla LED E27 10W', 5.95, 'Pack 4 unidades luz cálida 800 lúmenes'),
('Baterías AA 8ud', 4.25, 'Pack recargables NiMH 2000mAh');


select * from usuario;
select * from productos;
select * from climas;