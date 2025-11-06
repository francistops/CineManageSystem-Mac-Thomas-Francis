# Cahier des besoins du Système de gestion de films pour cinéma

## Contexte du projet:  

Le projet CinéManage est un système de gestion de films développé en PHP avec une base de données MySQL.L’application actuelle permet de consulter la liste des films (côté public) et de gérer les films via un panneau d’administration (CRUD basique). 

Ce processus entraîne souvent :
• des retards,
• des erreurs de frappe dans les meta-données des films,
• un manque de visibilité pour les client,
• une charge de travail importante pour le personnel administratif.

L’objectif est de modifier et d’améliorer un système existant fourni par le professeur (client).
Dans ce but, le cinema souhaite développer un système numérique d'ajout automatiques de films par API pour les employés et les clients. Ainsi, Ce site ou application devra permettre aux client de consulter les horraires des films disponnible à l'affiche. De plus, les employés, pourront valider ou refuser les demandes d'ajouts, et gérer leurs status de manière centralisée.

Analyse du système existent.  

Éléments technique observés: 

 Le projet fonctionne localement via XAMPP (Apache + MySQL). 
 URL principale: http://localhost/cinemanage/
 Base de données: cinemanage_db 
 Tables principales: films et administrateurs 
 L’authentification se fait sans chiffrement des mots de passe. 

 Les actions Modifier / Supprimer fonctionnent côté administrateur, mais aucune vérification de sécurité n’est présente.
**on verifie l'auth**

Captures d’écran incluses :  
Liste des films 
Login_admin 
Dashboard_admin 
Schema_cinemanage.sql 

Problèmes & limites :  
 
 Absence de validation des entrées — vulnérabilité aux injections SQL. 
 Pas de séparation claire entre la logique et l’affichage (pas d’architecture MVC). 
 Base de données minimale — aucune clé étrangère, pas de normalisation. 
 Aucune gestion des rôles ou permissions. 
 Pas de pagination ni de recherche dans la liste des films. 
 Authentification non sécurisée (mots de passe en clair). 

Modules existants 
Côté public: 
Consultation de la liste des films 
Détails d’un film 

Côté administrateur: 
Connexion (login) 
Tableau de bord (CRUD des films) 

Modules à refondre:
Authentification sécurisée avec password_hash() et password_verify(). 
CRUD amélioré avec validation des champs (titre, année, description). 
Séparation du code selon le modèle MVC (modèle, vue, contrôleur). 
Sécurisation des formulaires (CSRF, filtrage, validation). 

Nouveaux modules proposés 
Peut-être ? Module Salles: gestion des salles et de leur capacité. 
Aussi ? Module Séances: planification des horaires de projection.(à vérifier avec Francis & thomas)
**billetry online rsv de siege**
A screenshot of a computer
AI-generated content may be incorrect.A screenshot of a computer

Liens externes pour notre repo : https://github.com/francistops/CineManageSystem-Mac-Thomas-Francis
 
