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
            padding: 20px;
            text-align: center;
            position: relative;
        }
        .header h1 {
            margin: 0;
        }
        .logout {
            position: absolute;
            bottom: 10px;
            right: 20px;
            color: white;
            text-decoration: none;
            font-size: 14px;
        }
        .logout:hover {
            text-decoration: underline;
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
        a {
            color: green;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .create-post-link {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: green;
            color: white;
            border-radius: 4px;
            text-decoration: none;
        }
        .create-post-link:hover {
            background-color: darkgreen;
        }
        .action-links a {
            margin-right: 10px;
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
        <a href="create_post.php" class="create-post-link">Create New Post</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Uploads</th>
                <th>Category</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php foreach ($posts as $post): ?>
            <tr>
                <td><?= $post['id'] ?></td>
                <td>
                    <?php if (!empty($post['uploads'])): ?>
                        <img src="uploads/<?= $post['uploads'] ?>" alt="Uploaded Image" style="max-width: 100px; max-height: 100px;">
                    <?php else: ?>
                        No Image
                    <?php endif; ?>
                </td>
                <td><?= $post['category_name'] ?></td>
                <td><?= htmlspecialchars($post['price']) ?></td>
                <td class="action-links">
                    <a href="edit.php?id=<?= $post['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $post['id'] ?>" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>