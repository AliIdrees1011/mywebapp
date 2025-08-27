<?php
$host = getenv('DB_HOST') ?: 'localhost';
$db   = getenv('DB_NAME') ?: 'myappdb';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = mysqli_init();

// Require SSL (works with Azure without providing cert files)
mysqli_ssl_set($mysqli, NULL, NULL, NULL, NULL, NULL);
if (!mysqli_real_connect($mysqli, $host, $user, $pass, $db, 3306, NULL, MYSQLI_CLIENT_SSL)) {
    die('Database connection failed');
}

$mysqli->set_charset('utf8mb4');
?>
