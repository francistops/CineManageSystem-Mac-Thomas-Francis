<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once(__DIR__ . '/../config.php');

require_once(APP_PATH . '/helper/db_connect.php');
require_once(APP_PATH . '/controllers/Users.php'); 
require_once(APP_PATH . '/controllers/Films.php');  

$action = $_GET['action'] ?? 'page';

switch ($action) {
    case 'page':
        break;
    case 'films':
        require_once(VIEWS_PATH . '/home/film.view.php');
        break;
    case 'user':
        require_once(VIEWS_PATH . '/admin/profil.php');
        break;
    case 'login':
    case 'create_account':
    case 'delete_user':
    case 'dashboard':
    case 'my_account':
    case 'logout':
        if ($_SESSION['login'] === true)
            require_once(VIEWS_PATH . '/admin/dashboard.view.php');
        else
            require_once(VIEWS_PATH . '/admin/login.view.php');
        exit;
    default:
         http_response_code(404);
        require '404.php';
        exit;
}

require_once(VIEWS_PATH . '/partials/header.php');
$result = $conn->query("SELECT * FROM films ORDER BY annee_sortie DESC");
?>

<h2>Liste des films</h2>
<ul>
<?php while($film = $result->fetch_assoc()): ?>
    <li>
        <a href= "<?= VIEWS_PATH ?>/home/film.view.php?id=<?= $film['id'] ?>">
            <?php echo htmlspecialchars($film['titre']); ?> (<?php echo $film['annee_sortie']; ?>)
        </a>
    </li>
<?php endwhile; ?>
</ul>

<?php require_once (VIEWS_PATH . '/partials/footer.php'); ?>