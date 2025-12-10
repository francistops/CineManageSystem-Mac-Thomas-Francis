<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


include __DIR__ . "/../../../config.php";
include APP_PATH . "/helper/db_connect.php";
$conn = getDBConnection();

// recuperer la derniere migration appliquee
$last = $conn->query("select filename from migrations order by dateApplication desc limit 1")->fetch_assoc();
$lastFile = $last['filename']; //001_add_role_to_admins.sql

$NomfichierRolleback = str_replace(".sql", ".rollback.sql", $lastFile);


//chercher le fichier de rollback
$filepath = __DIR__ . "/rollbacks/" . $NomfichierRolleback;

echo var_dump($filepath);

if (!file_exists($filepath))
    //die("No rollback script for the $$lastFile \n");
    die('No rollback script for the ' . $lastFile . '\n');
else {
    $choice = 'n';
    $choice = readline('Do you want to rollback ' . $NomfichierRolleback . '(y/N): ');
    if (strtolower($choice) === 'y') {
        echo "Rolling back : $lastFile";
        $sql = file_get_contents($filepath);

        if ($conn->multi_query($sql)) {
            while ($conn->next_result()) {
            }
            echo "\n delete from migrations where filename=' $lastFile' \n";
            $conn->query("delete from migrations where filename= '$lastFile' ");
            echo "Rollback Done!";
        } else {
            echo "erreur : " . $conn->error;
        }
    } else {
        echo 'user choice not to rollback ' . $NomfichierRolleback . PHP_EOL;
    }
}
