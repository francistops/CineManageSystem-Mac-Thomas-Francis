DROP DATABASE IF EXISTS cinemanage_db;

CREATE DATABASE cinemanage_db
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_general_ci;

USE cinemanage_db;


-- ===========================================================
-- Table : administrateurs
-- ===========================================================

CREATE TABLE IF NOT EXISTS administrateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_utilisateur VARCHAR(50) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL DEFAULT 'admin'
);

-- Données de départ pour les administrateurs
INSERT INTO administrateurs (nom_utilisateur, mot_de_passe, role)
VALUES
    ('admin',   'admin123',   'admin'),
    ('editeur', 'editeur123', 'editor'),
    ('client',  'client123',  'client'); -- mot de passe non sécurisé (démonstration)

-- ===========================================================
-- Table : films
-- ===========================================================

CREATE TABLE IF NOT EXISTS films (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(100) NOT NULL,
    realisateur VARCHAR(100),
    genre VARCHAR(50),
    annee_sortie INT,
    img_url VARCHAR(255) NULL,
    description TEXT
);

-- Données de démonstration pour les films
INSERT INTO films (titre, realisateur, genre, annee_sortie, description)
VALUES
    ('Inception',    'Christopher Nolan', 'Science-Fiction', 2010,
     'Un voleur qui infiltre les rêves des autres pour voler leurs secrets doit accomplir une mission presque impossible.'),
    ('The Godfather','Francis Ford Coppola', 'Drame', 1972,
     'L’histoire épique d’une famille mafieuse italienne à New York.'),
    ('Interstellar', 'Christopher Nolan', 'Science-Fiction', 2014,
     'Une équipe d’explorateurs voyage à travers un trou de ver à la recherche d’un nouveau monde habitable.'),
    ('Parasite',     'Bong Joon-ho', 'Thriller', 2019,
     'Une satire sociale racontant la rencontre entre deux familles issues de milieux opposés.');

-- ===========================================================
-- Table : salles
-- ===========================================================

CREATE TABLE IF NOT EXISTS salles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    capacite INT NOT NULL
);

-- Données de démonstration pour les salles
INSERT INTO salles (nom, capacite)
VALUES
    ('Salle 1', 100),
    ('Salle 2',  80),
    ('Salle 3', 120);

-- ===========================================================
-- Table : programmations
-- ===========================================================

CREATE TABLE IF NOT EXISTS programmations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    administrateur_id INT,
    film_id INT,
    salle_id INT,
    date_debut DATETIME,
    date_fin DATETIME,
    CONSTRAINT fk_prog_admin FOREIGN KEY (administrateur_id) REFERENCES administrateurs(id),
    CONSTRAINT fk_prog_film  FOREIGN KEY (film_id)         REFERENCES films(id),
    CONSTRAINT fk_prog_salle FOREIGN KEY (salle_id)        REFERENCES salles(id)
);

-- Données de démonstration pour les programmations
INSERT INTO programmations (administrateur_id, film_id, salle_id, date_debut, date_fin)
VALUES
((SELECT id FROM administrateurs WHERE nom_utilisateur='admin' LIMIT 1), 1, 1, '2024-07-01 18:00:00', '2024-07-01 20:30:00'),
((SELECT id FROM administrateurs WHERE nom_utilisateur='editeur' LIMIT 1), 2, 2, '2024-07-02 19:00:00', '2024-07-02 21:15:00'),
((SELECT id FROM administrateurs WHERE nom_utilisateur='admin' LIMIT 1), 3, 3, '2024-07-03 20:00:00', '2024-07-03 22:45:00');


-- ===========================================================
--  Fin du script
-- ===========================================================
