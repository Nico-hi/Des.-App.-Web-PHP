create database curso_matricula;
use curso_matricula;

create table usuarios(
id int auto_increment primary key,
usuario varchar(50) not null unique,
contrasena varchar(255) not null
);

create table cursos(
id int auto_increment primary key,
curso varchar(100) unique not null,
descripcion text
);

create table matriculas(
usuario_id int,
curso_id int,
foreign key (usuario_id) references usuarios(id),
foreign key (curso_id) references cursos(id),
primary key( usuario_id, curso_id)
);

-- cursos de ejemplo
INSERT INTO cursos (curso, descripcion) VALUES
('Introducción a la Programación', 'Curso básico para aprender los fundamentos de la programación.'),
('Desarrollo Web con HTML y CSS', 'Aprende a crear páginas web estáticas usando HTML y CSS.'),
('JavaScript para Principiantes', 'Curso para entender la programación en JavaScript y crear interactividad en páginas web.'),
('Bases de Datos SQL', 'Aprende a diseñar y consultar bases de datos relacionales con SQL.'),
('Python para Ciencia de Datos', 'Introducción al uso de Python para análisis y visualización de datos.'),
('Machine Learning Básico', 'Conceptos fundamentales y técnicas básicas de aprendizaje automático.'),
('Desarrollo de Aplicaciones Móviles', 'Curso para crear aplicaciones móviles para Android e iOS.'),
('Seguridad Informática', 'Principios y prácticas para proteger sistemas y datos.'),
('Diseño UX/UI', 'Fundamentos del diseño centrado en el usuario para aplicaciones y sitios web.'),
('Marketing Digital', 'Estrategias y herramientas para promocionar productos y servicios en línea.'),
('Administración de Sistemas Linux', 'Gestión y configuración de servidores y sistemas Linux.'),
('Programación Orientada a Objetos con Java', 'Aprende a programar usando el paradigma orientado a objetos en Java.'),
('Desarrollo Backend con Node.js', 'Creación de servidores y APIs usando Node.js y Express.'),
('Introducción a la Inteligencia Artificial', 'Conceptos básicos y aplicaciones de la inteligencia artificial.'),
('Análisis de Datos con Excel', 'Uso avanzado de Excel para análisis y visualización de datos.'),
('Cloud Computing con AWS', 'Fundamentos y servicios principales de Amazon Web Services.'),
('Gestión de Proyectos con Scrum', 'Metodologías ágiles para la gestión eficiente de proyectos.'),
('Programación en C++', 'Curso para aprender programación en C++ desde cero.'),
('Big Data y Hadoop', 'Introducción al manejo y procesamiento de grandes volúmenes de datos.'),
('Desarrollo de Videojuegos con Unity', 'Creación de videojuegos 2D y 3D usando el motor Unity.');


select * from usuarios;
select * from cursos where 1;
select * from matriculas;