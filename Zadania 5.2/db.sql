CREATE DATABASE mojaBaza;

USE mojaBaza;

CREATE TABLE samochody (
                           id INT AUTO_INCREMENT PRIMARY KEY,
                           marka VARCHAR(255) NOT NULL,
                           model VARCHAR(255) NOT NULL,
                           cena FLOAT NOT NULL,
                           rok INT NOT NULL,
                           opis TEXT
);
