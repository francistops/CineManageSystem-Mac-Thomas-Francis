# Examem note

## cycle de vie projet cascade
- recueil des besoins
    - Analyse
        - Conception
            - implantation
                - tests
                    - Integration

## cycle de vie projet en V
- identification des besoins et étude de faisabilité : Maitrise d'ouvrage MOA
    - Spécification : Maitrise d'oeuvre MOE
        - conception général : équipe d'architecture
            - conception détaillée : équipe de développement
                - Réalisation
            - test unitaires
        - test d'intégration
    - Validation
- recette

## cycle de vie projet agile
- Exigence
    - analyse
        - conception
            - déploiement (incrément 1 || n)
                - repeat from analyse until done
                    - cloture du projet
                        - livraison

## pourquoi analyser
1. pour mieux comprendre les besoins réel
2. implémenté la fonction avant la forme
3. traduire les exigences métiers en exigences concrète
4. évité les malentendus
5. poser les bases du UX
6. réduire les couts de dev
7. augmenté la qualité
8. facilité la comm entre les partis prenants
9. limiter le risque de échec ou mauvais ergonomie

## Acteurs impliqués
| role | responsabilites principals |
| - | - |
| client / commanditaire | exprime les besoin et valide le projet |
| chef de projet | coordonne, planifie, valide les livrable |
| concepteur UX/UI | analyse les besoins utilisateur, concoit les interface |
| dev | implemente les fonctionnalite technique |
| utilisateur final | interagit avec le produit son retour oriente la conception |

## Méthodes de recueil des besoins
| Metode | description | avantages | limites |
| - | - | - | - |
| entretien | discussion avec les utilisateur | comprendre le contexte | long et nécessite de bonnes questions |
| questionnaire | fourmulaire structuré | collecte quantitative rapide | peu de détails qualitatifs |
| observation | étude de comportement réel | révèle les usages cachés | nécessite du temps sur le terrain |
| atelier de conception | Travail collaboratif| crée une vision partagée | doit être bien animé |
| benchmark concurentiel | étude de solution similaires | aide à se positionner | risque de copier sans innover |

## typologie des besoin
| besoin | description |
| - | - |
| fonctionnel | ce que le system doit faire |
| non fontionnel | qualite du system (performance, accessibilite, securtite) |
| technique | constraintes liées à le technologie ou à l'infrastructure |
| organisationnel | contraintes interne du client ou des équipes |

