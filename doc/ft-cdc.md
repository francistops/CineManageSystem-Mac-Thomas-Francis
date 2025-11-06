# Système de gestion de films pour cinema

## Contexte

Les employ/ gère des millier de films chaque année pour des dixiaine de millier de client de ton cinema.

Actuellement, les ajout se font manuellement : les employ/ remplissent un formulaire
web.

Ce processus entraîne souvent :
• des retards,
• des erreurs dans les films,
• un manque de visibilité pour les client,
• une charge de travail importante pour le personnel administratif.

Afin d’améliorer ce service, le cinema tamh hair souhaite développer un système numérique d'
ajout automatiques de films par API pour les employ/ et client.

Ce site ou application devra permettre aux client de consulter les horraires des films disponnible à l'affiche.

Les employ/, devront pouvoir valider ou refuser les demandes d'ajout, et gérer leur statut de manière centralisée.

## Travail demandé :

1. Analyse du besoin et des objectifs
  • Simplifier le processus de gestion des films.
  • Automatiser l'ajout des films et des validations.
  • Informer les client sur l’état des films.
  • Réduire la charge administrative ajout de films.
  • Améliorer la transparence et la satisfaction des client.

2. Identification des utilisateurs
  • Client : cherche un filtrate, dépose une demande, suit l’avancement, effectue le paiement.
  • Agent du service logement : valide ou refuse les dossiers, attribue les chambres, gère les paiements et les renouvellements.
  • Responsable de résidence : supervise les logements, signale les disponibilités et l’état des chambres.

3. Fonctionnalités principales
  • Recherche de logements (par type, prix, localisation, équipements).
  • Dépôt de dossier en ligne (pièces justificatives, formulaire).
  • Suivi du dossier (statut : en attente, accepté, refusé, attribué).
  • Paiement en ligne (caution, loyer).
  • Gestion des logements (ajout/suppression, suivi des disponibilités).
  • Notifications automatiques (par email ou SMS en cas de mise à jour de dossier).

4. Contraintes à prendre en compte
  • Budget limité : le développement doit être réalisé avec des outils open source ou internes.
  • Sécurité des données : les informations personnelles et les paiements doivent être protégés (RGPD).
  • Charge serveur et disponibilité : le système doit rester performant lors des pics de demandes (période d’inscription).
  • (Optionnel) Accessibilité mobile : le site doit être utilisable sur smartphone et tablette.

5. User Stories (5 à 7 minimum)
  1. En tant qu’étudiant, je veux consulter la liste des logements disponibles afin de choisir celui qui correspond à mon budget.
  2. En tant qu’étudiant, je veux déposer mon dossier en ligne afin d’éviter les déplacements et les formulaires papier.
  3. En tant qu’étudiant, je veux suivre l’état d’avancement de ma demande afin de savoir quand une chambre m’est attribuée.
  4. En tant qu’agent du service logement, je veux visualiser et valider les dossiers déposés afin de gérer efficacement les demandes.
  5. En tant que responsable de résidence, je veux mettre à jour la disponibilité des chambres afin que le site affiche des informations exactes.
  6. En tant qu’administrateur, je veux générer des statistiques (taux d’occupation, nombre de demandes) pour optimiser la gestion du service.
  7. En tant qu’étudiant, je veux payer mon loyer en ligne afin de simplifier le processus et éviter les retards.
