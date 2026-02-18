create database biblioteca_prueba;

use biblioteca_prueba;

create table
    usuario (
        id int auto_increment primary key,
        usuario varchar(50) unique not null,
        constrasena varchar(255) not null,
        role varchar(10)
    );