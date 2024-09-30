<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM tasks WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$tasks = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
</head>
<body>
    <h1>Your Tasks</h1>
    <a href="add_task.php">Add New Task</a><br><br>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <?php echo htmlspecialchars($task['title']); ?>
                [<a href="edit_task.php?id=<?php echo $task['id']; ?>">Edit</a>]
                [<a href="delete_task.php?id=<?php echo $task['id']; ?>">Delete</a>]
                [<a href="complete_task.php?id=<?php echo $task['id']; ?>">Complete</a>]
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="logout.php">Logout</a>
</body>
</html>
