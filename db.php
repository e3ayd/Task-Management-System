<?php
$host = 'localhost'; // MySQL host
$dbname = 'task_manager'; // Database name
$user = 'root'; // MySQL username
$pass = ''; // MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
