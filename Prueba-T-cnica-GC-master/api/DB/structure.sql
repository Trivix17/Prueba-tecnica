CREATE DATABASE prueba_tecnica;
USE prueba_tecnica;

CREATE TABLE comments(
	id INT AUTO_INCREMENT PRIMARY KEY,
    comment LONGTEXT NOT NULL,
    idMovie INT NOT NULL
);