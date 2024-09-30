<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$task_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = ?");
$stmt->execute([$task_id]);
$task = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $priority = $_POST['priority'];

    $stmt = $pdo->prepare("UPDATE tasks SET title = ?, description = ?, due_date = ?, priority = ? WHERE id = ?");
    $stmt->execute([$title, $description, $due_date, $priority, $task_id]);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>
    <form method="POST" action="edit_task.php?id=<?php echo $task['id']; ?>">
        <label>Title:</label><br>
        <input type="text" name="title" value="<?php echo htmlspecialchars($task['title']); ?>" required><br><br>
        <label>Description:</label><br>
        <textarea name="description" required><?php echo htmlspecialchars($task['description']); ?></textarea><br><br>
        <label>Due Date:</label><br>
        <input type="date" name="due_date" value="<?php echo $task['due_date']; ?>" required><br><br>
        <label>Priority:</label><br>
        <select name="priority">
            <option value="low" <?php if ($task['priority'] == 'low') echo 'selected'; ?>>Low</option>
            <option value="medium" <?php if ($task['priority'] == 'medium') echo 'selected'; ?>>Medium</option>
            <option value="high" <?php if ($task['priority'] == 'high') echo 'selected'; ?>>High</option>
        </select><br><br>
        <input type="submit" value="Save Changes">
    </form>
</body>
</html>
