<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include __DIR__ . "/../../../config.php";
include APP_PATH . "/helper/db_connect.php";

$conn = getDBConnection();

$direcory = __DIR__ . "/migrations/*.sql";

$files = glob(__DIR__ . "/migrations/*.sql");

sort($files);

//echo var_dump($files);

foreach ($files as $file) {

    $name = basename($file);
    $choice = 'n';
    $choice = readline('Do you want to apply ' . $name . '(y/N): ');
    if (strtolower($choice) === 'y') {
        $stmt = $conn->prepare("Select 1 from migrations where filename= ?");
        $stmt->bind_param("s", $file);
        $stmt->execute();

        if ($stmt->get_result()->num_rows == 0) {

            echo "Exécution du fichier $name ";

            $requetteSQl = file_get_contents($file);

            if ($conn->multi_query($requetteSQl)) {
                while ($conn->next_result()) {
                }

                $stmt = $conn->prepare("Insert into migrations (filename) values(?)");
                $stmt->bind_param("s", $name);
                $stmt->execute();

                echo "Done!\n";
            } else {
                echo "Erreur !: " . $conn->error;
                exit;
            }
        }
    } else {
        echo 'user choice to skip ' . $name . PHP_EOL;
    }
}
