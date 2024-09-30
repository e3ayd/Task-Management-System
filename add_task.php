<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $priority = $_POST['priority'];

    $stmt = $pdo->prepare("INSERT INTO tasks (user_id, title, description, due_date, priority, status) VALUES (?, ?, ?, ?, ?, 'pending')");
    $stmt->execute([$_SESSION['user_id'], $title, $description, $due_date, $priority]);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>
</head>
<body>
    <h1>Add New Task</h1>
    <form method="POST" action="add_task.php">
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>
        <label>Description:</label><br>
        <textarea name="description" required></textarea><br><br>
        <label>Due Date:</label><br>
        <input type="date" name="due_date" required><br><br>
        <label>Priority:</label><br>
        <select name="priority">
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select><br><br>
        <input type="submit" value="Add Task">
    </form>
</body>
</html>
