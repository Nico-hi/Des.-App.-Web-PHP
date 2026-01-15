create database pre_examen;
use pre_examen;

CREATE TABLE usuarios (
 id INT PRIMARY KEY auto_increment,
 nombre VARCHAR(50) unique,
 password VARCHAR(255)
);
CREATE TABLE libros (
 id INT AUTO_INCREMENT PRIMARY KEY,
 titulo VARCHAR(100),
 autor VARCHAR(100)
);
CREATE TABLE favoritos (
 usuario_id INT,
 libro_id INT,
 foreign key (usuario_id) references usuarios(id),
 foreign key (libro_id) references libros(id),
 PRIMARY KEY (usuario_id, libro_id)
);


INSERT INTO usuarios VALUES
(1,'Ana','1234'),
(2,'Luis','1234');
INSERT INTO libros VALUES
(1,'1984','George Orwell'),
(2,'El Quijote','Miguel de Cervantes'),
(3,'Cien años de soledad','Gabriel García Márquez'),
(4,'La sombra del viento','Carlos Ruiz Zafón');

select * from usuarios u ;

select * from libros;
select * from favoritos;


select * from libros l where l.id in ( select f.libro_id  from favoritos f where f.usuario_id = 1);
