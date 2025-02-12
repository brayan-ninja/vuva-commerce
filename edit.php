<?php
session_start();
require 'db.php';

// Redirect to login if the user is not logged in
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

// Fetch the post data based on the ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $agent_id = $_SESSION['id'];

    // Ensure the post belongs to the logged-in agent
    $stmt = $pdo->prepare('SELECT posts.*, category.category_name FROM posts JOIN category ON posts.category_id = category.id WHERE posts.id = ? AND posts.agent_id = ?');
    $stmt->execute([$id, $agent_id]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$post) {
        die("Post not found or you do not have permission to edit this post.");
    }
} else {
    die("Invalid request.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploads = $_POST['uploads'];
    $category_id = $_POST['category_id'];

    // Update the post in the database
    $stmt = $pdo->prepare("UPDATE posts SET uploads = ?, category_id = ? WHERE id = ? AND agent_id = ?");
    $stmt->execute([$uploads, $category_id, $id, $agent_id]);

    header("Location: dashboard.php");
    exit;
}

// Fetch all categories for the dropdown
$categories = $pdo->query("SELECT * FROM category")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: green;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .container {
            padding: 20px;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: green;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Edit Post</h1>
        <a class="logout" href="workerdashboard.php">Back to Dashboard</a>
    </div>
    <div class="container">
        <form method="POST">
        <label for="uploads">Uploads (Image File):</label>
            <input type="file" name="uploads" id="uploads">
            <?php if (!empty($post['uploads'])): ?>
                <p>Current Image: <img src="uploads/<?= htmlspecialchars($post['uploads']) ?>" alt="Current Image" style="max-width: 100px; max-height: 100px;"></p>
            <?php endif; ?>
            <br>
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>" <?= $category['id'] == $post['category_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($category['category_name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>
            <button type="submit">Update Post</button>
        </form>
    </div>
</body>
</html>