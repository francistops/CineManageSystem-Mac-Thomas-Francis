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