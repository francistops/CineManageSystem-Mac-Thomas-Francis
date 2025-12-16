CREATE Table if NOT EXISTS salles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    capacite INT NOT NULL,
    FOREIGN KEY (film_id) REFERENCES films(id)
);