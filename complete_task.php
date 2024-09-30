<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$task_id = $_GET['id'];
$stmt = $pdo->prepare("UPDATE tasks SET status = 'completed' WHERE id = ?");
$stmt->execute([$task_id]);

header("Location: index.php");
exit();
?>
