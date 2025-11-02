<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo 'We don\'t have mysqli!!!';
} else {
    echo 'mysqli is install but it is activate in the php.ini or is the db create?';
}

require_once 'includes/db_connect.php';
include 'includes/header.php';

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

<?php include 'includes/footer.php'; ?>
