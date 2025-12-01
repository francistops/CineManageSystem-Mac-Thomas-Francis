<?php
require_once __DIR__ . '/../core/db.php';

function checkAdmin($username, $password) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM admins WHERE username=? AND password=SHA2(?,256)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $res = $stmt->get_result();
    return $res->num_rows === 1;
}
