DROP DATABASE IF EXISTS trabalho1quartobi;
CREATE DATABASE trabalho1quartobi;

USE trabalho1quartobi;

CREATE TABLE petshop (
        id_petshop INTEGER PRIMARY KEY AUTO_INCREMENT,
        name_pet VARCHAR(255),
        type_service ENUM('banho','tosa')
);

INSERT INTO petshop (name_pet,type_service) VALUES
('pastorbelga', 'tosa'),
('buterrier','banho'),
('Pinther','banho');