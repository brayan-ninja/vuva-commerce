<?php
session_start();
require 'db.php';

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

// Fetch posts by the logged-in agent
$agent_id = $_SESSION['id'];
$stmt = $pdo->prepare('SELECT posts.*, category.category_name FROM posts JOIN category ON posts.category_id = category.id WHERE posts.agent_id = ?');
$stmt->execute([$agent_id]);
$posts = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker Dashboard</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .logout {
            float: right;
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Vuva Agent Dashboard</h1>
        <a class="logout" href="logout.php">Logout</a>
    </div>
    <div class="container">
    <h2>Your Posts</h2>
    <a href="create_post.php">Create New Post</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Uploads</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
        <?php foreach ($posts as $post): ?>
        <tr>
            <td><?= $post['id'] ?></td>
            <td>
                <?php if (!empty($post['uploads'])): ?>
                    <!-- If uploads contains a file path -->
                    <img src="uploads/<?= $post['uploads'] ?>" alt="Uploaded Image" style="max-width: 100px; max-height: 100px;">
                <?php else: ?>
                    No Image
                <?php endif; ?>
            </td>
            <td><?= $post['category_name'] ?></td>
            <td>
                <a href="edit.php?id=<?= $post['id'] ?>">Edit</a>
                <a href="delete.php?id=<?= $post['id'] ?>" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>