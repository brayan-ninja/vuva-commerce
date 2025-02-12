<?php
session_start();
require 'db.php';

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

$agent_id = $_SESSION['id'];

// Fetch categories for the dropdown
$stmt = $pdo->query('SELECT * FROM category');
$categories = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $upload = $_FILES['upload'];

    // Handle file upload
    if ($upload['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        $upload_file = $upload_dir . basename($upload['name']);

        // Move the uploaded file to the uploads directory
        if (move_uploaded_file($upload['tmp_name'], $upload_file)) {
            // Insert post into the database
            $stmt = $pdo->prepare('INSERT INTO posts (agent_id, category_id, price, uploads) VALUES (?, ?, ?, ?)');
            $stmt->execute([$agent_id, $category_id, $price, $upload['name']]);

            header('Location:workerdashboard.php');
            exit;
        } else {
            $error = "Failed to move uploaded file.";
        }
    } else {
        $error = "File upload error.";
    }
}
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
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group button {
            padding: 10px 15px;
            background-color: green;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: darkgreen;
        }
        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Create Post</h1>
        <a class="logout" href="logout.php">Logout</a>
    </div>
    <div class="container">
        <h2>Create New Post</h2>
        <?php if (isset($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>
        <form action="create_post.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" required>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['category_name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" required>
            </div>
            <div class="form-group">
                <label for="upload">Upload Image</label>
                <input type="file" name="upload" id="upload" required>
            </div>
            <div class="form-group">
                <button type="submit">Create Post</button>
            </div>
        </form>
    </div>
</body>
</html>