<?php
session_start();
require 'db.php';

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uploads = $_POST['uploads'];
    $category_id = $_POST['category_id'];
    $agent_id = $_SESSION['id'];

    $stmt = $pdo->prepare('INSERT INTO posts (agent_id, uploads, category_id) VALUES (:agent_id, :uploads, :category_id)');
    $stmt->execute([
        'agent_id' => $agent_id,
        'uploads' => $uploads,
        'category_id' => $category_id
    ]);

    header('Location: workerdashboard.php');
    exit;
}

// Fetch categories
$stmt = $pdo->query('SELECT * FROM category');
$categories = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
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
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group button {
            padding: 10px 20px;
            background-color: green;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Create Post</h1>
    </div>
    <div class="container">
        <form method="POST">
            <div class="form-group">
            <label for="uploads">Upload Image</label>
            <input type="file" name="uploads" id="uploads" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" required>
                    <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Create</button>
            </div>
        </form>
    </div>
</body>
</html>