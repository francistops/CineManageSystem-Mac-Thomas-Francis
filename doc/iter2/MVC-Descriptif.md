# MVC du site Cinemanage

## Structure des fichiers et dossiers du site
.
├── config.php
├── db
│   └── cinemanage_db.sql
├── docker
│   ├── docker-compose.yml
│   ├── Dockerfile
│   └── nginx
│   └── nginx.conf
├── LICENSE
├── public
│   ├── assets
│   │   ├── css
│   │   │   └── style.css
│   │   └── js
│   │   └── script.js
│   └── index.php
├── README.md
└── src
└── app
├── controllerd
│   ├── FilmController.php
│   └── UserController.php
├── helpersd
│   └── db_connect.php
├── middlewares
│   └── auth_gard.php
│ └── logger.php
├── model
│   ├── FilmModel.php
│   └── UserModel.php
├── routers
│   └── router.php
└── views
├── admin
│   ├── add_film.view.php
│   ├── dashboard.view.php
│   ├── edit_film.view.php
│   └── login.view.php
├── home
│   └── film.view.php
└── includes
├── footer.php
└── header.php

## Description des dossiers et fichiers

**config.php** : Définit les constantes du site, par exemple les identifiants de connexion à la base de données.
**./db** : Stocke les dumps de la ou des bases de données.
**./docker** : Contient la configuration nécessaire pour construire le site avec Docker.
**./public** : Contient les fichiers et dossiers accessibles aux visiteurs, ainsi que le point d'entrée du site web.
**./src** : Contient le code des différentes fonctionnalités serveur du site.
**./src/app** : Contient les différentes fonctionnalités propres à l’application web, c’est-à-dire la logique métier.
**./src/app/controllers** : Contient les différents contrôleurs nécessaires pour gérer les données transmises aux modèles.
**./src/app/helpers** : Contient les fonctions utilitaires liées aux besoins fonctionnels de l’application.
**./src/app/middlewares** : Contient les fonctions intermédiaires (proxies). Exemple : une route nécessitant une authentification ou une vérification.
**./src/app/routers** : Contient les routes et les oriente vers les bons contrôleurs.
**./src/app/views** : Contient les vues des pages et renvoie l’affichage à l’utilisateur, avec ou sans données.