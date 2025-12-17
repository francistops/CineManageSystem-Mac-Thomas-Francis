<?php

require_once APP_PATH . '/helper/db_connect.php';

/**
 * Retourne la connexion à la base de données (mysqli).
 */
function film_get_connection(): mysqli
{
    return getDBConnection();
}

/**
 * Récupère tous les films.
 * Retourne un tableau associatif [ [ 'id' => ..., 'titre' => ..., ... ], ... ]
 */
function getAllFilm(): array
{
    $conn = film_get_connection();

    $sql = "SELECT * FROM films ORDER BY id DESC";
    $result = $conn->query($sql);

    if (!$result) {
        return [];
    }

    return $result->fetch_all(MYSQLI_ASSOC);
}

/**
 * Récupère un film par son ID.
 * Retourne un tableau associatif ou null si non trouvé.
 */
function getFilmById(int $id): ?array
{
    $conn = film_get_connection();

    $id = (int) $id;
    $sql = "SELECT * FROM films WHERE id = $id LIMIT 1";
    $result = $conn->query($sql);

    if (!$result) {
        return null;
    }

    $film = $result->fetch_assoc();
    return $film ?: null;
}

/**
 * Insère un nouveau film.
 * $filmData attend les clés : titre, realisateur, genre, annee_sortie, description.
 */
function insertFilm(array $filmData): bool
{
    $conn = film_get_connection();

    $titre        = $conn->real_escape_string($filmData['titre']        ?? '');
    $realisateur  = $conn->real_escape_string($filmData['realisateur']  ?? '');
    $genre        = $conn->real_escape_string($filmData['genre']        ?? '');
    $annee        = (int) ($filmData['annee_sortie'] ?? 0);
    $description  = $conn->real_escape_string($filmData['description']  ?? '');

    $sql = "
        INSERT INTO films (titre, realisateur, genre, annee_sortie, description)
        VALUES ('$titre', '$realisateur', '$genre', $annee, '$description')
    ";

    return $conn->query($sql) === true;
}

/**
 * Met à jour un film existant.
 * $filmData a les mêmes clés que insertFilm().
 */
function updateFilm(int $id, array $filmData): bool
{
    $conn = film_get_connection();

    $id          = (int) $id;
    $titre       = $conn->real_escape_string($filmData['titre']        ?? '');
    $realisateur = $conn->real_escape_string($filmData['realisateur']  ?? '');
    $genre       = $conn->real_escape_string($filmData['genre']        ?? '');
    $annee       = (int) ($filmData['annee_sortie'] ?? 0);
    $description = $conn->real_escape_string($filmData['description']  ?? '');

    $sql = "
        UPDATE films
        SET titre = '$titre',
            realisateur = '$realisateur',
            genre = '$genre',
            annee_sortie = $annee,
            description = '$description'
        WHERE id = $id
        LIMIT 1
    ";

    return $conn->query($sql) === true;
}

/**
 * Supprime un film par son ID.
 */
function deleteFilm(int $id): bool
{
    $conn = film_get_connection();

    $id  = (int) $id;
    $sql = "DELETE FROM films WHERE id = $id LIMIT 1";

    return $conn->query($sql) === true;
}
