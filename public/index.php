<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();

require_once('../src/app/helper/db_connect.php');
require_once('../src/app/controllers/Users.php'); 
require_once('../src/app/controllers/Films.php');  

$action = $_GET['action'] ?? 'page';

switch ($action) {
    case 'page':
        break;
    case 'films':
        $controller = new Films($db);
       break;
    case 'user':
        $controller = new Users($db);
        break;
    case 'login':
    case 'create_account':
    case 'delete_user':
    case 'dashboard':
    case 'my_account':
    case 'logout':
        $controller = new auth_controller($db);
         break;
    default:
         http_response_code(404);
        require '404.php';
        exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->handlePost($_GET, $_POST);
}
else{
    $controller->handle($_GET);
} 
ob_end_flush();
session_start();

echo '<!-- Session Data: ' . print_r($_SESSION, true) . ' -->';
include '/../src/app/views/partials/header.php';
$result = $conn->query("SELECT * FROM films ORDER BY annee_sortie DESC");
?>

<h2>Liste des films</h2>
<ul>
<?php while($film = $result->fetch_assoc()): ?>
    <li>
        <a href="film.php?id=<?php echo $film['id']; ?>">
            <?php echo htmlspecialchars($film['titre']); ?> (<?php echo $film['annee_sortie']; ?>)
        </a>
    </li>
<?php endwhile; ?>
</ul> 

<?php include '/../src/app/views/partials/footer.php'; ?>