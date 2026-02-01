create database examen2;
use examen2;

CREATE TABLE usuarios ( 
id INT PRIMARY key auto_increment, 
nombre VARCHAR(50), 
email VARCHAR(100), 
contrasena VARCHAR(255) 
); 
CREATE TABLE incidencias ( 
id INT PRIMARY key auto_increment, 
titulo VARCHAR(100), 
descripcion TEXT, 
estado ENUM('abierta','resuelta'), 
usuario_id INT ); 

INSERT INTO usuarios VALUES 
(1,'Ana','ana@mail.com','1234'), 
(2,'Luis','luis@mail.com','1234'); 
INSERT INTO incidencias(titulo,descripcion,estado,usuario_id) VALUES
('No funciona impresora','Error al imprimir','abierta',1), 
('Pantalla azul','Se reinicia el PC','abierta',2); 


select * from usuarios u ;
select * from incidencias;
