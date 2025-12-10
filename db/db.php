<?php
$conn = new mysqli("localhost",
 "root", "", "bibliodb");

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
else
{

}
?>
