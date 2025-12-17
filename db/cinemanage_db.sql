DROP DATABASE IF EXISTS cinemanage_db;
CREATE DATABASE IF NOT EXISTS cinemanage_db;
USE cinemanage_db;

CREATE TABLE IF NOT EXISTS administrateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_utilisateur VARCHAR(50) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    role VARCHAR(20) DEFAULT 'admin'
);

CREATE TABLE IF NOT EXISTS films (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,
    realisateur VARCHAR(100),
    genre VARCHAR(50),
    annee_sortie INT,
    img_url VARCHAR(255),
    description TEXT
);

CREATE Table if NOT EXISTS salles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    capacite INT NOT NULL
);

 CREATE TABLE if NOT EXISTS programmations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    administrateur_id INT,
    FOREIGN KEY (administrateur_id) REFERENCES administrateurs(id),
    film_id INT,
    FOREIGN KEY (film_id) REFERENCES films(id),
    salle_id INT,
    FOREIGN KEY (salle_id) REFERENCES salles(id),
    date_debut DATETIME,
    date_fin DATETIME
);

INSERT INTO administrateurs (nom_utilisateur, mot_de_passe, role)
VALUES
('admin', 'admin123', 'admin'),
('editeur', 'editeur123', 'editor'),
('client', 'client123', 'client'); -- mot de passe(non sécurisé)

INSERT INTO films (titre, realisateur, genre, annee_sortie, description)
VALUES
('Inception', 'Christopher Nolan', 'Science-Fiction', 2010, 'Un voleur qui infiltre les rêves des autres pour voler leurs secrets doit accomplir une mission presque impossible.'),
('The Godfather', 'Francis Ford Coppola', 'Drame', 1972, 'L’histoire épique d’une famille mafieuse italienne à New York.'),
('Interstellar', 'Christopher Nolan', 'Science-Fiction', 2014, 'Une équipe d’explorateurs voyage à travers un trou de ver à la recherche d’un nouveau monde habitable.'),
('Parasite', 'Bong Joon-ho', 'Thriller', 2019, 'Une satire sociale racontant la rencontre entre deux familles issues de milieux opposés.');
 
INSERT INTO salles (nom, capacite, film_id)
VALUES
('Salle 1', 100, 1),
('Salle 2', 80, 2),
('Salle 3', 120, 3);

INSERT INTO programmations (administrateur_id, film_id, salle_id, date_debut, date_fin)
VALUES
(1, 1, 1, '2024-07-01 18:00:00', '2024-07-01 20:30:00'),
(2, 2, 2, '2024-07-02 19:00:00', '2024-07-02 21:15:00'),
(3, 3, 3, '2024-07-03 20:00:00', '2024-07-03 22:45:00');