## User Stories
brève et simple description d'une fonctionnalité exprimée du point de vue de l'utilisateur
forme standard : en tant que `utilisateur', je veux 'objectif/action' afin de 'résultat/bénéfice'
### critere d'acception pour US
exemple: Accéder à mes notes en ligne
- l'utilisateur doit etre connecté
- les notes sont triées par matière
- l'interface est lisible sur mobile

## draw.io pour uml, wireframe, user flow, schema architecture

## system existant
analyse afin de comprendre le fonctionnement actuel, identifier ses limites et proposer des améliorations
objectifs :
 - Détecter les problème, dysfonctionnement ou limitation du systeme actuel
 - déterminer les besoins des utilisateurs pour la version modifée.
 - prioriser les changement pour une valeur maximal avec cout maitrisé

 étude du systeme actuel objectif:
 - identifier les processus métiers existants
 - lister les fonctionnalités actuelles
 - recenser les technologies utilisées (langage, bd, frameworks)
 - identifier les force et faiblesses

### étude du systeme actuel
 outils:
- diagrammes de processus (BPMN)
- cartographie fonctionnelle
- observation et entretien avec utilisateurs

### identification des probleme et besoins d'evolution
Recueil des dysfonctionnements
- Bugs fréquents, lenteur, interfaces peu ergonomiques.
- Limitations techniques (ex. pas d’accès mobile, stockage limité).
Analyse des besoins utilisateurs
- Nouveaux besoins exprimés depuis la mise en production.
- Changements dans l’organisation ou dans la réglementation.
Analyse des impacts
- Quels modules seront affectés par la modification ?
- Quels risques pour la continuité du service ?

### exemple pratique
**Système existant** : Application interne de réservation de salles dans une université.
**Problèmes identifiés** :
- Pas de confirmation automatique par email.
- Impossible de réserver plusieurs salles à la fois.
- Interface peu lisible sur mobile.
**Analyse des besoins de modification**

| Problème actuel | Objectif de modification | Priorité |
| - | - | - |
| Pas de notification email | Ajouter envoi automatique d’email lors de la réservation | Élevée | 
| Réservation d’une seule salle | Permettre sélection multiple de salles | Moyenne |
| Interface non responsive | Adapter l’interface aux smartphones et tablettes | Élevée |

## Cahier des charges
document pivot entre le client et l'equipe projet. il traduit les besoins en exigence fonctionnelles et techniques.
### structure
1. présentation générale
    - contexte, objectifs
    - cibles et utilisateur visés
    - valeur ajoutée du projet
2. description fonctionnelle
    - fonctionnalites principales
    - parcours utilisateurs (user flow)
    - contraites de securité, accessibilité
3. Aspect techniques
    - technologies choisies
    - hébergement, db, compatibilité
4. contraintes
    - délais, budget, maintenance
5. livrables attendus
    - maqquettes, prototypes, code source, documentation
6. critères de validation
    - conditions pour considérer le project terminé

fin de cours 1

---

## conception d’interfaces Web UX UI
faciliter la navigation, améliorer l’expérience utilisateur et atteindre les objectifs du produit
### analyse
- Elle permet d’évaluer la cohérence visuelle du site existant
- Elle identifie les points faibles de l’expérience utilisateur (navigation, lisibilité, accessibilité)
- Elle oriente la refonte vers une interface plus moderneet ergonomique

### objectif UX
- Faciles à utiliser
- Accessibles à tous
- Agréables et intuitives

## principes UX general
| Principe | Question clé | Indicateur de succès |
| - | - | - | 
| Utilisabilité | L’utilisateur peut-il accomplir sa tâche facilement ? | Moins de 3 clics pour une action principale. |
| Accessibilité | Tout utilisateur peut-il accéder au contenu ? | Respect des normes WCAG 2.1. |
| Cohérence | Les éléments se répètent-ils logiquement ? | Uniformité de style sur toutes les pages. |
| Feedback utilisateur | Le système répond-il aux actions de l’utilisateur ? | Messages visibles et clairs après chaque action. | 
| Hiérarchie visuelle | L’attention est-elle guidée naturellement ? | Mise en avant des éléments clés et bonne lisibilité.


### principes UX
| Norme | Catégorie | Critère | Indicateurde validation |
| - | - | - | - |
| Utilisabilite | Clarté des actions | Les boutons, liens et icônes sont explicites et compréhensibles. | Libellés d’action clairs(“Envoyer”, “S’inscrire”). |
| . | Chemin utilisateur | Le nombre d’étapes pour accomplir unetâche est minimal. | ≤ 3 clics pour une action clé. |
| . | Erreurs utilisateur | Les erreurs sont rares et récupérables facilement. | Présence d’un message d’erreur explicite. |
| . | Temps de compréhension | L’utilisateur comprend rapidement la structure du site. | Temps moyen d’orientation ≤ 5 secondes. |
| Accessibilité | Contraste visuelLe | contraste entre le texte et le fond respecte la norme WCAG (≥ 4.5:1). | Test validé avec WebAIM Contrast Checker.|
| . | Navigation clavier | Le site peut être parcouru uniquement au clavier. | Touche “Tab” permet de naviguer entre éléments. | 
| . | Texte alternatif | Toutes les images importantes ont un attribut “alt”. | 100 % des images informatives décrites |
| . | Compatibilité outils | Compatible avec lecteurs d’écran (NVDA, JAWS). | Test d’audit d’accessibilité validé. |
| Cohérence | Uniformité des styles | Les boutons, polices et couleurs sont identiques sur toutes les pages. | 1 seul style de bouton principal, 1 style secondaire. |
| . | Positionnement constant | Les éléments importants (menu, logo, bouton retour) gardent la même position.| Alignement identique sur toutes les pages. |
| . | Charte graphique respectée | Les styles respectent la charte graphique du projet.| Aucune couleur non autorisée utilisée. |
| . | Comportement identique | Les éléments interactifs se comportent toujours de la même façon.| Même effetde survol(“hover”) sur tous les boutons. |
| Feedback utilisateur | Confirmation visuelle | Chaque action réussie affiche une confirmation. | Message ou icône de validation visible. |
| . | Gestion d’erreurs | Les erreurs sont expliquées clairement et situées près du champ concerné. | Message rouge clair avec description précise. |
| . | Indicateurs d’attente  | Des éléments visuels (chargement, progression) sont affichés lors des délais. | Barre ou spinner visible pendant le chargement. |
| . | Feedback immédiat | Le système répond dans un délai court. | ≤ 1 secondepour confirmation d’action. |
| Hiérarchie visuelle | Priorisation des éléments | Les éléments essentiels sont mis en avant par la taille, la couleur ou la position. | Titre principal plus grand que le texte descriptif. |
| . | Organisation spatiale | L’agencement des sections suit une logique descendante d’importance. | Lecture fluide du haut vers le bas. |
| . | Utilisation de contrastes | Couleurs, tailles ou polices différencient les niveaux d’information. | Titre : 24 px, sous-titre : 18 px, texte : 14 px. |
| . | Alignement et espacement | L’espace blanc est utilisé pour isoler et structurer le contenu. | Marges régulières et sections aérées. |

## type de manquettes
- Wireframe (bassefidélité): structure simplifiée, position des éléments
- Maquette moyenne fidélité: ajoute quelques détails visuels (couleurs, typographies)
- Maquette haute fidélité: proche du rendu final, avec interactions possibles
- Prototype interactif: permet de simuler le parcours utilisateur

### etape de creation d'une maquette
- Analyse des besoins et objectifs
- Créationde personas et scénarios d’usage
- Wireframing: disposition des contenus et fonctionnalités
- Ajoutde détails graphiques: couleurs, typographies, images 
- Prototype de page et tests utilisateurs
- Validation et itération

### outils
- Wireframe / Maquette: Balsamiq, Figma, Sketch, Adobe XD
- Prototypageinteractif: Figma, InVision, Adobe XD
- Collaboration: Miro, Notion, Slack

## Normes ux / ui internationnales
- ISO 9241-210 (ergonomieet conception centréeutilisateur)
- Heuristiquesde Nielsen (usabilité)
- WCAG / RGAA (accessibilité web)
- NF Z67-147 (norme française d’accessibilité numérique)

fin cours 2

---