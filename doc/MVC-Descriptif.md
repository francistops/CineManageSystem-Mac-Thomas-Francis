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
│       └── nginx.conf
├── LICENSE
├── public
│   ├── assets
│   │   ├── css
│   │   │   └── style.css
│   │   └── js
│   │       └── script.js
│   └── index.php
├── README.md
└── src
    └── app
        ├── controllerd
        │   ├── FilmController.php
        │   └── UserController.php
        ├── helpers
        │   └── db_connect.php
        ├── middlewares
        │   └── auth_gard.php
        │   └── logger.php
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

## description des dossiers et fichiers 

config.php : définie les constante du site. Par exemple, les crédentials de la DB.
./db : stocker la dump de la base de donné.
./docker : stock les config de docker pour build le site sur docker
./public : stock les fichiers et dossiers accessible ou visiteur et le point d'entré du site web.
./src : stock le code des differentes fonction serveur du site.
./src/app : stock les différente fonction propre a l'application web soit la logic business.
./src/app/controllers : stocker le different controlleur requis pour controller les donnée au models
./src/app/helpers : stock les fonctions aidant mais directement relier au besoin au besoin fonctionnelle de l'application
./src/app/middlewares : stock les proxies. Exemple: une route qu'y necessite une authentification ou un surveillance.
./src/app/routers : stock les route et orcheste celle-ci vers les bon controllers.
.src/app/views : stocker le visuelle des page et est retourné a l'utilisateur avec ou sans donnée.



