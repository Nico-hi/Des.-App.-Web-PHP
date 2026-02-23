create database biblioteca_prueba;

use biblioteca_prueba;

create table
    usuario (
        id int auto_increment primary key,
        usuario varchar(50) unique not null,
        contrasena varchar(255) not null,
        role varchar(10)
    );
    

CREATE TABLE libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL
);


INSERT INTO libros (titulo, autor) VALUES
('Cien años de soledad', 'Gabriel García Márquez'),
('Don Quijote de la Mancha', 'Miguel de Cervantes'),
('El señor de los anillos', 'J.R.R. Tolkien'),
('1984', 'George Orwell'),
('Un mundo feliz', 'Aldous Huxley'),
('Orgullo y prejuicio', 'Jane Austen'),
('Crimen y castigo', 'Fiódor Dostoyevski'),
('Rayuela', 'Julio Cortázar'),
('Pedro Páramo', 'Juan Rulfo'),
('Ficciones', 'Jorge Luis Borges'),
('Matar a un ruiseñor', 'Harper Lee'),
('La odisea', 'Homero'),
('Los miserables', 'Victor Hugo'),
('En busca del tiempo perdido', 'Marcel Proust'),
('Ulises', 'James Joyce'),
('El gran Gatsby', 'F. Scott Fitzgerald'),
('Moby-Dick', 'Herman Melville'),
('Hamlet', 'William Shakespeare'),
('Guerra y paz', 'León Tolstói'),
('El principito', 'Antoine de Saint-Exupéry'),
('La metamorfosis', 'Franz Kafka'),
('El extranjero', 'Albert Camus'),
('Cumbres borrascosas', 'Emily Brontë'),
('Frankenstein', 'Mary Shelley'),
('Drácula', 'Bram Stoker'),
('La sombra del viento', 'Carlos Ruiz Zafón'),
('El alquimista', 'Paulo Coelho'),
('Fahrenheit 451', 'Ray Bradbury'),
('Crónica de una muerte anunciada', 'Gabriel García Márquez'),
('El nombre de la rosa', 'Umberto Eco'),
('La casa de los espíritus', 'Isabel Allende'),
('El retrato de Dorian Gray', 'Oscar Wilde'),
('El Aleph', 'Jorge Luis Borges'),
('La ciudad y los perros', 'Mario Vargas Llosa'),
('Niebla', 'Miguel de Unamuno'),
('El túnel', 'Ernesto Sabato'),
('Ensayo sobre la ceguera', 'José Saramago'),
('Los detectives salvajes', 'Roberto Bolaño'),
('2666', 'Roberto Bolaño'),
('A sangre fría', 'Truman Capote'),
('El guardián entre el centeno', 'J.D. Salinger'),
('Alicia en el país de las maravillas', 'Lewis Carroll'),
('Jane Eyre', 'Charlotte Brontë'),
('El lobo estepario', 'Hermann Hesse'),
('Siddhartha', 'Hermann Hesse'),
('Anna Karenina', 'León Tolstói'),
('El amor en los tiempos del cólera', 'Gabriel García Márquez'),
('La divina comedia', 'Dante Alighieri'),
('Las mil y una noches', 'Anónimo'),
('Don Juan Tenorio', 'José Zorrilla');


    
    SELECT * from usuario;
    SELECT * from libros;