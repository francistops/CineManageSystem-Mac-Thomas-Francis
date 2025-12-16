# principal requette sql 

chercher la liste des film
select * from films order by annee_sortie desc

recherche de film par id 
select * from films where id=$id

ajouté un film 
INSERT INTO films (titre,realisateur,genre,annee_sortie,description) 
                 VALUES ('$titre','$realisateur','$genre','$annee','$desc')

modifier un film
UPDATE films 
                    SET titre='$titre',
                        realisateur='$realisateur',
                        genre='$genre',
                        annee_sortie=$annee,
                        description='$desc'
                    WHERE id=$id

retiré un film
DELETE FROM films WHERE id=$id

filtré les films
requette dynamique
"SELECT * FROM films ".$condition.$orderby;

validate user
SELECT id, nom_utilisateur, mot_de_passe
            FROM administrateurs
            WHERE nom_utilisateur = ?
            LIMIT 1

