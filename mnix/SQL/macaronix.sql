CREATE DATABASE IF NOT EXISTS macaronix;
USE macaronix;

CREATE TABLE users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE,
    phone_number VARCHAR(32) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('client', 'admin') DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE categories (
    id_category INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO categories (name) VALUES
('Entrée'),
('Plat Principal'),
('Boisson'),
('Dessert');

CREATE TABLE products (
    id_product INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    ingredients TEXT,
    prix DECIMAL(10, 2) NOT NULL,
    id_category INT,
    available BOOLEAN DEFAULT TRUE,
    image_path VARCHAR(255) DEFAULT NULL,
    FOREIGN KEY (id_category) REFERENCES categories(id_category)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE orders (
    id_commande INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    client_first_name VARCHAR(60) NOT NULL,
    client_last_name VARCHAR(60) NOT NULL,
    client_adresse varchar(255) DEFAULT NULL,
    client_email VARCHAR(150) NOT NULL,
    client_phone VARCHAR(32) NOT NULL,
    date_order DATETIME DEFAULT CURRENT_TIMESTAMP,
    status TINYINT DEFAULT 0,
    allergies TEXT,
    type_commande ENUM('livraison','à emporter') NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
 

CREATE TABLE order_items (
    id_commande INT,
    id_product INT,
    quantity INT,
    PRIMARY KEY (id_commande, id_product),
    FOREIGN KEY (id_commande) REFERENCES orders(id_commande) ON DELETE CASCADE,
    FOREIGN KEY (id_product) REFERENCES products(id_product) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
 

CREATE TABLE evaluations (

  id_eval int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  author varchar(100) NOT NULL,
  note INT CHECK (note BETWEEN 1 AND 5),
  comment text DEFAULT NULL,
  date_creation date DEFAULT curdate(),
  status tinyint(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO products (name, ingredients, prix, id_category, available, image_path) VALUES
('Bruschetta', 'Pain grillé, tomates, basilic, ail, huile d’olive', 8.50, 1, TRUE, 'uploads/3d34ba23-dfc8-4e12-bc31-29e169ebb17a.png'),
('Carpaccio de bœuf', 'Bœuf cru, parmesan, roquette, citron', 12.00, 1, TRUE, 'uploads/b72f1384-5034-4e3b-82a6-ef52736d9fb3.jpg'),
('Antipasti végétarien', 'Assortiment de légumes grillés et mozzarella', 13.50, 1, TRUE, 'uploads/6c11f0e8-500e-4c64-b8c9-b987b6b39920.jpg'),
('Focaccia aux herbes', 'Pain moelleux à l’huile d’olive, romarin, sel de mer', 7.50, 1, TRUE, 'uploads/edf77004-8596-42dc-9946-03ed3325e8db.jpg'),
('Salade Caprese', 'Tomates, mozzarella di bufala, basilic, huile d’olive', 10.50, 1, TRUE, 'uploads/c9eff8bc-cfb3-417b-a37b-9b3e23b86acb.jpg'),
('Arancini', 'Boulettes de riz au fromage, panées et frites', 10.50, 1, TRUE, 'uploads/95461492-043b-43e9-833b-cf0d453f52eb.jpg'),
('Spaghetti alla Carbonara', 'Spaghetti, œuf, champignons, parmesan, poivre noir', 15.50, 2, TRUE, 'uploads/21705819-5def-4bc2-8fbd-574d7ecddabc.jpg'),
('Penne all’Arrabbiata', 'Penne, sauce tomate épicée, ail, piment', 14.50, 2, TRUE, 'uploads/13f39201-f61d-4043-8d3f-6fb512993ce6.jpg'),
('Tagliatelle al Pesto', 'Tagliatelle, pesto maison, parmesan', 16.50, 2, TRUE, 'uploads/608eab1d-52c8-4ed4-b6e0-102a1f39f39e.jpg'),
('Lasagne végétarienne', 'Pâtes en couches, légumes, sauce tomate, béchamel', 17.50, 2, TRUE, 'uploads/dbd198ca-9716-43e9-85c3-bb678743298c.jpeg'),
('Gnocchi al Gorgonzola', 'Gnocchis, sauce au gorgonzola, noix', 16.50, 2, TRUE, 'uploads/982efb42-1ebd-48c7-aed4-59f3afb427ac.jpg'),
('Ravioli ricotta e spinaci', 'Raviolis farcis ricotta-épinards, beurre de sauge', 17.50, 2, TRUE, 'uploads/0fc800d5-64e5-4815-a7a3-f65647051b68.jpg'),
('Linguine alle vongole', 'Linguine, palourdes, ail, vin blanc sans alcool, persil', 19.50, 2, TRUE, 'uploads/6a29e7fe-5887-490d-93f8-c10b9ea15cce.jpg'),
('Orecchiette al pomodoro e basilico', 'Petites pâtes en forme d’oreille, sauce tomate fraîche, basilic', 14.50, 2, TRUE, 'uploads/2fdb5b93-50d3-4ecb-9c28-8cc947826c87.jpg'),
('Maccheroni alla Mamia', 'Maccheroni, viande hachée, sauce tomate crémeuse, oignons', 18.00, 2, TRUE, 'uploads/0b0b6862-2274-4c59-ac38-e40a8e197690.jpg'),
('Canada Dry', 'Boisson gazeuse', 3.50, 3, TRUE, 'uploads/1d48717f-d9c1-4c1f-80c7-cb68f1e83208.png'),
('Eau pétillante San Pellegrino', 'Eau minérale gazeuse', 3.50, 3, TRUE, 'uploads/a873247a-3684-4e9c-875b-d7f7dc76126c.jpg'),
('Espresso', 'Café italien serré', 3.50, 3, TRUE, 'uploads/b404441f-62a0-4791-a5d0-a5965c9697a0.jpg'),
('Limonata San Pellegrino', 'Boisson au citron pétillante', 3.50, 3, TRUE, 'uploads/8ab5f8de-8b51-4738-b6ff-51900d363c4d.png'),
('Thé glacé pêche', 'Thé noir froid, arôme pêche', 3.50, 3, TRUE, 'uploads/9353bdec-c155-4c35-986f-d7c0a91bc93b.png'),
('Cappuccino', 'Café, lait mousseux', 4.50, 3, TRUE, 'uploads/1150b9f1-dc3d-434d-a254-34133d027bbe.jpeg'),
('Tiramisu', 'Mascarpone, café, biscuits, cacao', 7.50, 4, TRUE, 'uploads/d48c6006-5cab-4d94-9a17-21c353da9501.jpg'),
('Panna cotta', 'Crème, gélatine végétale, vanille, coulis de fruits rouges', 7.50, 4, TRUE, 'uploads/459462b9-8201-4ea3-9ab1-65535a922c69.jpg'),
('Cannoli siciliani', 'Pâte frite, ricotta sucrée, chocolat', 8.50, 4, TRUE, 'uploads/9d04aa3e-2ebc-4c96-b2e7-8456385631ca.jpg'),
('Semifreddo aux amandes', 'Glace italienne semi-congelée aux amandes', 8.50, 4, TRUE, 'uploads/1cfcbff1-6fad-4931-ac58-3958b077da55.jpg'),
('Affogato al caffè', 'Boule de glace vanille, expresso chaud', 6.50, 4, TRUE, 'uploads/48e20aa8-d0f4-4cd5-83c0-c6f2ff4cfdd7.png'),
('Torta della nonna', 'Gâteau à la crème pâtissière et pignons', 8.00, 4, TRUE, 'uploads/1dfc4108-0fb3-41f1-b23d-0bf0ac8675ea.jpg');


INSERT INTO users (first_name, last_name, email, phone_number, password, role) VALUES 
('admin','macaronix','admin@macaronix.com','0000000000','$2y$10$sPD4i3GY6Ym5lpoJ0.RRGucM5yueao3nxanIPx7Ade5FzhH98gaAO','admin'),
('client','macaronix','email@email.com','0000000000','$2y$10$sPD4i3GY6Ym5lpoJ0.RRGucM5yueao3nxanIPx7Ade5FzhH98gaAO','client');

INSERT INTO orders (id_user, client_first_name, client_last_name, client_adresse, client_email, client_phone, allergies)
VALUES
('2','client', 'Macaronix','477 Rue Décarie Valcourt Qc', 'email@email.com', '0000000000', 'Aucune'),
('2','client', 'Macaronix', '37 Bd Pie-IX Granby Qc', 'email@email.com', '0000000000', 'Noix'),
('2','client', 'Macaronix', '788 Rue Champlain Magog Qc', 'email@email.com', '0000000000', NULL);

INSERT INTO order_items (id_commande, id_product, quantity) VALUES
(1, 1, 2), 
(1, 7, 1),
(1, 21, 1);

INSERT INTO order_items (id_commande, id_product, quantity) VALUES
(2, 8, 1), 
(2, 13, 1); 

INSERT INTO order_items (id_commande, id_product, quantity) VALUES
(3, 15, 2), 
(3, 24, 1); 

INSERT INTO evaluations (author, note, comment, date_creation, status) VALUES
('Pierre Dupont', 5, 'Excellente cuisine, pâtes fraîches incroyables et service impeccable. À recommander !', '2025-06-10', 0),
('Marie Lemoine', 5, 'Ambiance chaleureuse, plats authentiques et un tiramisu à tomber. À refaire sans hésiter.', '2025-06-09', 0),
('Luca Rossi', 4, 'Les pâtes sont bonnes mais un peu trop salées à mon goût. Le service était parfait.', '2025-06-08', 1),
('Sophie Bernard', 4, 'Très bon restaurant, mais un peu bruyant le week-end. Les pâtes étaient délicieuses.', '2025-06-07', 0),
('Aras Kaya', 5, 'Meilleures pâtes de ma vie ! J’ai adoré l’entré et le plat principal.', '2025-06-06', 1),
('Emma Craig', 4, 'Le repas était très bon, mais j’aurais aimé plus de choix végétariens.', '2025-06-05', 1),
('David Martin', 5, 'Le chef fait des miracles en cuisine, très bon rapport qualité/prix.', '2025-06-04', 0),
('Claire Roux', 4, 'Très bon dîner, mais le service était un peu long vendredi. Sinon, rien à redire sur les plats !', '2025-06-06', 0);
