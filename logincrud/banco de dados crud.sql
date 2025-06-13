create database restaurantes;
USE restaurantes;
CREATE TABLE clientes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(100),
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE mesas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    numero INT NOT NULL,
    capacidade INT NOT NULL,
    localizacao VARCHAR(50),
    disponibilidade BOOLEAN DEFAULT TRUE
);
CREATE TABLE reservas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    cliente_id INT,
    mesa_id INT,
    data_reserva DATE NOT NULL,
    hora_reserva TIME NOT NULL,
    quantidade_pessoas INT NOT NULL,
    status VARCHAR(20) DEFAULT 'pendente',
    FOREIGN KEY (cliente_id) REFERENCES clientes(id),
    FOREIGN KEY (mesa_id) REFERENCES mesas(id)
);
alter table clientes add column senha VARCHAR(50) not null;