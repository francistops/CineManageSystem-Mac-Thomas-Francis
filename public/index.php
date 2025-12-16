<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../config.php';
require_once APP_PATH . '/helper/utils.php';
require_once APP_PATH . '/helper/db_connect.php';
require_once APP_PATH . '/controllers/Users.php';
require_once APP_PATH . '/controllers/Films.php';

session_start();

$action = $_GET['action'] ?? 'page';

switch ($action) {
    case 'page':
        // Page d'accueil → on laisse continuer le script
        break;

    case 'films':
        // Page de détails d'un film
        require_once VIEWS_PATH . '/home/film.view.php';
        exit;

    case 'user':
        // Profil utilisateur / admin
        require_once VIEWS_PATH . '/admin/profil.php';
        exit;

    case 'login':
    case 'dashboard':
    case 'logout':
        // On redirige vers le module d'admin
        redirect("admin.php?action=$action");
        exit;

    default:
        http_response_code(404);
        require '404.php';
        exit;
}

// À partir d'ici, on est sur la page d'accueil (liste des films)
include_once VIEWS_PATH . '/partials/header.php';

// Récupération de la connexion à la base de données
$conn = getDBConnection();

// Requête pour récupérer tous les films
$result = $conn->query("SELECT * FROM films ORDER BY annee_sortie DESC");
?>

<h2>Liste des films</h2>
<ul>
<?php while ($film = $result->fetch_assoc()): ?>
    <li>
        <a href="<?php echo htmlspecialchars('index.php?action=films&id=' . $film['id']); ?>">
            <?php echo htmlspecialchars($film['titre']) . ' (' . htmlspecialchars($film['annee_sortie']) . ')'; ?>
        </a>
    </li>
<?php endwhile; ?>
</ul>

<?php include_once VIEWS_PATH . '/partials/footer.php'; ?>
