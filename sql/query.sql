DROP DATABASE IF EXISTS car;
CREATE DATABASE car;

USE car;

DROP TABLE IF EXISTS vendas;
DROP TABLE IF EXISTS compradores;
DROP TABLE IF EXISTS vendedores;
DROP TABLE IF EXISTS car;

CREATE TABLE car (
    id_car INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    namecar VARCHAR(255) NOT NULL,
    modelo VARCHAR(255) NOT NULL,
    ano VARCHAR(4) NOT NULL
    
);

INSERT INTO car (namecar,modelo,ano) VALUES 
('gol','volkswagen',1998),
('chevet','chevrolet',1995),
('opala','chevrolet',1989),
('civic','honda',2021);



CREATE TABLE vendedores (
    id_vendedor INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nameVend       VARCHAR(255) NOT NULL,
    SobrenomeVend  VARCHAR(255) NOT NULL
);

INSERT INTO vendedores (nameVend,sobrenomeVend) VALUES
('Pedro','da Silva'),
('Joao','de Lima');



CREATE TABLE compradores (
    id_comprador   INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nameComprador     VARCHAR(255) NOT NULL,
    sobrenomeComprador  VARCHAR(255) NOT NULL 
);

INSERT INTO compradores (nameComprador, sobrenomeComprador) VALUES
('Rafael','da Silva'),
('Jorge','de Lima');



CREATE TABLE vendas (
    id_vendas INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_vendedor INTEGER,
    FOREIGN KEY (id_vendedor) REFERENCES vendedores(id_vendedor),
    id_comprador INTEGER,
    FOREIGN KEY (id_comprador) REFERENCES compradores(id_comprador),
    id_car INTEGER,
    FOREIGN KEY (id_car) REFERENCES car(id_car)
);

INSERT INTO vendas (id_vendedor,id_comprador,id_car) VALUES
(1,1,1),
(1,2,2),
(2,1,3),
(1,2,4);